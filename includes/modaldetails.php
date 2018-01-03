<?php
$db = mysqli_connect('127.0.0.1','root','shelvykr','tutorial');
if(mysqli_connect_errno()){
  echo'database connection failed with following errors: '.mysqli_connect_error();
  die();
}

if(isset($_POST["id"])){
    $id = $_POST["id"];
}else{
    $id = NULL;
}
$id = (int)$id;



$sql = "SELECT * FROM products WHERE id='$id'";
$result =$db->query($sql);
$product= mysqli_fetch_assoc($result);
$brand_id =$product['brand'];
$sql="SELECT * FROM `brand` WHERE id='$brand_id'";
$brand_query=$db->query($sql);
$brand = mysqli_fetch_assoc($brand_query);
$sizestring = $product['sizes'];
$size_array = explode(',',$sizestring);


 ?>




<!-- The Modal -->
<?php  ob_start(); ?>

<div class="modal fade" id="details-modal">
<div class="modal-dialog modal-lg">
<div class="modal-content">
  <!-- Modal Header -->
  <div class="modal-header">
    <h4><?php echo $product['title']; echo $id;?></h4>
    <button type="button" class="close" onclick="closeModal()">&times;</button>
  </div>

  <!-- Modal body -->
  <div class="modal-body">
    <div class="container">
      <div class="row">
        <!-- columna 1-->
          <div class="col">
            <div class="center-block">
              <div class="p-3 mb-2 bg-light text-dark">
                <img src=<?php echo $product['image']; ?> width=auto; height="200px"/>
              </div>
            </div>
          </div>
          <!--columna 2-->
        <div class="col">
          <p ALIGN="justify">
              <?php echo $product['description']; ?>
            <p class="price">Our Price: $<?php echo $product['price'] ; ?></p>
            <p>Brand: <?php echo $brand['brand']; ?></p>
          </p>
        </div>
        <!--columna 3-->
          <div class="col">
            <div class="p-3 mb-2 bg-light text-dark">
              <form action="add_cart.php" method="post">
                <div class="form-group">
                  <div class="col-xs-3">
                  <label for="quantity">Quantity: </label>
                  <input type="text" class="form-control" id="quantity" name="quantity" />
                </div>
                <p>Avaible: 3</p>
              </div>
              <div class="form-group">
                <label for="size">Size: </label>
                <select name="size" id="size" class="form control">
                  <option value=""></option>
                  <?php foreach ($size_array as $string){
                    $string_array = explode(':', $string);
                    $size = $string_array[0];
                    $quantity = $string_array[1];
                    echo '<option value="'.$size.'">'.$size.'('.$quantity.' Available)</option>';
                  } ?>
                  <br /><br /><br />
                </select>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal footer -->
  <div class="modal-footer">
    <button type="submit" name="anadir" class="btn btn-outline-success btn-md" data-dismiss="modal"><span aria-hidden="true"></span>
      <img src="images/carrito.png" width="15px" height="15px"/>Comprar</button>
    <button type="button" class="btn btn-outline-danger btn-md" data-dismiss="modal" onclick="closeModal()">Close</button>
  </div>
</div>
</div>
</div>
<script>
  function closeModal(){
    jQuery('#details-modal').modal('hide');
    setTimeout(function(){
      jQuery('#details-modal').remove();
    },500);
  }
</script>
<?php echo ob_get_clean(); ?>
