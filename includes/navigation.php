<?php
$sql="SELECT * FROM categories WHERE parent = 0";
$pquery = $db->query($sql);
 ?>

<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="#">ZKIMOXZ</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <!--Php-conn-sqlquery-->
        <?php while ($parent = mysqli_fetch_assoc($pquery)):?>
             <?php
             $parent_id= $parent['id'];
             $sq12="SELECT * FROM categories WHERE parent= '$parent_id'";
             $cquery = $db->query($sq12);
              ?>
        <li class="nav-item dropdown active">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo $parent['category']; ?>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php while($child=mysqli_fetch_assoc($cquery)): ?>
            <a class="dropdown-item" href="#"><?php echo $child['category']; ?></a>
            <?php endwhile; ?>
          </div>
        </li>
        <?php endwhile; ?>
      </ul>
    </div>
  </nav>
</header>
