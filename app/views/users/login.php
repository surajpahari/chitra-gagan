<!DOCTYPE html>
<html>

<head>
  <title>Log in</title>
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
 </head>

<body>
    <?php flash('register_sucess');?>
  <div id="bg"></div>
  <form action="<?php echo URLROOT; ?>/users/login" method="post">
    <div class="formContainer">
      <h1>Log in</h1>

       
      <label for="username"><b>Email</b></label>
      <input type="text" placeholder="Enter username" name="username" value="<?php echo $data['username']?>" required>
      <label for="password"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" value="<?php echo $data['password'] ?>" required>
       

      <div>
        <button type="button" class="login"><a href="<?php echo URLROOT; ?>/users/register">Sign in</a></button>
        <button type="submit" class="signup">Log in</button>
      </div>
    </div>
  </form>
</body>

</html>