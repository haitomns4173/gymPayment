<?php
include 'sqlConnection.php'; 

if ($stmt = $conn->prepare('SELECT `userIdentity`, `passwordHash`, `userPermissionNo` FROM `adminregistereduser` WHERE userName = ?')) {

	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();

	$stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($userId, $password, $userPermit);
        $stmt->fetch();

        if (password_verify($_POST['password'], $password)) {
            session_start();
            session_regenerate_id();
            $_SESSION['loggedIn'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $userId;
            $_SESSION['userPermission'] = $userPermit;

            header('Location: ../index.php');
        } else {
            echo '<script>alert("Incorrect Username or Password");</script>';
            echo '<script>window.location="../auth-login.html"</script>';
        }
    } else {
        echo '<script>alert("Incorrect Username or Password");</script>';
        echo '<script>window.location="../auth-login.html"</script>';
    }

	$stmt->close();
}
?>