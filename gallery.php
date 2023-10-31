<?php
include 'includes/header.php';

include_once 'controller/main.php';
$user = new dashboard();

if (isset($_GET['action']) && $_GET['action'] == "delete") {

    $user->unlinkimage($_GET['gallery'], "uploads");

    $sql = mysqli_query($conn, "DELETE FROM `gallery` WHERE `gallery_id`='" . $_GET['id'] . "'");
    if ($sql) {
?>
        <script>
            alert('Deleted Successfully...');
            window.location.href = "gallery.php";
        </script>
<?php
    }
}
?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Gallery</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Gallery</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                        <div class="text-right">
                            <a href="add_gallery.php"><button class="btn btn-dark mt-3">Add Gallery</button></a>
                        </div>
                        <h5 class="card-title">Gallery</h5>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">S.NO</th>
                                    <th scope="col">Gallery</th>
                                    <th scope="col">Action</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                $qry = mysqli_query($conn, "SELECT * FROM `gallery` ORDER BY `gallery_id` DESC ");
                                while ($gallery = mysqli_fetch_array($qry)) {
                                    $i++;
                                ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><img src="<?php echo $gallery['gallery']; ?>" style="width:300px; height:150px;"></td>
                                        <td>
                                            <a href="edit_gallery.php?edit_id=<?php echo $gallery['gallery_id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                            <a href="gallery.php?action=delete&id=<?php echo $gallery['gallery_id']; ?>&gallery=<?php echo $gallery['gallery']; ?>" onclick="return confirm('Are you sure you want to Delete ?')"><button type="button" class="btn btn-danger btn-sm">
                                                    Delete
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
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


<?php include 'includes/footer.php'; ?>