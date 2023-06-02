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

$row = $result->fetch_assoc();
if($row['dues'] > 0 && $row['dues'] <= $amount){
    $left_dues = 0;
} 
else if($row['dues'] > 0 && $row['dues'] > $amount){
    $left_dues = $row['dues'] - $amount;
}
else{
    $left_dues = 0;
}

$sql_update_dues = "UPDATE `members_list` SET `dues`=".$left_dues." WHERE member_id = '$member_id'";

if(mysqli_query($conn,$sql_update_dues)){
    $sql = "INSERT INTO `payment_list`(`payment_Id`, `member_id`, `payment_amt`, `paid_date`) VALUES (null,'".$member_id."','".$amount."','".$payment_date."')";
    if(mysqli_query($conn,$sql)){
        echo "<Script>alert('Payment Added Successfully');</Script>";
        echo "<Script>window.location.href='../payment.php';</Script>";
    }else{
        echo "<Script>alert('Payment Not Added');</Script>";
        echo "<Script>window.location.href='../payment.php';</Script>";
    }
}else{
    echo "<Script>alert('Dues Not Updated');</Script>";
    echo "<Script>window.location.href='../payment.php';</Script>";
}