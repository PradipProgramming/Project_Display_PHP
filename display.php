<?php
// Include database connection file
require 'con.php';

// Fetch data from the `employee` and `adminlogin` tables
try {
    $sql_employee = "SELECT * FROM employee";
    $stmt_employee = $pdo->prepare($sql_employee);
    $stmt_employee->execute();
    $employees = $stmt_employee->fetchAll(PDO::FETCH_ASSOC);

    $sql_adminlogin = "SELECT * FROM adminlogin";
    $stmt_adminlogin = $pdo->prepare($sql_adminlogin);
    $stmt_adminlogin->execute();
    $adminlogins = $stmt_adminlogin->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error fetching data: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Data</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS for a more polished and modern look -->
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 20px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .container {
            max-width: 1200px;
        }
        .table th, .table td {
            vertical-align: middle;
            text-align: center;
        }
        .btn-action {
            margin: 0 5px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #212529;
        }
        .btn-warning:hover {
            background-color: #e0a800;
            border-color: #d39e00;
            color: #212529;
            transform: translateY(-2px);
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
            color: #fff;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
            color: #fff;
            transform: translateY(-2px);
        }
        .card-header {
            background-color: #343a40;
            color: #fff;
            text-align: center;
            font-size: 1.25rem;
            letter-spacing: 1px;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #e9ecef;
        }
        .table-striped tbody tr:hover {
            background-color: #d6d8db;
        }
        .card {
            border: none;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .table {
            margin-bottom: 0;
            border-radius: 10px;
            overflow: hidden;
        }
        .table th {
            background-color: #6c757d;
            color: #fff;
        }
    </style>
</head>
<body>

<div class="container">
    <h1 class="mb-4 text-center">Data Display</h1>

    <!-- Employee Table -->
    <div class="card mb-4">
        <div class="card-header">
            Employee Table
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Number</th>
                        <th>Age</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($employees as $employee): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($employee['l_name'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($employee['l_number'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($employee['l_age'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td>
                                <a href="./update_employee.php?id=<?php echo htmlspecialchars($employee['l_id'], ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-warning btn-action">Update</a>
                                <a href="./delete_employee.php?id=<?php echo htmlspecialchars($employee['l_id'], ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-danger btn-action">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Admin Login Table -->
    <div class="card mb-4">
        <div class="card-header">
            Admin Login Table
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($adminlogins as $adminlogin): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($adminlogin['l_userName'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($adminlogin['l_userPassword'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($adminlogin['phone'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td>
                                <a href="./update_adminlogin.php?id=<?php echo htmlspecialchars($adminlogin['l_id'], ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-warning btn-action">Update</a>
                                <a href="./delete_adminlogin.php?id=<?php echo htmlspecialchars($adminlogin['l_id'], ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-danger btn-action">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
