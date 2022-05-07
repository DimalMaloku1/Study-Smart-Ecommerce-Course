<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:user_login.php');
};

if(isset($_POST['order'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $method = $_POST['method'];
   $method = filter_var($method, FILTER_SANITIZE_STRING);
   $total_price = $_POST['total_price'];

   $check_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
   $check_cart->execute([$user_id]);

   if($check_cart->rowCount() > 0){

      $insert_order = $conn->prepare("INSERT INTO `orders`(user_id, name, number, email, method, total_price) VALUES(?,?,?,?,?,?)");
      $insert_order->execute([$user_id, $name, $number, $email, $method, $total_price]);

      $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
      $delete_cart->execute([$user_id]);

      $message[] = 'Porosia u be me Sukses!';
   }else{
      $message[] = 'Shporta juaj eshte e Zbrazet';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>arka</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="checkout-orders">

   <form action="" method="POST">

   <h3>porosite tuaja</h3>

      <div class="display-orders">
      <?php
         $grand_total = 0;
         $cart_items[] = '';
         $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
         $select_cart->execute([$user_id]);
         if($select_cart->rowCount() > 0){
            while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){
               $cart_items[] = $fetch_cart['name'].' ('.$fetch_cart['price'].') - ';
               $total_products = implode($cart_items);
               $grand_total += ($fetch_cart['price']);
      ?>
         <p> <?= $fetch_cart['name']; ?> <span>(<?= $fetch_cart['price'].'€'?>)</span> </p>
      <?php
            }
         }else{
            echo '<p class="empty">shporta eshte e zbrazet!</p>';
         }
      ?>
         <input type="hidden" name="total_products" value="<?= $total_products; ?>">
         <input type="hidden" name="total_price" value="<?= $grand_total; ?>" value="">
         <div class="grand-total">Totali : <span><?= $grand_total; ?>€</span></div>
      </div>

      <h3>plotesoni porosine</h3>

      <div class="flex">
         <div class="inputBox">
            <span>Emri juaj :</span>
            <input type="text" name="name" placeholder="shenoni emrin" class="box" maxlength="20" required>
         </div>
         <div class="inputBox">
            <span>Numri i tel. :</span>
            <input type="number" name="number" placeholder="shenoni numrin e tel." class="box" maxlength="40" required>
         </div>
         <div class="inputBox">
            <span>Emailin e juaj :</span>
            <input type="email" name="email" placeholder="shenoni emailin" class="box" maxlength="50" required>
         </div>
         <div class="inputBox">
            <span>Metoda e Pageses :</span>
            <select name="method" class="box" required>
            <option value="" disabled selected>Zgjidhni opsionin tuaj</option>
               <option value="credit card">Credit Card</option>
               <option value="paypal">PayPal</option>
            </select>
         </div>
      </div>

      <input type="submit" name="order" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>" value="pranoni porosin">

   </form>

</section>













<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>