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
<!--  -->


<div class="container-fluid px-4">
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Total Registration</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <?php
    include('connection.php');
    $query ="SELECT id, firstname, surname,email,terms FROM interest";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die('Query execution failed: ' . mysqli_error($conn));
    }
    ?>
                    <table class="table">
                        <thead>
                            <th>ID</th>
                            <th>FirstName</th>
                            <th>Surname</th>
                            <th>email</th>
                            <th>Terms</th>
                        </thead>
                        <?php while($row=mysqli_fetch_assoc($result)){ ?>

                        <tr>
                            <td><?php echo $row['id'];?></td>
                            <td><?php echo $row['firstname'];  ?></td>
                            <td><?php echo $row['surname']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['terms']; ?></td>



                        </tr>
                        <?php } ?>
                    </table>


                </div>
            </div>
        </div>

    </div>


    </section>



</div>


<!--  -->
</div>
<!-- /#page-content-wrapper -->
</div>
<?php
include('include/script.php');
include('include/foter.php');?>