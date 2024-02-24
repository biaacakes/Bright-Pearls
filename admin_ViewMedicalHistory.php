<!DOCTYPE html>
<?php include("func.php");
require_once 'includes/auth_adminCheck.php';?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <link href="vendor/bootstrap4/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/flagiconcss3/css/flag-icon.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/master.css" />

    <title>Patient Medical History</title>
</head>

<body>


    <div class="wrapper">
        <nav id="sidebar" class="active">
            <div class="sidebar-header">
                <span>Bright Pearls Clinic</span>
            </div>
            <ul class="list-unstyled components">
                <li>
                    <a href="dashboard.php"><i class="fas fa-home"></i> Dashboard</a>
                </li>
                <li>
                    <a href="#patientmenu" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle no-caret-down"><i class="fas fa-user-injured"></i> Patient</a>
                    <ul class="collapse list-unstyled" id="patientmenu">
                        <li>
                            <a href="patientList.php"><i class="fas fa-list-ul"></i> Patient List</a>
                        </li>
                        <li>
                            <a href="admin_Payment.php"><i class="fas fa-receipt"></i>Payments</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#appointmenu" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle no-caret-down"><i class="fas fa-calendar-check"></i> Appointment</a>
                    <ul class="collapse list-unstyled" id="appointmenu">
                        <li>
                            <a href="admin_AppointmentHistory.php"><i class="fas fa-eye"></i> View Appointment</a>
                        </li>
                        <li>
                            <a href="admin_Payment.php"><i class="fas fa-receipt"></i>Payments</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

        <div id="body" class="active">
            <nav class="navbar navbar-expand-lg navbar-primary bg-primary">
                <button type="button" id="sidebarCollapse" class="btn btn-outline-light default-light-menu"><i
                        class="fas fa-bars"></i><span></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <div class="nav-dropdown">
                                <a href="" class="nav-item nav-link dropdown-toggle" data-toggle="dropdown"><i
                                        class="fas fa-user"></i>
                                    <span>Welcome, Admin</span> <i style="font-size: .8em;"
                                        class="fas fa-caret-down"></i></a>
                                <div class="dropdown-menu dropdown-menu-right nav-link-menu">
                                    <ul class="nav-list">
                                        <div class="dropdown-divider"></div>
                                        <li><a href="logout.php" class="dropdown-item"><i
                                                    class="fas fa-sign-out-alt"></i> Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="content">
                <div class="container-fluid">
                    <div class="page-title">
                        <h3>Manage Medical History
                            <a href="admin_AppointmentHistory.php" class="btn btn-sm btn-outline-primary float-right"><i
                                    class="fas fa-user-shield"></i> Appointments</a>
                        </h3>
                    </div>
                    <div class="box box-primary">
                        <div class="box-body">


                            <table border="1" class="table table-bordered">
                                <tr align="center">
                                    <td colspan="4" style="font-size:20px;color:black">
                                        Patient Details</td>
                                </tr>

                                <tr>
                                    <th scope>First Name:</th>
                                    <td><?php echo $_POST["fname"];?></td>
                                    <th scope>Last Name:</th>
                                    <td><?php echo $_POST["lname"];?></td>
                                </tr>
                                <tr>
                                    <th>Patient Email:</th>
                                    <td><?php echo $_POST["gender"];?></td>
                                    <th>Patient Gender:</th>
                                    <td><?php echo $_POST["email"];?></td>
                                </tr>
                                <tr>
                                    <th>Patient Address:</th>
                                    <td><?php echo $_POST["address"];?></td>
                                    <th>Registration Date:</th>
                                    <td><?php echo $_POST["regiDate"];?></td>
                                </tr>
                            </table>
                            <br>
                            <br>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <tr align="center">
                                    <th colspan="8">
                                        <h3></h3>Medical History
                                    </th>
                                </tr>
                                <tr>
                                    <th>#</th>
                                    <th>Blood Pressure</th>
                                    <th>Weight</th>
                                    <th>Temperature</th>
                                    <th>Medical History</th>
                                </tr>

                                <tbody>
                                    <?php getPatientMedicalHistory( $_POST["id"]); ?>
                                </tbody>

                            </table>


                            <p align="center">
                                <button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal"
                                    data-target="#myModal">Add Medical History</button>
                            </p>


                            <div class='modal fade' id='myModal' tabindex='-1' role='dialog'
                                aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                <div class='modal-dialog' role='document'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title' id='exampleModalLabel'>Add Medical History</h5>
                                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                <span aria-hidden='true'>&times;
                                                </span>
                                            </button>
                                        </div>
                                        <div class='modal-body'>
                                            <table class='table table-bordered table-hover data-tables'>

                                                <form method='post' action='func.php'>

                                                    <tr>
                                                        <th>Blood Pressure :</th>
                                                        <td>
                                                            <div class='col-xs-3'>
                                                                <input type="number" id="upper" name="upper" min="50"
                                                                    max="180" placeholder='120' required='true'>
                                                                /
                                                                <input type="number" id="lower" name="lower" min="50"
                                                                    max="120" placeholder='80' required='true'>
                                                                mm Hg
                                                            </div>

                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <th>Weight :</th>
                                                        <td>
                                                            <input name='weight' placeholder='Weight'
                                                                class='form-control wd-450' required='true'>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th>Temperature :</th>
                                                        <td>
                                                            <input type="number" name='temp' step="any"
                                                                placeholder='36.0' class='form-control wd-450' min="30"
                                                                max="45" required='true'>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Medical History :</th>
                                                        <td>
                                                            <textarea name='med_history' placeholder='Medical History'
                                                                rows='3' cols='5' class='form-control wd-450'
                                                                style='resize: none;' required='true'></textarea>
                                                        </td>
                                                    </tr>


                                                    <tr style="display:none">
                                                        <th></th>
                                                        <td>
                                                            <input value='<?php echo $_POST["id"] ?>' name='addid'>

                                                        </td>
                                                    </tr>

                                            </table>
                                        </div>
                                        <div class='modal-footer'>

                                            <button type='button' class='btn btn-secondary'
                                                data-dismiss='modal'>Close</button>
                                            <button type='submit' name='addsubmit'
                                                class='btn btn-primary'>Submit</button>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class='modal fade' id='myModalPatient' tabindex='-1' role='dialog'
                                aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                <div class='modal-dialog' role='document'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title' id='exampleModalLabel'>Edit Patient Details</h5>
                                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                <span aria-hidden='true'>&times;
                                                </span>
                                            </button>
                                        </div>
                                        <div class='modal-body'>
                                            <table class='table table-bordered table-hover data-tables'>

                                                <form method='' name='submit'>

                                                    <tr>
                                                        <th>First Name :</th>
                                                        <td>
                                                            <input name='fn' placeholder='First Name'
                                                                class='form-control wd-450' required='true'>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Last Name :</th>
                                                        <td>
                                                            <input name='ln' placeholder='Last Name'
                                                                class='form-control wd-450' required='true'>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Patient Email :</th>
                                                        <td>
                                                            <input name='email' placeholder='Email'
                                                                class='form-control wd-450' required='true'>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Patient Address :</th>
                                                        <td>
                                                            <input name='address' placeholder='Patient Address'
                                                                class='form-control wd-450' required='true'>
                                                        </td>
                                                    </tr>
                                            </table>
                                        </div>
                                        <div class='modal-footer'>
                                            <button type='button' class='btn btn-secondary'
                                                data-dismiss='modal'>Close</button>
                                            <button type='edit' name='edit' class='btn btn-primary'>Edit</button>

                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>


</body>

<script src="vendor/jquery3/jquery-3.4.1.min.js"></script>
<script src="vendor/bootstrap4/js/bootstrap.bundle.min.js"></script>
<script src="vendor/fontawesome5/js/solid.min.js"></script>
<script src="vendor/fontawesome5/js/fontawesome.min.js"></script>
<script src="js/script.js"></script>

</html>