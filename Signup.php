<?php
require('./Database.php');


if (isset($_POST['signup'])){
    $Uname = $_POST['Uname'];
    $Ename = $_POST['Ename'];
    $Pname = $_POST['Pname'];
    

    $querrySignup = "INSERT INTO register VALUES (null, '$Uname', '$Ename', '$Pname')";
    $sqlsignup = mysqli_query($connection, $querrySignup);

    echo '<script>alert("Register Successfully!")</script>';
    echo '<script>window.location.href = "/RIMARCHDIZON/Login.php"</script>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Information</title>
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
        <form action="Signup.php" method="post">
        <br>
        <h1>Signup</h1>
        </br>  
 
        <input type="text" name="Uname" placeholder="Enter your Username" required />
        <input type="text" name="Ename" placeholder="Enter your Email" required />
        <input type="text" name="Pname" placeholder="Enter your Password" required />
        <input type="submit" name="signup" value="Signup" class="btn btn-primary"/>

        <div class="login-link">
            <p>Already have an account? <a href="/RIMARCHDIZON/Login.php">Login here</a></p>
        </div>
        </form>
    </div>
</body>
</html>