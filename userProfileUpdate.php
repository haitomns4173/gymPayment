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
    <title>Profile - Gym Payment Dashboard</title>

    <link rel="stylesheet" href="assets/css/main/app.css" />
    <link rel="stylesheet" href="assets/css/main/app-dark.css" />
    <link rel="shortcut icon" href="assets/images/logo/favicon.svg" type="image/x-icon" />
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/png" />

    <link rel="stylesheet" href="assets/css/shared/iconly.css" />

    <script src="assets/extensions/jquery/jquery.min.js"></script>
    <script src="assets/extensions/parsleyjs/parsley.min.js"></script>
    <script src="assets/js/pages/parsley.js"></script>
</head>

<body>
    <script src="assets/js/initTheme.js"></script>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <a href="index.php"><img src="assets/images/logo/logo.svg" alt="Logo" srcset="" /></a>
                        </div>
                        <div class="theme-toggle d-flex gap-2 align-items-center mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                                <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2" opacity=".3"></path>
                                    <g transform="translate(-210 -1)">
                                        <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                        <circle cx="220.5" cy="11.5" r="4"></circle>
                                        <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2">
                                        </path>
                                    </g>
                                </g>
                            </svg>
                            <div class="form-check form-switch fs-6">
                                <input class="form-check-input me-0" type="checkbox" id="toggle-dark" style="cursor: pointer" />
                                <label class="form-check-label"></label>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                <path fill="currentColor" d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                                </path>
                            </svg>
                        </div>
                        <div class="sidebar-toggler x">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">

                        <li class="sidebar-item">
                            <a href="index.php" class="sidebar-link">
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="members.php" class="sidebar-link">
                                <i class="bi bi-menu-button-wide-fill"></i>
                                <span>Members</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="payment.php" class="sidebar-link">
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>Payment</span>
                            </a>
                        </li>

                        <li class="sidebar-item active">
                            <a href="userProfile.php" class="sidebar-link">
                                <i class="bi bi-person-badge-fill"></i>
                                <span>Profile</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="developer.php" class="sidebar-link">
                                <i class="bi bi-life-preserver"></i>
                                <span>Developers</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Profile Page</h3>
            </div>
            <section id="basic-horizontal-layouts">
                <div class="row match-height">
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Update User Profile</h4>
                            </div>
                            <?php
                            include 'php/sqlConnection.php';

                            if (isset($_GET['userUpdateID'])) {
                                $idUpdate = $_GET['userUpdateID'];

                                $sql = "SELECT * FROM `adminregistereduser` WHERE userIdentity = $idUpdate;";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($result);

                                echo "
                                <div class='card-content'>
                                <div class='card-body'>
                                    <form action='php/userUpdate.php?userIdToUpdate=$idUpdate' method='post' class='form form-horizontal' data-parsley-validate>
                                        <div class='form-body'>
                                            <div class='row'>
                                                <div class='col-md-4'>
                                                    <label>Username</label>
                                                </div>
                                                <div class='col-md-8'>
                                                    <div class='form-group has-icon-left'>
                                                        <div class='position-relative'>
                                                            <input type='text' class='form-control' placeholder='Username' id='first-name-icon' name='adminUsername' value='" . $row['userName'] . "' data-parsley-required/>
                                                            <div class='form-control-icon'>
                                                                <i class='bi bi-person'></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='col-md-4'>
                                                    <label>Email</label>
                                                </div>
                                                <div class='col-md-8'>
                                                    <div class='form-group has-icon-left'>
                                                        <div class='position-relative'>
                                                            <input type='email' class='form-control' placeholder='Email' id='first-name-icon' name='adminEmail' value='" . $row['userEmail'] . "' data-parsley-required/>
                                                            <div class='form-control-icon'>
                                                                <i class='bi bi-envelope'></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='col-md-4'>
                                                    <label>Password</label>
                                                </div>
                                                <div class='col-md-8'>
                                                    <div class='form-group has-icon-left'>
                                                        <div class='position-relative'>
                                                            <input type='password' class='form-control' placeholder='Password' name='adminPassword' data-parsley-required/>
                                                            <div class='form-control-icon'>
                                                                <i class='bi bi-lock'></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='col-md-4'>
                                                    <label>Repeat Password</label>
                                                </div>
                                                <div class='col-md-8'>
                                                    <div class='form-group has-icon-left'>
                                                        <div class='position-relative'>
                                                            <input type='password' class='form-control' placeholder='Password' name='confirmAdminPassword' data-parsley-required/>
                                                            <div class='form-control-icon'>
                                                                <i class='bi bi-lock'></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='col-md-4'>
                                                    <label>Position</label>
                                                </div>
                                                <div class='col-md-8'>
                                                    <div class='form-group has-icon-left'>
                                                        <div class='position-relative'>
                                                            <select class='form-select' id='basicSelect' name='userPosition'>
                                                                <option value='0' disabled selected hidden>Position</option>
                                                                    <option value='1'>Admin</option>";

                                                     echo "</select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='col-12 d-flex justify-content-end'>
                                                    <button type='submit' class='btn btn-warning me-1 mb-1'>
                                                        Update
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>";
                            } else {
                                echo "Error updating user";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </section>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>
                            <script>
                                document.write(new Date().getFullYear())
                            </script> &copy; Haitomns Groups
                        </p>
                    </div>
                    <div class="float-end">
                        <p>
                            Programmed with
                            <span class="text-danger"><i class="bi bi-heart"></i></span> by
                            <a href="https://haitomns.com">Haitomns Groups</a>
                        </p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/app.js"></script>

    <!-- Need: Apexcharts -->
    <script src="assets/extensions/apexcharts/apexcharts.min.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>
</body>

</html>