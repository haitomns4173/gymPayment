<?php
    include 'sqlConnection.php';

    if (isset($_FILES['member_image']) && isset($_GET['member_id'])) {
        $foodIdUpdate = $_GET['member_id'];

        $errors = array();
        $file_name = $_FILES['member_image']['name'];
        $file_size = $_FILES['member_image']['size'];
        $file_tmp = $_FILES['member_image']['tmp_name'];
        $file_type = $_FILES['member_image']['type'];
        $explode = explode('.', $_FILES['member_image']['name']);
        $file_ext = strtolower(end($explode));
        $extensions = array("jpeg", "jpg", "png");
        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
            echo "<script>alert('File Extension not allowed, please choose a JPEG or PNG file.');</script>";
            echo "<script>window.history.back();</script>";
        }
        if ($file_size > 2097152) {
            $errors[] = 'File size must be excately 2 MB';
            echo "<script>alert('File size must be excately 2 MB');</script>";
            echo "<script>window.history.back();</script>";
        }
        if (empty($errors) == true) {
            $file_name = uniqid() . '.' . $file_ext;
            move_uploaded_file($file_tmp, "images/" . $file_name);
    
            $file_directory = "images/" . $file_name;

            $sql_delete_image = "SELECT * FROM `members_list` WHERE member_id = $foodIdUpdate";
            $result = $conn->query($sql_delete_image);
            $row = $result->fetch_assoc();
            $image = $row['member_image'];
            if(file_exists($image)){
                unlink($image);
            } 

            $sql_image_update = "UPDATE `members_list` SET `member_image`='$file_directory' WHERE member_id = $foodIdUpdate";
            $result_image_update = mysqli_query($conn, $sql_image_update);
            if ($result_image_update) {
                echo "<script>alert('Image updated successfully');</script>";
                echo "<script>window.location.href='../members.php';</script>";
            } else {
                echo "<script>alert('Error updating image');</script>";
                echo "<script>window.location.href='../members.php';</script>";
            }
        }
    }
    else{
        echo "<script>alert('Image not updated');</script>";
        echo "<script>window.location.href='../members.php';</script>";
    }
?>