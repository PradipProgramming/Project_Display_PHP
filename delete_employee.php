<?php
require 'con.php';
session_start();

// Check if the ID is provided
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Attempt to delete the employee
    try {
        $sql = "DELETE FROM employee WHERE l_id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);

        // Set success message and redirect
        $_SESSION['message'] = ['type' => 'success', 'content' => 'Employee deleted successfully.'];
        header('Location: display.php');
        exit;
    } catch (PDOException $e) {
        // Set error message and redirect
        $_SESSION['message'] = ['type' => 'error', 'content' => 'Error deleting employee: ' . $e->getMessage()];
        header('Location: display.php');
        exit;
    }
} else {
    // Redirect with an error message if no ID is provided
    $_SESSION['message'] = ['type' => 'error', 'content' => 'Invalid request.'];
    header('Location: display.php');
    exit;
}
?>
