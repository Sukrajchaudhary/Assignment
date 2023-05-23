<?php
include('include/header.php');
include('include/css.php');
include('connection.php');
require('auth.php'); 

// Search functionality
if(isset($_POST['search'])){
    $search = $_POST['search'];

    // Query to search for participants matching the search term
    $query ="SELECT id, firstname, surname, email, power_output, distance, club_id FROM participant WHERE firstname LIKE '%$search%' OR surname LIKE '%$search%' OR email LIKE '%$search%'";
    $result = mysqli_query($conn, $query);
} else {
    // Query to retrieve all participants
    $query ="SELECT id, firstname, surname, email, power_output, distance, club_id FROM participant";
    $result = mysqli_query($conn, $query);
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
            <i class="fas fa-user-plus"></i>Show_Candidates</a>
            <a href="search.php"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fas fa-user-plus"></i>search_Candidates</a>
       
    </div>
</div>

<div id="page-content-wrapper">
    <!-- Navbar and page content -->

    <div class="container-fluid px-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All participants</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form method="POST" class="mb-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search participants...">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </form>

                    <?php if(mysqli_num_rows($result) > 0) { ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Surname</th>
                                    <th>Email</th>
                                    <th>Power Output</th>
                                    <th>Distance</th>
                                    <th>Club ID</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['firstname']; ?></td>
                                        <td><?php echo $row['surname']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['power_output']; ?></td>
                                        <td><?php echo $row['distance']; ?></td>
                                        <td><?php echo $row['club_id']; ?></td>
                                        <td>
                                            <a href="editParticipant.php?editid=<?php echo $row['id']; ?>">Edit</a>
                                            <a href="deleteparticipant.php?deleteid=<?php echo $row['id']; ?>">Delete</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    <?php } else { ?>
                        <p>No participants found.</p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('include/script.php');
include('include/foter.php');
?>
