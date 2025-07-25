<?php

include 'connection.php';

$id = $_GET['updateid'];

$sql = "select *from `crudapp`.`users` where id=$id";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);

$username = $row['username'];
$email = $row['email'];
$password = $row['password'];


// echo $id;

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>CRUD-APP-PHP</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #eaeff2;
      margin: 0;
      padding: 0;
    }

    .header {
      background: purple;
      /* Dark Blue */
      color: white;
      text-align: center;
      padding: 15px 0;
      border-top: 5px solid black;
      /* Sky Blue */
    }

    .header h2 {
      margin: 0;
      font-size: 28px;
    }

    .form-container {
      max-width: 600px;
      margin: 50px auto;
      background: white;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    label {
      display: block;
      margin-bottom: 6px;
      font-weight: bold;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 14px;
    }

    .submit-btn {
      background-color: #2196f3;
      /* Blue */
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }

    .submit-btn:hover {
      background-color: #1976d2;
    }
  </style>
</head>

<body>

  <div class="header">
    <h2>CRUD-OPERATION</h2>
  </div>

  <div class="form-container">
    <h3><U>update</U></h3>
    <br>
    <form action="#" method="post">
      <label for="username">Username</label>
      <input type="text" name="username" id="username" placeholder="enter username"value= "<?php echo $username?>">

      <label for="email">Email</label>
      <input type="email" id="email" placeholder="enter email" name="email" value= "<?php echo $email?>" >

      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="enter password"value= "<?php echo $password?>">

      <button type="submit" name="submit" class="submit-btn">update</button>
    </form>
  </div>

</body>

</html>