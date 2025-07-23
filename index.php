<?php

include 'connection.php';


if (isset($_POST['submit'])) {

  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];


  $sql = "insert into `crudapp`.`users` 
    (username, email, password)
    values ('$username', '$email', '$password')";

  $result =  mysqli_query($connect, $sql);



if($result){
  echo "
  <script>
  alert ('form has been submitted');
   window.location.href = 'display.php'
  </script>
  ";
  
// header('location: display.php');

}

else{
  die(mysqli_connect_error($connect));
}

mysqli_close($connect);




}
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
      background: purple; /* Dark Blue */
      color: white;
      text-align: center;
      padding: 15px 0;
      border-top: 5px solid black; /* Sky Blue */
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
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
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
      background-color: #2196f3; /* Blue */
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

      .error {
    border: 1px solid red;
  }
  .error-message {
    color: red;
    font-size: 12px;
    margin-bottom: 10px;
    display: block;
  }
  </style>
</head>
<body>

  <div class="header">
    <h2>CRUD-OPERATION</h2>
  </div>

  <div class="form-container">
    <h3><u>Create Profile Account</u></h3>
    <br>
    <form  method="post" onsubmit="return validateForm();">
  <label for="username">Username</label>
  <input type="text" name="username" id="username" placeholder="enter username">
  <small class="error-message" id="username-error"></small>

  <label for="email">Email</label>
  <input type="email" name="email" id="email" placeholder="enter email">
  <small class="error-message" id="email-error"></small>

  <label for="password">Password</label>
  <input type="password" name="password" id="password" placeholder="enter password">
  <small class="error-message" id="password-error"></small>

  <button type="submit" name="submit" class="submit-btn">Submit</button>
</form>
  </div>

</body>
<script>
  function validateForm() {
    let isValid = true;

    // Get fields
    const username = document.getElementById("username");
    const email = document.getElementById("email");
    const password = document.getElementById("password");

    // Error elements
    const usernameError = document.getElementById("username-error");
    const emailError = document.getElementById("email-error");
    const passwordError = document.getElementById("password-error");

    // Reset errors
    [username, email, password].forEach(el => el.classList.remove("error"));
    [usernameError, emailError, passwordError].forEach(el => el.innerText = "");

    // Username check
    if (username.value.trim() === "") {
      username.classList.add("error");
      usernameError.innerText = "This field is required";
      isValid = false;
    }

    // Email check
    if (email.value.trim() === "") {
      email.classList.add("error");
      emailError.innerText = "This field is required";
      isValid = false;
    }

    // Password check
    if (password.value.trim() === "") {
      password.classList.add("error");
      passwordError.innerText = "This field is required";
      isValid = false;
    }

    return isValid;
  }
</script>
</html>