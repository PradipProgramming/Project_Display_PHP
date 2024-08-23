<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submission Result</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            font-family: 'Roboto', sans-serif;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .result-container {
            background: #ffffff;
            padding: 40px 30px;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
            max-width: 450px;
            width: 100%;
            border-top: 5px solid;
            border-image: linear-gradient(to right, #6a11cb, #2575fc) 1;
            animation: fadeIn 1s ease-out forwards;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
        .result-container h2 {
            margin-bottom: 20px;
            font-weight: 700;
            color: #333;
            text-align: center;
        }
        .alert {
            border-radius: 8px;
            padding: 15px;
            font-size: 16px;
            text-align: center;
        }
        .btn-primary {
            background-image: linear-gradient(to right, #6a11cb, #2575fc);
            border: none;
            padding: 15px 25px;
            font-size: 18px;
            border-radius: 50px;
            width: 100%;
            transition: background-image 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
            margin-top: 20px;
        }
        .btn-primary:hover {
            background-image: linear-gradient(to right, #2575fc, #6a11cb);
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }
        .btn-primary:focus {
            outline: none;
            box-shadow: 0 0 10px rgba(37, 117, 252, 0.4);
        }
    </style>
</head>
<body>
<div class="result-container">
    <h2>Form Submission Result</h2>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get and sanitize form inputs
        $name = htmlspecialchars($_POST['name']);
        $password = htmlspecialchars($_POST['password']);
        $email = htmlspecialchars($_POST['email']);
        $age = htmlspecialchars($_POST['age']);
        $phone = htmlspecialchars($_POST['phone']);

        // Validate form data
        if (!empty($name) && !empty($password) && !empty($email) && !empty($age) && !empty($phone)) {
            // Process the form data (e.g., save to database)
            // Display success message with a summary
            echo '<div class="alert alert-success">
                    <i class="fas fa-check-circle"></i> 
                    Your form has been submitted successfully!
                  </div>';
            echo '<p><strong>Name:</strong> ' . $name . '</p>';
            echo '<p><strong>Email:</strong> ' . $email . '</p>';
            echo '<p><strong>Age:</strong> ' . $age . '</p>';
            echo '<p><strong>Phone:</strong> ' . $phone . '</p>';
        } else {
            // Display error message
            echo '<div class="alert alert-danger">
                    <i class="fas fa-exclamation-triangle"></i> 
                    Please fill in all fields correctly.
                  </div>';
        }
    } else {
        // Invalid request method
        echo '<div class="alert alert-danger">
                <i class="fas fa-exclamation-triangle"></i> 
                Invalid request. Please try again.
              </div>';
    }
    ?>
    <a href="index.html" class="btn btn-primary">Go Back</a>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
