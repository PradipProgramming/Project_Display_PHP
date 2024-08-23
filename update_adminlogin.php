<?php
require 'con.php';
session_start();

// Fetch the record to be updated
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    try {
        $sql = "SELECT * FROM adminlogin WHERE l_id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        $adminlogin = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$adminlogin) {
            $_SESSION['message'] = ['type' => 'error', 'content' => 'Record not found.'];
            header('Location: display.php');
            exit;
        }
    } catch (PDOException $e) {
        $_SESSION['message'] = ['type' => 'error', 'content' => 'Error fetching record: ' . $e->getMessage()];
        header('Location: display.php');
        exit;
    }
} else {
    $_SESSION['message'] = ['type' => 'error', 'content' => 'Invalid request.'];
    header('Location: display.php');
    exit;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));
    $phone = htmlspecialchars(trim($_POST['phone']));

    if (empty($username) || empty($password) || empty($phone)) {
        $_SESSION['message'] = ['type' => 'error', 'content' => 'All fields are required.'];
    } else {
        try {
            $sql = "UPDATE adminlogin SET l_userName = :username, l_userPassword = :password, phone = :phone WHERE l_id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':username' => $username,
                ':password' => password_hash($password, PASSWORD_DEFAULT), // Hash the password for security
                ':phone' => $phone,
                ':id' => $id
            ]);

            $_SESSION['message'] = ['type' => 'success', 'content' => 'Record updated successfully.'];
            header('Location: display.php');
            exit;
        } catch (PDOException $e) {
            $_SESSION['message'] = ['type' => 'error', 'content' => 'Error updating record: ' . $e->getMessage()];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Admin Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 20px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: auto;
        }
        .form-container {
            padding: 30px;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .form-container h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }
        .form-group label {
            font-weight: bold;
            color: #555;
        }
        .form-control {
            height: 45px;
            font-size: 16px;
            padding: 10px;
            margin-bottom: 10px;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            height: 45px;
            font-size: 16px;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #00408d;
        }
        .alert {
            font-size: 16px;
            margin-bottom: 20px;
        }
        .close {
            font-size: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="form-container">
        <h1>Update Admin Login</h1>

        <!-- Display message from session -->
        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-<?php echo $_SESSION['message']['type']; ?> alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['message']['content']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>

        <form action="update_adminlogin.php?id=<?php echo $id; ?>" method="post" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control" value="<?php echo htmlspecialchars($adminlogin['l_userName']); ?>" placeholder="Enter username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Enter new password" required>
                <small class="form-text text-muted">Password must be at least 8 characters long.</small>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" id="phone" name="phone" class="form-control" value="<?php echo htmlspecialchars($adminlogin['phone']); ?>" placeholder="Enter phone number" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Update</button>
            <a href="display.php" class="btn btn-secondary btn-block">Back</a>
        </form>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    function validateForm() {
        let password = document.getElementById('password').value;
        let phone = document.getElementById('phone').value;

        // Password validation
        if (password.length < 8) {
            alert("Password must be at least 8 characters long.");
            return false;
        }

        // Phone number validation
        const phonePattern = /^\d{10}$/;
        if (!phonePattern.test(phone)) {
            alert("Phone number must be a 10-digit number.");
            return false;
        }

        return true;
    }
</script>

</body>
</html>
