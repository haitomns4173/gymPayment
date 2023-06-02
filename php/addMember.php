<?php
include 'sqlConnection.php';

$member_name = $_POST['member_name'];
$member_parentName = $_POST['member_parentName'];
$member_phone = $_POST['member_phone'];
$member_address = $_POST['member_address'];
$member_bloodgroup = $_POST['member_bloodgroup'];
$member_height = $_POST['member_height'];
$member_weight = $_POST['member_weight'];
$member_dues = $_POST['member_dues'];


if (isset($_FILES['member_image'])) {
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

        $sql = "INSERT INTO `members_list`(`member_id`, `full_name`, `parent_name`, `phone`, `address`, `blood_group`, `height`, `weight`, `dues`, `member_image`) VALUES (null,'".$member_name."','".$member_parentName."','".$member_phone."','".$member_address."','".$member_bloodgroup."','".$member_height."','".$member_weight."',".$member_dues.",'".$file_directory."')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('New record created successfully');</script>";
            echo "<script>window.location.href = '../members.php';</script>";
        } else {
            echo "<script>alert('Error: " . $sql . "<br>" . $conn->error."');</script>";
            echo "<script>window.location.href = '../members.php';</script>";
        }
    } else {
        echo "<script>alert('Error: " . $errors . "');</script>";
    }
}
?>