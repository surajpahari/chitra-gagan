<?php require APPROOT . '/views/includes/header.php'; ?>
<?php require APPROOT . '/views/includes/navbar.php'; ?>

<div class="gallery">
  <div class="box">
    <div class="collection">
      <img data="hello" class="display-image" src="<?php echo URLROOT; ?>/images/1.jpg" alt="a">
      <img class="display-image" src="<?php echo URLROOT; ?>/images/5.jpg" alt="a">
      <img class="display-image" src="<?php echo URLROOT; ?>/images/2.jpg" alt="a">
      <img class="display-image" src="<?php echo URLROOT; ?>/images/3.jpg" alt="a">
      <img class="display-image" src="<?php echo URLROOT; ?>/images/4.jpg" alt="a">
      <img class="display-image" src="<?php echo URLROOT; ?>/images/1.jpg" alt="a">
    </div>

    <div class="collection">
      <img class="display-image" src="<?php echo URLROOT; ?>/images/6.jpg" alt="a">
      <img class="display-image" src="<?php echo URLROOT; ?>/images/7.jpg" alt="a">
      <img class="display-image" src="<?php echo URLROOT; ?>/images/8.jpg" alt="a">
      <img class="display-image" src="<?php echo URLROOT; ?>/images/9.jpg" alt="a">
      <img class="display-image" src="<?php echo URLROOT; ?>/images/10.jpg" alt="a">
    </div>

    <div class="collection">
      <img data="hello" class="display-image" src="<?php echo URLROOT; ?>/images/5.jpg" alt="a">
      <img class="display-image" src="<?php echo URLROOT; ?>/images/3.jpg" alt="a">
      <img class="display-image" src="<?php echo URLROOT; ?>/images/4.jpg" alt="a">
      <img class="display-image" src="<?php echo URLROOT; ?>/images/2.jpg" alt="a">
      <img class="display-image" src="<?php echo URLROOT; ?>/images/5.jpg" alt="a">
      <img class="display-image" src="<?php echo URLROOT; ?>/images/5.jpg" alt="a">
      <img class="display-image" src="<?php echo URLROOT; ?>/images/5.jpg" alt="a">
      <img class="display-image" src="<?php echo URLROOT; ?>/images/5.jpg" alt="a">
      <img class="display-image" src="<?php echo URLROOT; ?>/images/5.jpg" alt="a">
    </div>
  </div>
</div>



<div id="myModal" class="modal">
  <!-- The Close Button -->
  <span class="close">close</span>
  <br>
  <div class="nav__profile-image">
    <img  id="modalprofile" src="<?php echo URLROOT; ?>/profile/" alt="avatar" />
  </div>
  <div class="nav__profile-options">
       <span id="modalUsername">
       </span>
  </div>

  <!-- Modal Content (The Image) -->
  <img class="modal-content" id="img01">

  <!-- Modal Caption (Image Text) -->
  <div id="caption"></div>
  <span class="close">download</span>
  <div class="close" id ="likeButton" >likes</div>
</div>
<?php require APPROOT . '/views/includes/footer.php'; ?>