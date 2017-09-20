<?php
require_once "dbConnect.php";

$filename = 'users.csv';

//Creating the file
$file = fopen($filename,"w");

//Fetch users
$sth = $conn->prepare("SELECT * FROM user");
$sth->execute();
$users  = $sth->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <title>Sample Excel</title>
</head>
<body>
<div class="container" style="width: 800px;">
    <h3>Employee Table</h3>
    <table class="table">
        <thead>
        <tr>
            <td>Employee Id</td>
            <td>User Type</td>
            <td>Username</td>
            <td>Password</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user):?>
        <tr>
            <td><?php echo $user['employee_id']?></td>
            <td><?php echo $user['user_type']?></td>
            <td><?php echo $user['username']?></td>
            <td><?php echo $user['password']?></td>
        </tr>
        <?php endforeach;?>
        </tbody>
    </table>

    <a href="export.php" class="btn btn-info" role="button">Download CSV</a>
</div>
</body>
</html>

