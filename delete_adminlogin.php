<?php
require 'con.php';
session_start();

// Check if an ID is provided
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Delete the record
    try {
        $sql = "DELETE FROM adminlogin WHERE l_id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);

        $_SESSION['message'] = ['type' => 'success', 'content' => 'Record deleted successfully.'];
    } catch (PDOException $e) {
        $_SESSION['message'] = ['type' => 'error', 'content' => 'Error deleting record: ' . $e->getMessage()];
    }

    // Redirect to display page after deletion
    header('Location: display.php');
    exit;
} else {
    $_SESSION['message'] = ['type' => 'error', 'content' => 'Invalid request.'];
    header('Location: display.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Admin Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 20px;
        }
        .modal-content {
            border-radius: 10px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .modal-header {
            background-color: #007bff;
            color: white;
            border-bottom: 1px solid #007bff;
        }
        .modal-body {
            padding: 20px;
            font-family: 'Arial', sans-serif;
            color: #333;
        }
        .modal-footer {
            border-top: 1px solid #eeeeee;
            padding: 15px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            box-shadow: 0 4px 6px rgba(0, 123, 255, 0.3);
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #00408d;
            box-shadow: 0 6px 8px rgba(0, 123, 255, 0.4);
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
    </style>
</head>
<body>

<!-- Modal for displaying messages -->
<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="messageModalLabel">Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                if (isset($_SESSION['message'])) {
                    $message = $_SESSION['message'];
                    $alertClass = ($message['type'] == 'error') ? 'alert-danger' : 'alert-success';
                    echo "<div class='alert $alertClass' role='alert'>{$message['content']}</div>";
                    unset($_SESSION['message']);
                }
                ?>
            </div>
            <div class="modal-footer">
                <a href="display.php" class="btn btn-primary">Back to List</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    // Show the modal if there is a message
    $(document).ready(function() {
        $('#messageModal').modal('show');
    });
</script>

</body>
</html>
