<?php
include('includes/header.php');

include_once 'controller/main.php';
$user = new dashboard();

if (isset($_GET['action']) && $_GET['action'] == "delete") {

    $user->unlinkimage($_GET['image'], "uploads");

    $sql = mysqli_query($conn, "DELETE FROM `testimonals` WHERE `test_id`='" . $_GET['id'] . "'");
    if ($sql) {
?>
        <script>
            alert('Deleted Successfully...');
            window.location.href = "testimonals.php";
        </script>
<?php
    }
}

?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Testimonals</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Testimonals</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                        <div class="text-right">
                            <a href="add_testimonals.php"><button class="btn btn-dark mt-3">Add Testimonals</button></a>
                        </div>
                        <h5 class="card-title">Testimonals</h5>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">content</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $i = 0;
                                $qry = mysqli_query($conn, "SELECT * FROM `testimonals` ORDER BY `test_id` DESC");
                                while ($testimonals = mysqli_fetch_array($qry)) {
                                    $i++;
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $i; ?></th>
                                        <!-- <td><?php //echo $shops['name']; 
                                                    ?></td> -->
                                        <td><?php echo $testimonals['name']; ?></td>
                                        <!-- <td><?php //echo $shops['address']; 
                                                    ?></td> -->


                                        <td><img src="<?php echo $testimonals['image']; ?>" style="width:300px; height:150px;"></td>


                                        <td> <?php echo $testimonals['content']; ?></td>

                                        <td>

                                            <a href="edit_testimonals.php?edit_id=<?php echo $testimonals['test_id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="testimonals.php?action=delete&id=<?php echo $testimonals['test_id'] ?>&testimonals=<?php echo $testimonals['image']; ?>" onclick="return confirm('Are you sure you want to Delete ?')"><button type="button" class="btn btn-danger btn-sm">
                                                    Delete
                                                </button>
                                            </a>
                                        </td>


                                    </tr>

                                    <td>

                                    </td>
                                <?php } ?>
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->




<?php
include('includes/footer.php');
?>