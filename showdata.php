
<?php
include("connection.php");
?>
<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
}
.product{
  margin-left:110px;
}
</style>
</head>
<body>

<h2 class="product">Products Table</h2>

<table style="width:30%">
  <tr>
    <th>Name</th>
    <th>Price</th> 
    <th>Image</th>
  </tr>
  <?php
$sql = "SELECT  name, price, image FROM product";
$result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        while ($data = $result->fetch_assoc()){
?>
<tr>
   <td><?php echo $data['name']; ?></td>
  <td><?php echo $data['price']; ?></td>
  <?php $images = explode(',',$data['image']); ?>
 <?php foreach($images as $image){?>
    <td><img src="<?php echo $image;?>"/></td>
 <?php } ?>
</tr>
<?php }} ?>
</table>
</body>
</html>


