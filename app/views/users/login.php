<?php require APPROOT . '/views/includes/header.php'; ?>
<?php require APPROOT . '/views/includes/navbar.php'; ?>

<div id="background"></div>

<div class="form-wrapper">
  <?php flash('register_success') ?>
  <form class="entryform" action="<?php echo URLROOT; ?>/users/login" method="post">
    <div class="form-options">
      <input type="username" name="username" id="username" value="<?php echo $data['username']; ?>" placeholder="Your Username" />
    </div>
    <?php if (!empty($data['username_err'])) : ?>
      <div class="form-options">
        <span class="form-span"> <?php echo (!empty($data['username_err'])) ? $data['username_err'] : ''; ?> </span>
      </div>
    <?php endif; ?>
    <div class="form-options">
      <input type="password" name="password" id="password" value="<?php echo $data['password']; ?>" placeholder="Your Password" />
    </div>
    <?php if (!empty($data['password_err'])) : ?>
      <div class="form-options">
        <span class="form-span"> <?php echo (!empty($data['password_err'])) ? $data['password_err'] : ''; ?> </span>
      </div>
    <?php endif; ?>
    <div class="form-options">
      <button class="entrybtn" type="submit">Login</button>
    </div>
    <div class="form-options">
    </div>
  </form>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>