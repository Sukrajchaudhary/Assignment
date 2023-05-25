<?php
include('include/header.php');
include('include/css.php');
require('auth.php'); 


?>

<!-- Sidebar -->
<div class="bg-white" id="sidebar-wrapper">
    <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
            class="fas fa-user-secret me-2"></i>Admin</div>
    <div class="list-group list-group-flush my-3">
    <a href="home.php"  class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
        <a href="showcandidates.php"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
           View Participant</a>
            <a href="TotalRegistration.php"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold">View Registration</a>
            <a href="search.php"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            Search_Participant</a>
       
    </div>
</div>
<!-- /#sidebar-wrapper -->

<!-- Page Content -->
<div id="page-content-wrapper">
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
        <div class="d-flex align-items-center">
            <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
            <h2 class="fs-2 m-0">Dashboard</h2>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user me-2"></i>Admin
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid px-4">
        <div class="row g-3 my-2">

            <div class="col-md-3">
                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                    <div>
                        <h3 class="fs-2">


                        <?php
    include('connection.php');

$sql = "SELECT COUNT(id) AS total_intrest FROM interest";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalintrest = $row["total_intrest"];
    echo  $totalintrest;
} else {
    echo "No Intrested Found.";
}

// Close the connection
$conn->close();
?>
                        </h3>
                        <p class="fs-5">Total registration</p>
                    </div>
                    <i class="fad fa-chalkboard-teacher fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                </div>
            </div>

            <div class="col-md-3">
                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                    <div>

                        <h3 class="fs-2">
<?php
    include('connection.php');

$sql = "SELECT COUNT(id) AS total_members FROM participant";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalMembers = $row["total_members"];
    echo  $totalMembers;
} else {
    echo "No members found.";
}

// Close the connection
$conn->close();
?>



                        </h3>
                        <p class="fs-5">Participant</p>
                    </div>
                    <fs-1 class="fas fa-user-graduate fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
<!-- /#page-content-wrapper -->
</div>
<?php
include('include/script.php');
include('include/foter.php');?>