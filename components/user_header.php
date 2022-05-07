<?php
   if(isset($message)){
      foreach($message as $message){
         echo '
         <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
?>

<header class="header">

   <section class="flex">

      <a href="home.php" class="logo">StudySmart</a>

      <nav class="navbar">
         <a href="home.php">home</a>
         <a href="about.php">rreth nesh</a>
         <a href="shop.php">kurset</a>
      </nav>

      <div class="icons">
         <?php
            $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            $total_cart_counts = $count_cart_items->rowCount();
         ?>
         <div id="menu-btn" class="fas fa-bars"></div>
         <a href="cart.php"><i class="fas fa-shopping-cart"></i><span>(<?= $total_cart_counts; ?>)</span></a>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="profile">
         <?php          
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p><?= $fetch_profile["name"]; ?></p>
         <a href="update_user.php" class="btn">perditso profilin</a>
         <div class="flex-btn">
            <a href="user_register.php" class="option-btn">regjistrohu</a>
         </div>
         <a href="components/user_logout.php" class="delete-btn" onclick="return confirm('Doni te qkyquni nga Faqja?');">qkyqu</a> 
         <?php
            }else{
         ?>
         <p>ju lutem kyquni apo regjistrohuni!</p>
         <div class="flex-btn">
            <a href="user_register.php" class="option-btn">regjistrohu</a>
            <a href="user_login.php" class="option-btn">kyqu</a>
         </div>
         <?php
            }
         ?>      
         
         
      </div>

   </section>

</header>