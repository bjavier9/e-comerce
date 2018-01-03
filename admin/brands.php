<br>
<?php
require_once '../core/init.php';
include 'includes/head.php';
include 'includes/navigation.php';
$sql ="SELECT * FROM brand ORDER BY brand";
$results =$db->query($sql);
$errors=array();
//edit
if(isset($_GET['edit'])&&!empty($_GET['edit'])){
  $edit_id = (int)$_GET['edit'];
  $edit_id = sanitize($edit_id);
  $sql2 = "SELECT * FROM brand WHERE id = '$edit_id'";
  $edit_result = $db->query($sql2);
  $eBrand = mysqli_fetch_assoc($edit_result);
}
//delete
if(isset($_GET['delete'])&& !empty($_GET['delete'])){
$delete_id = (int)$_GET['delete'];
$delete_id = sanitize($delete_id);
$sql = "DELETE FROM brand WHERE id = '$delete_id'";
$db->query($sql);
header('Location: brands.php');
}

//add_submit
if(isset($_POST['add_submit'])){
  $brand = sanitize($_POST['brand']);
//check Brand is blank
  if($_POST['brand']==''){
    $errors[].='you must enter brand!';
  }
  //check if brand exist in database
  $sql= "SELECT * FROM brand WHERE brand='$brand'";
if(isset($_GET['edit'])){
  $sql = "SELECT * FROM brand WHERE brand = '$brand'AND id!='$edit_id'";
}
  $result = $db->query($sql);
  $count =mysqli_num_rows($result);
  echo $count;
  if($count>0){
    $errors[] .=$brand.'Ya existe esa marca papu';
  }

  if(!empty($errors)){
    echo display_errors($errors);
  }else{
    $sql="INSERT INTO brand(brand) VALUES ('$brand')";
    if(isset($_GET['edit'])){
      $sql= "UPDATE brand SET brand = '$brand' WHERE id= '$edit_id'";
    }
    $db->query($sql);
    header('Location: brands.php');
  }
}

 ?>
 <br /><br /><br /><br />
<h2 class="text-center">Brands</h2>
<!--brands form-->
<!--agrega brands of bd-->
<div class="mx-auto" style="width: 400px;">
  <form class="form-inline" action="brands.php<?=((isset($_GET['edit']))?'?edit='.$edit_id:'');?>" method="post">
    <div class="form-group">
      <?php $brand_value = ''; 
      if(isset($_GET['edit'])){

        $brand_value = $eBrand['brand'];
      }else{
        if(isset($_POST['brand'])){
          $brand_value = sanitize($_POST['brand']);
        }
      }?>
      <label for="brand"><?=((isset($_GET['edit']))?'Edit':'Add A');?> Brand  </label>
        <input type="text" name="brand" id="brand" class="form-control" value="<?=$brand_value;?>"/>
        <?php if(isset($_GET['edit'])): ?>
          <a href="brands.php" class="btn btn-primary">cancel</a>
        <?php endif; ?>

        <input type="submit" name="add_submit" value="<?=((isset($_GET['edit']))?'Edit':'Add');?>" class="btn btn-dark" />
      </div>
    </form>
  </div>
<br /><br />

<!--tablas-->
<table class="table table-striped table-dark table-auto">
  <thead>
    <th><th>Brand</th></th>
  </thead>
  <tbody>
    <?php while ($brand = mysqli_fetch_assoc($results)):  ?>
    <tr>
      <td><a href="brands.php?edit=<?php echo $brand['id'];?>" class="btn btn-xs btn-light"><img src="../images/edit.png" width="15px" height="15px"/></a></td>
      <td><?php echo $brand['brand']; ?></td>
      <td><a href="brands.php?delete=<?php echo $brand['id'];?>" class="btn btn-xs btn-light"><img src="../images/remove.png" width="15px" height="15px"/></a></td>
    </tr>
    <?php endwhile; ?>
  </tbody>
 </table>
 <?php include 'includes/footer.php' ?>
