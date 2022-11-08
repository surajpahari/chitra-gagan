<nav>
  <div class="container nav__container">
    <h2 class="nav__container-logo">
      <?php echo strtolower(SITENAME); ?>
    </h2>
    <div class="nav__profile">
      <?php if (isset($_SESSION['user_id'])) : ?>
        <div class="nav__profile-image">
          <img src="<?php echo URLROOT; ?>/images/avatar.jpg" alt="avatar" />
        </div>
        <div class="nav__profile-options">
          <a href="<?php echo URLROOT ?>/users/logout" class="options">
            <span><i class="uil uil-sign-out-alt"></i></span>
          </a>
        </div>
      <?php else : ?>
        <a class="btn btn-text btn-primary" href="<?php echo URLROOT; ?>/users/login">Login</a>
        <a class="btn btn-text btn-primary" href="<?php echo URLROOT; ?>/users/register">Register</a>
      <?php endif; ?>
    </div>
  </div>
</nav>