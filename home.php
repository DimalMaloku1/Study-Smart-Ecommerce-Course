<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};



?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>
   
   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   
   <!-- linku i fontit  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <!-- linku i css  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<div class="home-bg">

<section class="home">
<div class="swiper home-slider">
   
   <div class="swiper-wrapper">

   <div class="swiper-slide slide">
         <div class="image">
            <img src="images/html.png" alt="">
         </div>
         <div class="content">
            <h3>kurs per html</h3>
            <a href="shop.php" class="btn">bleni tani</a>
         </div>
      </div>

      <div class="swiper-slide slide">
         <div class="image">
            <img src="images/css.png" alt="">
         </div>
         <div class="content">
            <h3>kurs per css</h3>
            <a href="shop.php" class="btn">bleni tani</a>
         </div>
      </div>

      <div class="swiper-slide slide">
         <div class="image">
            <img src="images/js.png" alt="">
         </div>
         <div class="content">
            <h3>kurs per javascript</h3>
            <a href="shop.php" class="btn">bleni tani</a>
         </div>
      </div>

      <div class="swiper-slide slide">
         <div class="image">
            <img src="images/php.png" alt="">
         </div>
         <div class="content">
            <h3>kurs per php</h3>
            <a href="shop.php" class="btn">bleni tani</a>
         </div>
      </div>

      <div class="swiper-slide slide">
         <div class="image">
            <img src="images/mysql.png" alt="">
         </div>
         <div class="content">
            <h3>kurs per mysql</h3>
            <a href="shop.php" class="btn">bleni tani</a>
         </div>
      </div>

      </div>

      <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>

  <div class="swiper-pagination"></div>

</div>

</section>

</div>


</div>

<div class="swiper-pagination"></div>

</div>

</section>



</div>

<div class="swiper-pagination"></div>

</div>

</section>




<?php include 'components/footer.php'; ?>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

<script>

const swiper = new Swiper('.swiper', {

  loop: true,
  allowTouchMove: false,
  
  pagination: {
    el: '.swiper-pagination',
  },

  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },


});


</script>

</body>
</html>
