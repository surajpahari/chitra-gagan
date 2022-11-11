<nav>
  <div class="container nav__container">
    <h2 class="nav__container-logo">
      <?php echo strtolower(SITENAME); ?>
    </h2>
    <div class="nav__profile">
      <?php if (isset($_SESSION['user_id'])) : ?>
        
        <div class="search">
            <form action="<?php echo URLROOT; ?>/users/profile_search" method="GET">
                <input type="text"
                    placeholder="Profile/Images"
                    name="search" d>
                    <input type="submit" name="submit" value="submit">
            </form>
        </div>
        
        <div class="dropdown">
          <div class="nav__profile-image">
          <img  id ="navProfile" src="" alt=<?=$uid = $_SESSION['user_id']?> />
          </div>
          <div class="dropdown-content">
            <a href="<?php echo URLROOT . '/pages' ?>">Home</a>
            <a href="<?php echo URLROOT . '/images/upload' ?>">upload</a>
            <a href="<?php echo URLROOT . '/pages/mygallery' ?>">My content</a>
            <a href="<?php echo URLROOT . '/pages/profile_upload'?>">Edit profile</a>
          </div>
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
