<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <style>
        /* Center the form container */
        .form-container {
            width: 300px;
            height: 450px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        /* Style form elements */
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            background-color: #6F7D8C;
        }
        input[type="submit"] {
            background-color: #32021F;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            margin-top: 30px;
        }
        input[type="submit"]:hover {
            background-color: #4B2E39;
        }
        .error-message {
            color: red;
            margin-top: 5px;
        }
        h2 {
            text-align: center;
        }
         
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Sign Up</h2>
        <form id="register" action="RegisterPage.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <label for="confirmPassword">Confirm Password:</label>
            <input type="password" id="confirmPassword" name="confirmPassword" required>
            <div id="passwordError" class="error-message"></div>
            
            <label for="userType">User Type:</label>
            <select id="userType" name="userType" required>
                <option value="">Select User Type</option>
                <option value="Professor">Professor</option>
                <option value="Student">Student</option>
                <option value="TA">TA</option>
            </select>
            
            <input type="submit" value="Submit">
        </form>
    </div>

    <script>
        document.getElementById('register').addEventListener('submit', function(event) {
            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('confirmPassword').value;

            if (password !== confirmPassword) {
                document.getElementById('passwordError').innerText = 'Passwords do not match';
                event.preventDefault(); 
            } else {
                document.getElementById('passwordError').innerText = '';
            }
        })

        
    </script>

</body>
</html>

<?php
require '/home/peguibar/connections/connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $userType = $_POST["userType"];
    $password = $_POST["password"];

    $query = 'INSERT INTO Users (um_email, user_type, password) VALUES (:email, :userType, :password)'; 

    $stmt = $conn->prepare($query); 
    $stmt->bindParam(':email', $email); 
    $stmt->bindParam(':userType', $userType); 
    $stmt->bindParam(':password', $password); 

    try {
        $stmt->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    header("Location: Login.php");
}
?>
