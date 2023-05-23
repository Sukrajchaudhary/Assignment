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
        <a href="home.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
        <a href="showcandidates.php"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fas fa-user-plus"></i>Show_Candidates</a>

            <a href="search.php"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fas fa-user-plus"></i>search_Candidates</a>

    </div>
</div>
<!--  -->


<div class="container-fluid px-4">
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All participant</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <?php
    include('connection.php');
    $query ="SELECT id, firstname, surname,email,power_output,distance,club_id FROM participant";
    $result = mysqli_query($conn,$query);
    ?>
                    <table class="table">
                        <thead>
                            <th>ID</th>
                            <th>FirstName</th>
                            <th>Surname</th>
                            <th>email</th>
                            <th>power_output</th>
                            <th>distance</th>
                            <th>club_id</th>
                            <th>Action</th>
                        </thead>
                        <?php while($row=mysqli_fetch_assoc($result)){ ?>

                        <tr>
                            <td><?php echo $row['id'];  ?></td>
                            <td><?php echo $row['firstname'];  ?></td>
                            <td><?php echo $row['surname']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['power_output']; ?></td>
                            <td><?php echo $row['distance']; ?></td>
                            <td><?php echo $row['club_id']; ?></td>
                            <td>
                                <a href="editParticipant.php?editid=<?php echo $row['id']; ?>">EDIT</a>
                                <a href="deleteparticipant.php?deleteid=<?php echo $row['id']; ?>">Delete</a>
                            </td>



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