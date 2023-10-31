<?php

include 'controller/config.php';
include 'controller/ajaxcontroller.php';


$admin = new ajaxcontroler();

$id = $_POST['id'];

$row = $admin->getmoredetail($id);


?>

<?php

foreach ($row as $rowww) {

?>
    <form method="post">
        <label>Name</label>
        <input type="text" class="form-control mb-3" readonly value="<?php echo $rowww['datas']->name; ?>">
        
        <label>Shop Name</label>
        <input type="text" class="form-control mb-3" readonly value="<?php echo $rowww['datas']->shop_name; ?>">
        
        <label>Mobile number</label>
        <input type="text" class="form-control mb-3" readonly value="<?php echo $rowww['datas']->mobile; ?>">
        
        <label>Address</label>
        <input type="text" class="form-control mb-3" readonly value="<?php echo $rowww['datas']->address; ?>">
        
        <label>Location</label>
        <input type="text" class="form-control mb-3" readonly value="<?php echo $rowww['datas']->location; ?>">
        
        <label>Product Name</label>
        <input type="text" class="form-control mb-3" readonly value="<?php echo $rowww['datas']->product_name; ?>">
        
        <label>Total Amount</label>
        <input type="text" class="form-control mb-3" readonly value="<?php echo $rowww['datas']->amount; ?>">
        
        <label>Discount</label>
        <input type="text" class="form-control mb-3" readonly value="<?php echo $rowww['datas']->discount; ?>">
      
    </form>
    


    
<?php } ?>