<?php require APPROOT . '/views/includes/header.php'; ?>
<?php require APPROOT . '/views/includes/navbar.php'; ?>

<div class="gallery">
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
</div>


<?php if (isset($_SESSION['user_id'])) : ?>
<?php require APPROOT . '/views/includes/modal.php'; ?>
<script type="text/javascript" src="<?php echo URLROOT;?>/js/modal.js"></script>
<?php endif;?>
<?php require APPROOT . '/views/includes/footer.php'; ?>
