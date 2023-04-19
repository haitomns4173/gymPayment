<?php
include 'sqlConnection.php';

if ($stmt = $conn->prepare('SELECT 	userIdentity FROM adminregistereduser WHERE username = ?')) {

    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo 'Username exists, please choose another!';
    } else {

        if(strlen($_POST['username']) < 4){
            echo "<script>alert('Username must be of 4 digits');</script>";
            echo "<script>window.history.back();</script>";	
        }
        else if(strlen($_POST['password']) < 4){
            echo "<script>alert('Password must be of 4 digits');</script>";
            echo "<script>window.history.back();</script>";	
        }
        else if($_POST['password'] != $_POST['confirmPassword']){
            echo "<script>alert('Password and Confirm Password must be same');</script>";
            echo "<script>window.history.back();</script>";	
        }
        else{
            if ($stmt = $conn->prepare('INSERT INTO `adminregistereduser`(`userIdentity`, `userPermissionNo`, `userEmail`, `userName`, `passwordHash`, `createdDateTime`)VALUES (null, ?, ?, ?, ?, current_timestamp())')) {

                $passwordEncrypt = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
                $stmt->bind_param('isss', $_POST['role'], $_POST['email'], $_POST['username'], $passwordEncrypt);
                $stmt->execute();
                echo "<script>alert('User Registered');</script>";
                echo "<script>window.location.href='../userProfile.php';</script>";
            } else {
                echo "<script>alert('User Not Registered');</script>";
                echo "<script>window.history.back();</script>";	
            }
        }
    }
} else {
    echo "<script>alert('User Not Registered');</script>";
    echo "<script>window.history.back();</script>";	
}
$conn->close();
?>