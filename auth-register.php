<?php
session_start();
if (!isset($_SESSION['loggedIn'])) {
  header('Location: auth-login.html');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register - Gym Payment Dashboard</title>
  <link rel="stylesheet" href="assets/css/main/app.css" />
  <link rel="stylesheet" href="assets/css/pages/auth.css" />
  <link rel="shortcut icon" href="assets/images/logo/favicon.svg" type="image/x-icon" />
  <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/png" />

  <script src="assets/extensions/jquery/jquery.min.js"></script>
  <script src="assets/extensions/parsleyjs/parsley.min.js"></script>
  <script src="assets/js/pages/parsley.js"></script>

  <style>
    .logoImage {
      position: absolute;
      top: 45%;
      left: 70%;
      transform: translate(-50%, -50%);
    }
    .logoTitle{
      position: absolute;
      top: 60%;
      left: 70%;
      transform: translate(-50%, -50%);
      font-size: 50px;
      font-weight: 700;
      color: #fff;
    }
    .logoTagline{
      position: absolute;
      top: 67%;
      left: 70%;
      transform: translate(-50%, -50%);
      font-size: 20px;
      font-weight: 700;
      color: #fff;
    }
  </style>
</head>

<body>
  <div id="auth">
    <div class="row h-100">
      <div class="col-lg-5 col-12">
        <div id="auth-left">
          <div class="auth-logo">
            <a href="index.php"><img src="assets/images/logo/logo.svg" alt="Logo" /></a>
          </div>
          <h1 class="auth-title">Sign Up</h1>
          <p class="auth-subtitle mb-5">
            Input your data to register to our website.
          </p>
          <form action="php/registerUser.php" method="post" class="form" data-parsley-validate>
            <div class="form-group mandatory">
              <div class="form-group position-relative has-icon-left mb-4">
                <label for="email-column" class="form-label" Hidden>Email</label>
                <input type="email" name="email" id="email-column" class="form-control form-control-xl" placeholder="Email"
                  data-parsley-required="true" />
                <div class="form-control-icon">
                  <i class="bi bi-envelope"></i>
                </div>
              </div>
              <div class="form-group position-relative has-icon-left mb-4">
                <label for="username-column" class="form-label" Hidden>Username</label>
                <input type="text" name="username" id="username-column" class="form-control form-control-xl" placeholder="Username"
                  data-parsley-required="true" />
                <div class="form-control-icon">
                  <i class="bi bi-person"></i>
                </div>
              </div>
              <div class="form-group position-relative has-icon-left mb-4">
                <label for="password-column" class="form-label" Hidden>Password</label>
                <input type="password" name="password" id="password-column" class="form-control form-control-xl" placeholder="Password"
                  data-parsley-required="true" />
                <div class="form-control-icon">
                  <i class="bi bi-shield-lock"></i>
                </div>
              </div>
              <div class="form-group position-relative has-icon-left mb-4">
                <label for="confirm-password-column" class="form-label" Hidden>Confirm Password</label>
                <input type="password" name="confirmPassword" id="confirm-password-column" class="form-control form-control-xl" placeholder="Confirm Password"
                  data-parsley-required="true" />
                <div class="form-control-icon">
                  <i class="bi bi-shield-lock"></i>
                </div>
              </div>
              
              <div class="form-group position-relative has-icon-left mb-4">
                <label for="role-column" class="form-label" Hidden>Position</label>
                <select id="role-column" name="role" class="form-control form-control-xl" placeholder="Role"
                  data-parsley-required="true">
                  <option value="0" disabled selected hidden>Position</option>
                  <option value="1">Admin</option>
                </select>
                <div class="form-control-icon">
                  <i class="bi bi-person"></i>
                </div>
              </div>
              <input type="submit" value ="Sign Up" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
            </div>
          </form>
          <div class="text-center mt-5 text-lg fs-4">
            <p class="text-gray-600">
              Already have an account?
              <a href="auth-login.html" class="font-bold">Log in</a>.
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">
          <div class="auth-content">
            <h1 class="logoTitle">Haitomns Groups</h1>
            <img src="assets\images\logo\haitomns_groups_logo.svg" class="logoImage" alt="Login" height="100px" width="100px"/>
            <h5 class="logoTagline"><i>Brings Changes</i></h5>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>