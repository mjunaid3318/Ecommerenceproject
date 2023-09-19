
 <style>

body {

background: #91a716;

display: flex;

justify-content: center;

align-items: center;

height: 100vh;

flex-direction: column;

font-family: cursive;

box-sizing: padding-box;

}

form {

width: 1000px;

border: 3px solid rgb(177, 142, 142);

padding: 20px;

background: rgb(85, 54, 54);

border-radius: 20px;

}

h2 {

text-align: center;

margin-bottom: 40px;

}

input {

display: block;

border: 2px solid #ccc;

width: 95%;

padding: 10px;

margin: 10px auto;

border-radius: 5px;

}

label {

color: #888;

font-size: 18px;

padding: 10px;

}

button {

float: right;

background: rgb(35, 174, 202);

padding: 10px 15px;

color: #fff;

border-radius: 5px;

margin-right: 10px;

border: none;

}

button:hover{

opacity: .10;

}

.error {

background: #F2DEDE;

color: #0c0101;

padding: 10px;

width: 95%;

border-radius: 5px;

margin: 20px auto;

}

h1 {

text-align: center;

color: rgb(134, 3, 3);

}

a {

float: right;

background: rgb(183, 225, 233);

padding: 10px 15px;

color: #fff;

border-radius: 10px;

margin-right: 10px;

border: none;

text-decoration: none;

}

a:hover{

opacity: .7;

}
</style> 


<!DOCTYPE html>
<html>
<head>

    <title>LOGIN</title>
    <link rel="stylesheet" href="style.php">

</head>
<body>
    <form action="login.php" method="post">
        <h2>LOGIN</h2>
        <label>User Name</label>
        <input type="text" name="uname"><br>
        <label>Password</label>
        <input type="password" name="password"><br> 
        <button type="submit" name="submit">Login</button>
    </form>
<?php
include('connection.php');

if (isset($_POST['submit'])){
    
 $username = $_POST['uname'];
 $password = $_POST['password'];
$sql = mysqli_query($conn,
    "SELECT * FROM prod WHERE username='"
    . $_POST["uname"] . "' AND
    password='" . $_POST["password"] . "'");
    $num = mysqli_num_rows($sql);

if($num > 0){
    while($row= mysqli_fetch_assoc($sql));
    session_start();
    $_SESSION["username"]=$row['username'];
    $_SESSION["password"]=$row['password'];
    header('location:form.php');


}else{
echo 'failure';
}
}?>
</body>

</html>