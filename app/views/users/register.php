<!DOCTYPE html>
<html>

<head>
  <title>Signup Form</title>
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
</head>

<body>
  <div id="bg"></div>
  <form action="<?php echo URLROOT; ?>/users/register" method="post">
    <div class="formContainer">
      <h1>Sign Up </h1>

      <label for="First Name"><b>First Name</b></label>
      <input type="text" placeholder="Enter First Name" name="fname" value="<?php echo $data['fname'] ?>" required>
      <label for="Last  Name"><b>Last Name</b></label>
      <input type="text" placeholder="Enter Last Name" name="lname" value="<?php echo $data['lname'] ?>" required>
      <label for="email"><b>Email</b></label>
      <input type="email" placeholder="Enter Email" name="email" value="<?php echo $data['email'] ?>" required>
      <label for="email"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" value="<?php echo $data['username'] ?>" required>
      <label for="password"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" value="<?php echo $data['password'] ?>" required>
      <label for="ConfirmPassword"><b>Confirm Password</b></label>
      <input type="password" placeholder="Confirm Password" name="confirm_password" value="<?php echo $data['confirm_password'] ?>" required>

      <div>
        <button type="button" class="login"><a href="<?php echo URLROOT; ?>/users/login">Log in</a></button>
        <button type="submit" class="signup">Sign Up</button>
      </div>
    </div>
  </form>
</body>

</html>