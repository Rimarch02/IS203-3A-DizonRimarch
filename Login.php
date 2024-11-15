<?php
require('./Read.php');

if (isset($_POST['login'])) {
    $Uname = $_POST['Uname'];
    $Pname = $_POST['Pname'];

    // Prepare the SQL query to prevent SQL injection
    $queryAccount = "SELECT * FROM register WHERE username = ? AND password = ?";
    $stmt = mysqli_prepare($connection, $queryAccount);
    
    // Bind the username and password
    mysqli_stmt_bind_param($stmt, "ss", $Uname, $Pname);
    mysqli_stmt_execute($stmt);
    
    // Store the result to check if any rows were returned
    mysqli_stmt_store_result($stmt);

    // Check if a match was found
    if (mysqli_stmt_num_rows($stmt) > 0) {
        // Login successful
        echo '<script>alert("Login Successfully!")</script>';
        echo '<script>window.location.href = "/RIMARCHDIZON/Index.php"</script>';
    } else {
        // Login failed
        echo '<script>alert("Invalid Username or Password!")</script>';
        echo '<script>window.location.href = "Login.php"</script>';
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}

// Close the connection
mysqli_close($connection);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Information</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
        }

        h1, h3 {
            text-align: center;
            color: #333;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #5cb85c;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>
<div class="container">     
        <form action="Login.php" method="post">
        <br>
        <h1>Login</h1>
        </br>  
 
        <input type="text" name="Uname" placeholder="Enter your Username" required />
        <input type="text" name="Pname" placeholder="Enter your Password" required />
        <input type="submit" name="login" value="Login" class="btn btn-primary"/>

        <div class="login-link">
            <p>You don have an account? <a href="/RIMARCHDIZON/Signup.php">Signup here</a></p>
        </div>
        </form>
    </div>
</body>
</html>
