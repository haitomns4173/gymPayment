<?php
    include 'sqlConnection.php';

    if(isset($_GET['member_id'])){
        $member_id = $_GET['member_id'];
        $sql = "DELETE FROM `payment_list` WHERE payment_id = '$member_id'";
        $result = $conn->query($sql);
        if($result){
            echo "<script>alert('Member Deleted Successfully')</script>";
            echo "<script>window.location.href = '../index.php'</script>";
        }
        else{
            echo "<script>alert('Error Occurred')</script>";
        }
    }
    else{
        echo "<script>alert('Internal Error Occurred')</script>";
    }