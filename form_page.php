<?php
session_start();

// Function to display messages in a modal
function displayModalMessage() {
    if (isset($_SESSION['message'])) {
        $message = $_SESSION['message'];
        $alertClass = ($message['type'] == 'error') ? 'alert-danger' : 'alert-success';
        $formPageUrl = 'form_page.php'; // URL to redirect back to the form page

        echo "
        <div class='modal fade' id='messageModal' tabindex='-1' role='dialog' aria-labelledby='messageModalLabel' aria-hidden='true'>
            <div class='modal-dialog' role='document'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='messageModalLabel'>Message</h5>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>
                    <div class='modal-body'>
                        <div class='alert $alertClass' role='alert'>
                            {$message['content']}
                        </div>
                    </div>
                    <div class='modal-footer'>
                        <a href='/project1/index2.php' class='btn btn-primary'>Back to Form</a>
                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                    </div>
                </div>
            </div>
        </div>";

        // Clear the message after displaying
        unset($_SESSION['message']);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    

    <!-- Modal for displaying messages -->
    <?php displayModalMessage(); ?>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script>
        // Show the modal if there is a message
        $(document).ready(function() {
            if ($('#messageModal').length) {
                $('#messageModal').modal('show');
            }
        });
    </script>

</body>
</html>
