
<style>

  #logotext{
    position: absolute;
    width: 100%;
    height: 180px;
    background-image: url(https://image.ibb.co/eJJZvR/text.png);
    background-repeat: no-repeat;
    background-position: center;
    background-size: 60% auto;
    top: 50%;
    margin-top: -90px;
  }


  </style>
<link rel="icon" type="image/png" href="images/icon.png" />
<body>
  <?php
require_once 'core/init.php';
include 'includes/head.php';
include 'includes/navigation.php';
include 'includes/headerfull.php';
$sql = "SELECT * FROM products WHERE featured = 1";
$featured=$db->query($sql);
   ?>

<!--title-->
<div class="container">
  <div class="row">
      <div class="col"></div>
      <div class="col"><h2>Featured Products</h2></div>
      <div class="col"></div>
  </div>
</div>




<!--products-->
      <main role="main">
        <br /><br />
          <div class="container">
            <div class="row">
                <!--php-->
              <?php while($product = mysqli_fetch_assoc($featured)): ?>
                <div class="col-md-4">
                  <div class="bg-light text-dark">
                        <h4><?php echo $product['title']; ?></h4>
                        <img src=<?php echo $product['image']; ?>  width=auto; height="200px"/>
                        <p class="list-price text-danger">List Price: <s>$<?php echo $product['list_price']; ?></s></p>
                        <p class="price">Our Price: $<?php echo $product['price']; ?></p>
                        <button type="button" id=boton class="btn btn-dark btn-md " onclick="modaldetails(<?php echo $product['id'];?>)">Details</button>
                      </div>
                    </div>
                <?php endwhile; ?>
                </div>
              </div>

      </main>
      <br /><br />
<?php

include 'includes/footer.php';
include 'includes/modaldetails.php';
 ?>
