<?php require APPROOT . '/views/includes/header.php'; ?>
<?php require APPROOT . '/views/includes/navbar.php'; ?>
<div id="data"><?php var_dump($data); ?></div>
<div class="gallery">
    <h1>Related Users</h1>
    <div class="uploader">
        <div class="nav__profile-image">
            <img id="modalProfile" src="<?php echo URLROOT;?>/images/1.jpg" alt="avatar" />
        </div>
        <p class="modalUsername" id="modalUsername">ramanujj</p>
    </div>
    <div class="uploader">
        <div class="nav__profile-image">
            <img id="modalProfile" src="<?php echo URLROOT;?>/images/1.jpg" alt="avatar" />
        </div>
        <p class="modalUsername" id="modalUsername">ramanujj</p>
    </div>
    <div class="uploader">
        <div class="nav__profile-image">
            <img id="modalProfile" src="<?php echo URLROOT;?>/images/1.jpg" alt="avatar" />
        </div>
        <p class="modalUsername" id="modalUsername">ramanujj</p>
    </div>
    <div class="uploader">
        <div class="nav__profile-image">
            <img id="modalProfile" src="<?php echo URLROOT;?>/images/1.jpg" alt="avatar" />
        </div>
        <p class="modalUsername" id="modalUsername">ramanujj</p>
    </div>
    <div class="uploader">
        <div class="nav__profile-image">
            <img id="modalProfile" src="<?php echo URLROOT;?>/images/1.jpg" alt="avatar" />
        </div>
        <p class="modalUsername" id="modalUsername">ramanujj</p>
    </div>
</div>

<div class="gallery">
<h1>Related Images</h1>
  <div class="box">
    <div class="collection">
      <img data="hello" class="display-image" src="<?php echo URLROOT; ?>/images/1.jpg" alt="a">
      <img class="display-image" src="<?php echo URLROOT; ?>/images/5.jpg" alt="a">
      <img class="display-image" src="<?php echo URLROOT; ?>/images/2.jpg" alt="a">
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
</div> -->
<script type="text/javascript" src="<?php echo URLROOT; ?>/js/search.js"></script>
<?php require APPROOT . '/views/includes/footer.php'; ?>