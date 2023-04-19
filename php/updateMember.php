<?php
    include 'sqlConnection.php';

    if(isset($_GET['member_id'])){
        $member_id = $_GET['member_id'];

        $member_name = $_POST['member_name'];
        $member_phone = $_POST['member_phone'];
        $member_address = $_POST['member_address'];
        $member_bloodGroup = $_POST['member_bloodgroup'];
        $member_height = $_POST['member_height'];
        $member_weight = $_POST['member_weight'];

        $sql = "UPDATE `members_list` SET `full_name`='$member_name',`phone`='$member_phone',`address`='$member_address',`blood_group`='$member_bloodGroup',`height`='$member_height',`weight`='$member_weight' WHERE member_id = '$member_id'";
        $result = $conn->query($sql);
        if($result){
            echo "<script>alert('Member Updated Successfully')</script>";
            echo "<script>window.location.href = '../members.php'</script>";
        }
        else{
            echo "<script>alert('Error Occurred')</script>";
            echo "<script>window.location.href = '../members.php'</script>";
        }
    }
    else{
        echo "<script>alert('Internal Error Occurred')</script>";
    }