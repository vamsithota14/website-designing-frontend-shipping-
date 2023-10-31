<?php
    include('includes/header.php');
    ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Shops</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Shops</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">

            <div class="text-right">
              <a href="add_shop.php"><button class="btn btn-dark mt-3">Add Shop</button></a>
           </div>
              <h5 class="card-title">Shops</h5>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <!-- <th scope="col">Name</th> -->
                    <th scope="col">Shop Name</th>
                    <th scope="col">Mobile Number</th>
                    <!-- <th scope="col">Address</th> -->
                      <th scope="col">Location</th>
                      <th scope="col">Promo code</th>
                    <th scope="col">Action</th>
                    <th scope="col">Share</th>
                    <th scope="col">Status</th>


                  </tr>
                </thead>
                <tbody>

                <?php 
                      $i=0;
                      $qry = mysqli_query($conn, "SELECT * FROM `shops` ORDER BY `id` DESC");
                          while($shops = mysqli_fetch_array($qry)){
                                                $i++;
                                        ?> 
                  <tr>
                    <th scope="row"><?php echo $i; ?></th>
                    <!-- <td><?php //echo $shops['name']; ?></td> -->
                    <td><?php echo $shops['shop_name']; ?></td>
                    <td><?php echo $shops['mobile']; ?></td>
                    <!-- <td><?php //echo $shops['address']; ?></td> -->
                    <td> <?php echo $shops['location']; ?></td>
                    <td>
                        <a href="add_promo.php?add_id=<?php echo $shops['id']; ?>" class="btn btn-success btn-sm">Add</a>
                    </td>
                    <td>
                  
                  
                    <a href="edit_shops.php?edit_id=<?php echo $shops['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                  <a href="delete_shops.php?delete_id=<?php echo $shops['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                  </td>
                  <td><a target="_blank" class="bt n btn-sm btn-success" href="https://wa.me/+91<?php echo $shops['mobile']; ?>?text= Hai Sarat,%0D%0AThese are the tips to follow%0D%0A%0D%0ADescription : hi tezt%0D%0A%0D%0APhysiotherapy : https://arowanasoft.com/apple_admin/uploads/Physiotherapy/Physiotherapy1681729955.jpg%0D%0A%0D%0ANutrition : https://arowanasoft.com/apple_admin/uploads/Nutrition/Nutrition1681729955.jpg%0D%0A%0D%0ALife style changes : https://arowanasoft.com/apple_admin/uploads/changes/changes1681729955.jpg%0D%0A%0D%0AVideos Links : https://www.youtube.com/watch?v=rUHc-KDV3tM%0D%0A%0D%0AComment : %0D%0A%0D%0APrescription : https://arowanasoft.com/apple_admin/null"><i class="bi bi-whatsapp"></i>
                                                </a></td>
                  <!-- <td><a href="#editboyname" onclick="moredetails('<?php echo $shops['id']; ?>')" data-toggle="modal" data-target="#editboyname" class="btn btn-xs btn-primary">View</a></td> -->
<!-- Button trigger modal -->
<td><button type="button" onclick="moredetails('<?php echo $shops['id']; ?>')" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
View
</button></td>


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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editboydetails">View Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div id="editboydetails_data">

</div>
      </div>
      
    </div>
  </div>
</div>




    <script>
    function moredetails(id) {
        
        $.ajax({
        url: "shop_moredetails.php",
        type: "post",
        data: {id: id} ,
        success: function (response) {
          
        if (response) {
                     $('#editboydetails_data').replaceWith($('#editboydetails_data').html(response));
                }
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
    });
        
    }
</script>
  <?php
    include('includes/footer.php');
    ?>
