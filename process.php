
<?php
// Include the database connection file
require 'con.php';

/// Start the session to use session variables
session_start();

// Function to sanitize input data
function sanitizeInput($data) {
    return htmlspecialchars(trim($data));
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input data
    $name = sanitizeInput($_POST['name']);
    $password = sanitizeInput($_POST['password']);
    $email = sanitizeInput($_POST['email']);
    $age = sanitizeInput($_POST['age']);
    $phone = sanitizeInput($_POST['phone']);

    // Validate inputs
    if (empty($name) || empty($password) || empty($email) || empty($age) || empty($phone)) {
        $_SESSION['message'] = ["content" => "All fields are required.", "type" => "error"];
        header("Location: form_page.php");
        exit;
    }

    // Check for duplicate email or phone in the adminlogin table
    try {
        $sql_check = "SELECT COUNT(*) FROM adminlogin WHERE l_userName = :email OR phone = :phone";
        $stmt_check = $pdo->prepare($sql_check);
        $stmt_check->execute([
            ':email' => $email,
            ':phone' => $phone
        ]);
        $count = $stmt_check->fetchColumn();

        if ($count > 0) {
            $_SESSION['message'] = ["content" => "An account with this email or phone number already exists.", "type" => "error"];
            header("Location: form_page.php");
            exit;
        }

        // Insert data into the `employee` table
        $sql_employee = "INSERT INTO employee (l_name, l_number, l_age) VALUES (:name, :phone, :age)";
        $stmt_employee = $pdo->prepare($sql_employee);
        $stmt_employee->execute([
            ':name' => $name,
            ':phone' => $phone,
            ':age' => $age
        ]);

        // Get the last inserted ID (assuming l_number is auto-incremented)
        $lastInsertId = $pdo->lastInsertId();

        // Insert data into the `adminlogin` table
        $sql_adminlogin = "INSERT INTO adminlogin (l_userName, l_userPassword, phone) VALUES (:email, :password, :phone)";
        $stmt_adminlogin = $pdo->prepare($sql_adminlogin);
        $stmt_adminlogin->execute([
            ':email' => $email,
            ':password' => password_hash($password, PASSWORD_DEFAULT), // Hash the password for security
            ':phone' => $phone
        ]);

        $_SESSION['message'] = ["content" => "Data inserted successfully.", "type" => "success"];
        header("Location: form_page.php");
        exit;
    } catch (PDOException $e) {
        $_SESSION['message'] = ["content" => "Error inserting data: " . $e->getMessage(), "type" => "error"];
        header("Location: form_page.php");
        exit;
    }
} else {
    $_SESSION['message'] = ["content" => "Invalid request method.", "type" => "error"];
    header("Location: form_page.php");
    exit;
}
?>
