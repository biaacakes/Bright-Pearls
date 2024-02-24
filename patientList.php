<!DOCTYPE html>
<?php include("func.php");require_once 'includes/auth_adminCheck.php';?>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Dashboard | Admin</title>

    <link href="vendor/bootstrap4/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/flagiconcss3/css/flag-icon.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/sidebar-dafault.css">
    <link rel="stylesheet" href="css/master.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
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


            <div class='modal fade' id='myModalPatient' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel'
                aria-hidden='true'>
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
                                <form action='func.php' method='POST'>
                                    <tr>
                                        <td>
                                            <input type="hidden" name="id" id="id">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>First Name :</th>
                                        <td>
                                            <input type="text" name="fname" id="fname" placeholder='First Name'
                                                class='form-control wd-450' required='true'>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Last Name :</th>
                                        <td>
                                            <input type="text" name="lname" id="lname" placeholder='Last Name'
                                                class='form-control wd-450' required='true'>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Patient Email :</th>
                                        <td>
                                            <input type="text" name="email" id="email" placeholder='Email'
                                                class='form-control wd-450' required='true'>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Patient Address :</th>
                                        <td>
                                            <input type="text" name="address" id="address" placeholder='Patient Address'
                                                class='form-control wd-450' required='true'>
                                        </td>
                                    </tr>
                            </table>
                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                            <button type="edit" name="edit" class='btn btn-primary'>Edit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="content">
                <div class="container-fluid">
                    <div class="page-title">
                        <h3>Patient List</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    Patients
                                </div>
                                <div class="card-body">
                                    <table class="table table-hover" id="dataTables-example" width="100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Gender</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php getPatientDetails(); ?>
                                        </tbody>
                                    </table>
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
<script src="vendor/chartsjs/Chart.min.js"></script>
<script src="js/script.js"></script>
<script src="http://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="http://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"></script>
<?php include('alertconfig.php');?>




<script>
$(document).ready(function() {
    $(".editbtn").on("click", function() {
        $("#myModalPatient").modal("show"), Str = $(this).closest("tr");
        var t = Str.children("td").map(function() {
            return $(this).text()
        }).get();
        $("#id").val(t[0]), $("#fname").val(t[1]), $("#lname").val(t[2]), $("#gender").val(t[3]), $(
            "#email").val(t[4]), $("#address").val(t[5])
    })
}), $(document).ready(function() {
    $(".deletebtn").on("click", function() {
        $("#myModalDeletePatient").modal("show"), Str = $(this).closest("tr");
        var t = Str.children("td").map(function() {
            return $(this).text()
        }).get();
        console.log(t), $("#deleteId").val(t[0])
    })
}), $(document).ready(function() {
    $("#dataTables-example").DataTable()
});
</script>

</html>