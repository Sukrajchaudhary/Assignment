<?php
include('include/header.php');
include('include/css.php');
include('connection.php');
require('auth.php'); 

if (isset($_GET['editid'])) {
    $id = $_GET['editid'];

    // Retrieve the participant's details from the database
    $query = "SELECT * FROM participant WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $participant = mysqli_fetch_assoc($result);
}
?>
<div class="bg-white" id="sidebar-wrapper">
<div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
            class="fas fa-user-secret me-2"></i>Admin</div>
    <div class="list-group list-group-flush my-3">
    <a href="home.php"  class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
        <a href="showcandidates.php"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fas fa-user-plus"></i>show_Candidates</a>
            <a href="search.php"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fas fa-user-plus"></i>search_Candidates</a>
       
       
    </div>
</div>

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
        <section id="notice">
            <div class="container">
                <div class="row">
                    <form method="POST">
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">First Name<span style="color:red">*</span></label>
                            <input type="text" class="form-control" id="inputEmail4" name="firstname" value="<?php echo $participant['firstname']; ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Surname<span style="color:red">*</span></label>
                            <input type="text" class="form-control" id="inputEmail4" name="surname" required value="<?php echo $participant['surname']; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Email<span style="color:red">*</span></label>
                            <input type="email" class="form-control" id="inputEmail4" name="email" required value="<?php echo $participant['email']; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Power Output<span style="color:red">*</span></label>
                            <input type="text" class="form-control" id="inputEmail4" name="power_output" required value="<?php echo $participant['power_output']; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Distance<span style="color:red">*</span></label>
                            <input type="number" class="form-control" id="inputEmail4" name="distance" required value="<?php echo $participant['distance']; ?>">
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary mt-3">Update</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>

<?php
if (isset($_POST['submit'])) {
    $id = $_GET['editid'];
    $firstname = $_POST['firstname'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $power_output = $_POST['power_output'];
    $distance = $_POST['distance'];

    // Update the participant's details in the database
    $query = "UPDATE participant SET firstname = '$firstname', surname = '$surname', email = '$email', power_output = '$power_output', distance = '$distance' WHERE id = $id";
   $result=  mysqli_query($conn, $query);
    if  ($result){
        echo"<script> alert('Update Successfully')</script>";
    }
    else
    exit();
}


include('include/script.php');
include('include/foter.php');
?>
