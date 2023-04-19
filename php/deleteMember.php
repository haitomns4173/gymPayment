<?php
    include 'sqlConnection.php';

    if(isset($_GET['member_id'])){
        $member_id = $_GET['member_id'];
        $sql = "DELETE FROM `payment_list` WHERE member_id = '$member_id'";
        $sql_user = "DELETE FROM `members_list` WHERE member_id = '$member_id'";
        $result = $conn->query($sql);
        $result_user = $conn->query($sql_user);
        if($result && $result_user){
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