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
            overflow: hidden;
        }
        .form-container {
            background: #ffffff;
            padding: 40px 30px;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
            max-width: 450px;
            width: 100%;
            border-top: 5px solid;
            border-image: linear-gradient(to right, #6a11cb, #2575fc) 1;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
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
        .form-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.3);
        }
        .form-container h2 {
            margin-bottom: 30px;
            font-weight: 700;
            color: #333;
            text-align: center;
            animation: slideDown 0.5s ease-out forwards;
        }
        @keyframes slideDown {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
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
            animation: bounceIn 1s ease forwards;
        }
        @keyframes bounceIn {
            from {
                transform: scale(0.8);
                opacity: 0;
            }
            to {
                transform: scale(1);
                opacity: 1;
            }
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
        .error-message {
            color: red;
            font-size: 0.875em;
            display: none;
            margin-top: 5px;
        }
    </style>

</head>
<body>
<div class="form-container">
    <h2>Register</h2>
    <form id="registerForm" method="post" action="process.php">
        <div class="form-group">
            <label for="name">Name</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
            </div>
            <div class="error-message" id="nameError">Name is required.</div>
        </div>
        <div class="form-group">
        <label for="password">Password</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
            </div>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
            <button type="button" class="btn show-password" id="togglePassword">
                <i class="fas fa-eye"></i>
            </button>
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
            <div class="error-message" id="emailError">Please enter a valid email.</div>
        </div>
        <div class="form-group">
            <label for="age">Age</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                </div>
                <input type="number" class="form-control" id="age" name="age" placeholder="Enter Age" required>
            </div>
            <div class="error-message" id="ageError">Please enter a valid age.</div>
        </div>
        <div class="form-group">
            <label for="phone">Phone Number</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                </div>
                <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number" required>
            </div>
            <div class="error-message" id="phoneError">Please enter a valid phone number.</div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
    </form>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Form Validation Script -->
<script>
    document.getElementById('registerForm').addEventListener('submit', function (event) {
        let isValid = true;

        // Name Validation
        const name = document.getElementById('name').value;
        const nameError = document.getElementById('nameError');
        if (name === '') {
            nameError.textContent = 'Please enter your name.';
            nameError.style.display = 'block';
            isValid = false;
        } else {
            nameError.style.display = 'none';
        }

        // Password Validation
        // Password Validation
        const password = document.getElementById('password').value;
        const passwordError = document.getElementById('passwordError');
        const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

        if (!password.match(passwordPattern)) {
             passwordError.textContent = 'Password must be at least 8 characters long, including uppercase, lowercase, number, and special character.';
            passwordError.style.display = 'block';
            isValid = false;
        } else {
            passwordError.style.display = 'none';
            
        }


        // Email Validation
        const email = document.getElementById('email').value;
        const emailError = document.getElementById('emailError');
        const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        if (!email.match(emailPattern)) {
            emailError.textContent = 'Please enter a valid email address.';
            emailError.style.display = 'block';
            isValid = false;
        } else {
            emailError.style.display = 'none';
        }

        // Age Validation
        const age = document.getElementById('age').value;
        const ageError = document.getElementById('ageError');
        if (age <= 0 || age === '') {
            ageError.textContent = 'Please enter a valid age.';
            ageError.style.display = 'block';
            isValid = false;
        } else {
            ageError.style.display = 'none';
        }

        // Phone Number Validation
        const phone = document.getElementById('phone').value;
        const phoneError = document.getElementById('phoneError');
        const phonePattern = /^[0-9]{10}$/;
        if (!phone.match(phonePattern)) {
            phoneError.textContent = 'Phone number must be exactly 10 digits.';
            phoneError.style.display = 'block';
            isValid = false;
        } else {
            phoneError.style.display = 'none';
        }

        // Prevent form submission if validation fails
        if (!isValid) {
            event.preventDefault();
        }
    });
</script>
<script>
    document.getElementById('togglePassword').addEventListener('click', function () {
        const passwordField = document.getElementById('password');
        const passwordIcon = this.querySelector('i');

        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            passwordIcon.classList.remove('fa-eye');
            passwordIcon.classList.add('fa-eye-slash');
        } else {
            passwordField.type = 'password';
            passwordIcon.classList.remove('fa-eye-slash');
            passwordIcon.classList.add('fa-eye');
        }
    });
</script>

</body>
</html>
