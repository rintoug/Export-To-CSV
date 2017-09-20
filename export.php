<?php
require_once "dbConnect.php";

$filename = 'users.csv';

//Creating the file
$file = fopen($filename,"w");

//Fetch users
$sth = $conn->prepare("SELECT * FROM user");
$sth->execute();
$users  = $sth->fetchAll(PDO::FETCH_ASSOC);

//Header
fputcsv($file,array("INC ID","Emp ID","Emp Name","Type","Password"));

foreach($users as $line) {
    fputcsv($file,array_values($line));
}

fclose($file);

// download the excel
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=$filename");
header("Content-Type: application/csv; ");

//Do not cache this file
header('Pragma: no-cache');
header('Expires: 0');

readfile($filename);

// deleting file
unlink($filename);
exit();




