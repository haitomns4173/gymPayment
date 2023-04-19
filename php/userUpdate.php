<?php
    include 'sqlConnection.php';

    if (isset($_GET['userIdToUpdate'])) {
        $id = $_GET['userIdToUpdate'];

        $username = $_POST['adminUsername'];
        $email = $_POST['adminEmail'];
        $password = $_POST['adminPassword'];
        $repeatPassword = $_POST['confirmAdminPassword'];
        $role = $_POST['userPosition'];

        if($password == $repeatPassword){
            $passwordEncrypt = password_hash($_POST['adminPassword'], PASSWORD_DEFAULT);
        
            $sql = "UPDATE `adminregistereduser` SET userName = '$username', userEmail = '$email', passwordHash = '$passwordEncrypt',  `userPermissionNo` = '$role' WHERE userIdentity = '$id'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script> alert('User updated successfully'); </script>";
                echo "<script> window.location.href='../userProfile.php'; </script>";	
            } else {
                echo "<script> alert('Error updating user'); </script>";
                echo "<script>window.history.back();</script>";
            }
        }
        else{
            echo "<script> alert('Passwords do not match'); </script>";
            echo "<script>window.history.back();</script>";
        }
    }
    else{
        echo "<script> alert('Error updating user'); </script>";
        echo "<script> window.location.href='../userProfile.php'; </script>";
    }
?>