<?php 
include 'sqlConnection.php';

$member_id  = $_POST['member_id'];
$amount     = $_POST['amount'];
$payment_date = $_POST['payment_date'];

$sql_check_user = "SELECT * FROM `members_list` WHERE member_id = '$member_id'";
$result = $conn->query($sql_check_user);

if($result->num_rows == 0){
    echo "<Script>alert('Member Id Not Found');</Script>";
    echo "<Script>window.location.href='../payment.php';</Script>";
    exit();
}

$sql = "INSERT INTO `payment_list`(`payment_Id`, `member_id`, `payment_amt`, `date`) VALUES (null,'".$member_id."','".$amount."','".$payment_date."')";
if(mysqli_query($conn,$sql)){
    echo "<Script>alert('Payment Added Successfully');</Script>";
    echo "<Script>window.location.href='../payment.php';</Script>";
}else{
    echo "<Script>alert('Payment Not Added');</Script>";
    echo "<Script>window.location.href='../payment.php';</Script>";
}
?>