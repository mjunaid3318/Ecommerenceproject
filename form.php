<?php 
include("connection.php");
//  include("session.php");
?>

  <?php
if(isset($_POST["submit"])){
   $name = $_POST["name"];
   $price = $_POST["price"];
  
  // Initialize an empty array to store uploaded file paths
  $filePaths = array();
  // Loop through the uploaded files
  foreach($_FILES["image"]["tmp_name"] as $key => $tmp_name){
    
    $filename = $_FILES["image"]["name"][$key];
    $tempname = $_FILES["image"]["tmp_name"][$key];
    $folder = "./images/" . $filename;

    // Move each file to the destination folder
    if (move_uploaded_file($tempname, $folder)) {
      // Store the file path in the array
      $filePaths[] = $folder;
    }
  }

  // Check if any files were uploaded
  if (!empty($filePaths)) {
    echo "<h3>Images uploaded successfully!</h3>";
    
    // Convert the array of file paths to a comma-separated string
    $imagePaths = implode(",", $filePaths);

    // Perform the database insertion with the comma-separated image paths
    $sql = "INSERT INTO product(name, price, image) VALUES ('$name','$price','$imagePaths')";
    
    // Execute the query and handle the result
    if(mysqli_query($conn, $sql)){
      echo "Data stored successfully";
    }else{
      echo "Data not stored successfully";
    }
  } else {
    echo "<h3>No images were uploaded!</h3>";
  }

  mysqli_close($conn);
}
?> 


<html>
  <head></head>
  <body>
    <form action="./form.php" method="post" enctype = "multipart/form-data">
      <label for="name">Name:</label><br>
      <input type="text" id="name" name="name"><br>
      <label for="price">Price:</label><br>
      <input type="text" id="price" name="price"><br><br>
      <label for="image">Image : </label><br>
      <input type="file" id="img" name="image[]" multiple><br><br>
      <input type="submit" name="submit" value="submit">
      <button>logout</button>
    </form>
    
    
    </body>
    </html>
