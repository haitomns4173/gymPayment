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
    <title>Members - Gym Payment Dashboard</title>

    <link rel="stylesheet" href="assets/css/main/app.css" />
    <link rel="stylesheet" href="assets/css/main/app-dark.css" />
    <link rel="shortcut icon" href="assets/images/logo/favicon.svg" type="image/x-icon" />
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/png" />

    <link rel="stylesheet" href="assets/css/shared/iconly.css" />

    <link rel="stylesheet" href="assets/extensions/simple-datatables/style.css" />
    <link rel="stylesheet" href="assets/css/pages/simple-datatables.css" />

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

                        <li class="sidebar-item active">
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

                        <li class="sidebar-item">
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
                <h3>Members Page</h3>
            </div>
            <section class="row">
                <div class="col-12 col-lg-5">
                    <div class="card widget-todo">
                        <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                            <h4 class="card-title d-flex">
                                <i class="bx bx-check font-medium-5 pl-25 pr-75"></i>Member Form
                            </h4>
                        </div>
                        <div class="card-body px-0 py-1">
                            <div class="card-content">
                                <div class="card-body">
                                    <form action="php/addMember.php" method="post" enctype="multipart/form-data" class="form form-vertical" data-parsley-validate>
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="first-name-vertical">Name</label>
                                                        <input type="text" id="first-name-vertical" class="form-control" name="member_name" placeholder="Full Name" data-parsley-required />
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="first-name-vertical">Parent Name</label>
                                                        <input type="text" id="first-name-vertical" class="form-control" name="member_parentName" placeholder="Parent Name" data-parsley-required />
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="email-id-vertical">Phone</label>
                                                        <input type="number" id="email-id-vertical" class="form-control" name="member_phone" placeholder="Phone Number" data-parsley-required />
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="contact-info-vertical">Address</label>
                                                        <input type="text" id="contact-info-vertical" class="form-control" name="member_address" placeholder="Address" data-parsley-required />
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="contact-info-vertical">Blood Group</label>
                                                        <input type="text" id="contact-info-vertical" class="form-control" name="member_bloodgroup" placeholder="Blood Group" data-parsley-required />
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="contact-info-vertical">Height</label>
                                                        <input type="text" id="contact-info-vertical" class="form-control" name="member_height" placeholder="Height in Feet & Inches" data-parsley-required />
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="contact-info-vertical">Weight</label>
                                                        <input type="text" id="contact-info-vertical" class="form-control" name="member_weight" placeholder="Weight in Kilogram" data-parsley-required />
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="contact-info-vertical">Previous Dues</label>
                                                        <input type="number" id="contact-info-vertical" class="form-control" name="member_dues" placeholder="Total Dues" data-parsley-required />
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="password-vertical">Image</label>
                                                        <input class="form-control" type="file" id="formFile" name="member_image" accept="image/*" data-parsley-required />
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary me-1 mb-1">
                                                        Submit
                                                    </button>
                                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                                        Clear
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-7">
                    <div class="card widget-todo">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title d-flex">
                                <i class="bx bx-check font-medium-5 pl-25 pr-75"></i>Members List
                            </h4>
                        </div>
                        <div class="card-body px-0 py-1">
                            <div class="card">
                                <div class="card-content">
                                    <div class="table-responsive ">
                                        <table class="table table-bordered" style="text-align: center;" id="table1">
                                            <thead>
                                                <tr>
                                                    <th>Sn. No.</th>
                                                    <th>IMAGE</th>
                                                    <th>DETAILS</th>
                                                    <th>ACTIONS</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include 'php/sqlConnection.php';
                                                $sql = "SELECT * FROM `members_list`";
                                                $result = mysqli_query($conn, $sql);
                                                if ($result) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo "<tr>
                                                                <td class='text-bold-500'>" . $row['member_id'] . "</td>
                                                                <td>
                                                                    <img src='php\\" . $row['member_image'] . "' height='80' width='80' />
                                                                </td>
                                                                <td>
                                                                    Name : " . $row['full_name'] . "<br>
                                                                    Phone : " . $row['phone'] . "<br>
                                                                    Blood Group : " . $row['blood_group'] . " <br>
                                                                    Dues : " . $row['dues'] . "
                                                                </td>
                                                                <td>
                                                                    <a href='memberUpdate.php?member_id=" . $row['member_id'] . "' class='btn icon btn-primary'><i class='bi bi-pencil'></i></a>
                                                                    <a href='php/deleteMember.php?member_id=" . $row['member_id'] . "' class='btn icon btn-danger'><i class='bi bi-trash'></i></a>
                                                                </td>
                                                            </tr>";
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
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

    <script src="assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
    <script src="assets/js/pages/simple-datatables.js"></script>

    <!-- Need: SweetAlert2 -->
    <script src="assets/extensions/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="assets/js/pages/sweet-alerts.js"></script>
</body>

</html>