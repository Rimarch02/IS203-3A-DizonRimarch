<?php
require('./Read.php');
$valueToSearch = '';
if (isset($_POST['search'])) {
    $valueToSearch = $_POST['valueToSearh'];
    $query = "SELECT * FROM tbl3a WHERE FirstName LIKE '%$valueToSearch%' OR LastName LIKE '%$valueToSearch%'";
} else {
    $query = "SELECT * FROM tbl3a";
}
$sqlAccount = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #f3f4f6;
            color: #333;
            font-family: Arial, sans-serif;
        }
        .wrapper {
            display: flex;
            height: 100vh;
        }
        .sidebar {
            width: 250px;
            background-color: #333;
            color: #fff;
            display: flex;
            flex-direction: column;
            padding: 20px;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li {
            padding: 10px 0;
        }
        .sidebar ul li a {
            color: #ddd;
            text-decoration: none;
            padding: 8px 12px;
            display: block;
            border-radius: 4px;
        }
        .sidebar ul li a:hover {
            background-color: #444;
        }
        .content {
            flex-grow: 1;
            padding: 30px;
            background-color: #fff;
        }
        h1 {
            color: #007bff;
            font-weight: 700;
        }
        #printButton {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        #printButton:hover {
            background-color: #0056b3;
        }
        @media print {
            #printButton {
                display: none;
            }
        }
    </style>
</head>
<body>

<div class="wrapper">
    <div class="sidebar">
        <h4>Dashboard</h4>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="Email.php">Email Notification</a></li>
            <li><a href="SMS.php">SMS API</a></li>
            <li><a href="ChangePassword.php">Change Password</a></li>
        </ul>
    </div>

    <button id="printButton" onclick="window.print()">Print</button>

    <div class="content">
        <h1>Welcome</h1>
        <p>Manage user information below.</p>

        <!-- Create User Form -->
        <form action="Create.php" method="post" class="row g-3 mb-4">
            <div class="col-md-4">
                <input type="text" class="form-control" name="Fname" placeholder="Enter your Firstname" required />
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" name="Mname" placeholder="Enter your Middlename" required />
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" name="Lname" placeholder="Enter your Lastname" required />
            </div>
            <div class="col-md-12">
            <center>  <button type="submit" name="create" class="btn btn-primary w-45">Create User</button></center>
            </div>
        </form>

        <!-- Search Form -->
        <div class="row mb-4">
            <div class="col">
                <form action="" method="POST" class="input-group">
                    <input type="search" name="valueToSearh" placeholder="Search by First or Last Name" 
                           class="form-control">
                    <button type="submit" class="btn btn-primary" name="search">Search</button>
                </form>
            </div>
        </div>
        
        <!-- List of Users -->
        <h3>User List</h3>
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>FirstName</th>
                    <th>MiddleName</th>
                    <th>LastName</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while($results = mysqli_fetch_array($sqlAccount)) { ?>
                    <tr>
                        <td><?php echo $results['ID']; ?></td>
                        <td><?php echo $results['FirstName']; ?></td>
                        <td><?php echo $results['MiddlName']; ?></td>
                        <td><?php echo $results['LastName']; ?></td>
                        <td>
                            <form action="Edit.php" method="post" style="display:inline-block;">
                                <input type="hidden" name="editID" value="<?php echo $results['ID']; ?>">
                                <input type="hidden" name="editF" value="<?php echo $results['FirstName']; ?>">
                                <input type="hidden" name="editM" value="<?php echo $results['MiddlName']; ?>">
                                <input type="hidden" name="editL" value="<?php echo $results['LastName']; ?>">
                                <button type="submit" name="edit" class="btn btn-warning btn-sm">Edit</button>
                            </form>
                            <form action="Delete.php" method="post" style="display:inline-block;">
                                <input type="hidden" name="deleteID" value="<?php echo $results['ID']; ?>">
                                <button type="submit" name="delete" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
