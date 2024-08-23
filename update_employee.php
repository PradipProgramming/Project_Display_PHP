<?php
require 'con.php';
session_start();

// Fetch the employee data based on the ID
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    try {
        $sql = "SELECT * FROM employee WHERE l_id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        $employee = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$employee) {
            $_SESSION['message'] = ['type' => 'error', 'content' => 'Employee not found.'];
            header('Location: display.php');
            exit;
        }
    } catch (PDOException $e) {
        $_SESSION['message'] = ['type' => 'error', 'content' => 'Error fetching employee data: ' . $e->getMessage()];
        header('Location: display.php');
        exit;
    }
} else {
    $_SESSION['message'] = ['type' => 'error', 'content' => 'Invalid request.'];
    header('Location: display.php');
    exit;
}

// Handle form submission for updating employee data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $number = htmlspecialchars(trim($_POST['number']));
    $age = htmlspecialchars(trim($_POST['age']));

    if (empty($name) || empty($number) || empty($age)) {
        $_SESSION['message'] = ['type' => 'error', 'content' => 'All fields are required.'];
    } else {
        try {
            $sql = "UPDATE employee SET l_name = :name, l_number = :number, l_age = :age WHERE l_id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':name' => $name,
                ':number' => $number,
                ':age' => $age,
                ':id' => $id
            ]);
            $_SESSION['message'] = ['type' => 'success', 'content' => 'Employee updated successfully.'];
            header('Location: display.php');
            exit;
        } catch (PDOException $e) {
            $_SESSION['message'] = ['type' => 'error', 'content' => 'Error updating employee data: ' . $e->getMessage()];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Employee</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .form-container {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        .form-container h2 {
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            font-weight: 600;
            margin-bottom: 5px;
        }
        .form-control {
            border-radius: 4px;
            border: 1px solid #ced4da;
            padding: 10px;
            font-size: 16px;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.25);
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #00408d;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .btn-secondary:hover {
            background-color: #565e64;
            border-color: #4e555b;
        }
        .alert {
            margin-bottom: 20px;
            font-size: 16px;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2 class="mb-4">Update Employee</h2>

    <!-- Displaying messages -->
    <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-<?php echo $_SESSION['message']['type']; ?>">
            <?php echo $_SESSION['message']['content']; ?>
        </div>
        
    <?php endif; ?>

    <form action="update_employee.php?id=<?php echo $id; ?>" method="post" onsubmit="return validateForm()">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars($employee['l_name']); ?>" placeholder="Enter employee name" required>
        </div>
        <div class="form-group">
            <label for="number">Number</label>
            <input type="text" id="number" name="number" class="form-control" value="<?php echo htmlspecialchars($employee['l_number']); ?>" placeholder="Enter employee number" required pattern="^[a-zA-Z0-9\s-]+$" title="Employee number can contain letters, numbers, spaces, and hyphens only.">
        </div>
        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" id="age" name="age" class="form-control" value="<?php echo htmlspecialchars($employee['l_age']); ?>" placeholder="Enter employee age" required min="18" max="65">
        </div>
        <button type="submit" onclick="update_fild()" class="btn btn-primary btn-block">Update</button>
        <a href="display.php" class="btn btn-secondary btn-block">Back</a>
    </form>
    
</div>
<?php unset($_SESSION['message']); ?>
<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script>
    function validateForm() {
        let name = document.getElementById('name').value.trim();
        let number = document.getElementById('number').value.trim();
        let age = document.getElementById('age').value;

        if (name === "" || number === "" || age === "") {
            alert("All fields are required.");
            return false;
        }

        // Name validation
        if (!/^[a-zA-Z\s]+$/.test(name)) {
            alert("Name can only contain letters and spaces.");
            return false;
        }

        // Number validation
        if (!/^[a-zA-Z0-9\s-]+$/.test(number)) {
            alert("Employee number can contain letters, numbers, spaces, and hyphens only.");
            return false;
        }

        // Age validation
        if (age < 18 || age > 65) {
            alert("Age must be between 18 and 65.");
            return false;
        }

        return true;
    }
</script>

</body>
</html>
