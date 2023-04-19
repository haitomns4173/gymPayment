<?php
    include 'sqlConnection.php';

    if(isset($_GET['userIdDelete'])){
        $userId = $_GET['userIdDelete'];

        $sql = "DELETE FROM `adminregistereduser` WHERE userIdentity = $userId";

        if($conn->query($sql) === TRUE){
            echo "<script>alert('User Deleted');</script>";
            echo "<script>window.location='../userProfile.php';</script>";
        }
        else{
            echo "<script>alert('User Not Deleted');</script>";
            echo "<script>window.location='../userProfile.php';</script>";
        }
    }
    else{
        echo "<script>alert('User Not Deleted');</script>";
        echo "<script>window.location='../userProfile.php';</script>";
    }
?>