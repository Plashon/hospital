<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Patient</title>
</head>
<body>
    <H1>Add Patient</H1>
    <form action="addpatient.php"method="POST">
   <input type="text" placeholder="Enter ID"name="p_id">
    <br><br>
    <input type="text" placeholder="Enter Name"name="p_name"> 
    <br><br>
    <input type="date" name="p_date">
    <br><br>
    <input type="text" placeholder="Enter Debt"name="p_debt">
    <br><br>
    <input type="submit">
    </form>
    </body>
</html>

<?php

if(!empty($_POST['p_id'])&& !empty($_POST['p_name'])&& !empty($_POST['p_date'])&& !empty($_POST['p_debt'])):
require 'connect.php';
$sql_insert="insert into patient values (:p_id, :p_name, :p_date, :p_debt  )";

$stmt=$conn->prepare($sql_insert);

$stmt->bindParam(":p_date", $_POST['p_date']);
$stmt->bindParam(":p_id", $_POST['p_id']);
$stmt->bindParam(":p_debt", $_POST['p_debt']);
$stmt->bindParam(":p_name", $_POST['p_name']);

if($stmt->execute()):
    
    $message = '       Suscessfully add new Patient';
    //header("Location:/business265/");
else:
    $message = '         Fail to add new Patient';
endif;
echo $message;
$conn = null;
endif;

?>