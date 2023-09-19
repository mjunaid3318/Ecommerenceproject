<?php
 session_start();
 if(!isset($_SESSION["uname"])){
  header("location:login.php");
 }

 /*

   <?php $images =  explode(',',$data['image']); ?>
 <?php foreach($images as $image){?>
    <td><img src="<?php echo $image;?>" width="10%"/> 
   <!-- <td><img src='$data' alt='Product Image' width='100'>"; -->
 <?php } ?>
 
 */
?>
