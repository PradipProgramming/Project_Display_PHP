<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professional Input Form</title>
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
        .form-container {
            background: #ffffff;
            padding: 40px 30px;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
            max-width: 450px;
            width: 100%;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .form-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.3);
        }
        .form-container h2 {
            margin-bottom: 30px;
            font-weight: 700;
            color: #333;
            text-align: center;
        }
        .form-group label {
            font-weight: 500;
            color: #555;
        }
        .form-control {
            border-radius: 8px;
            box-shadow: none;
            border: 1px solid #ced4da;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }
        .form-control:focus {
            border-color: #2575fc;
            box-shadow: 0 0 10px rgba(37, 117, 252, 0.3);
        }
        .input-group-text {
            background-color: #f8f9fa;
            border-color: #ced4da;
            border-radius: 8px 0 0 8px;
        }
        .btn-primary {
            background-image: linear-gradient(to right, #6a11cb, #2575fc);
            border: none;
            padding: 15px 25px;
            font-size: 18px;
            border-radius: 50px;
            transition: background-image 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
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
<div class="form-container">
    <h2>Register</h2>
    <form method="post" action="process.php">
        <div class="form-group">
            <label for="name">Name</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
            </div>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                </div>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
            </div>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                </div>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
            </div>
        </div>
        <div class="form-group">
            <label for="age">Age</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                </div>
                <input type="number" class="form-control" id="age" name="age" placeholder="Enter Age" required>
            </div>
        </div>
        <div class="form-group">
            <label for="phone">Phone Number</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                </div>
                <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
    </form>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
