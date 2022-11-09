<?php require APPROOT . '/views/includes/header.php'; ?>
<?php require APPROOT . '/views/includes/navbar.php'; ?>

<div class="gallery">
  <div class="row">
    <div class="column">
      <?php
      // var_dump($data);
      $path = "../../uploads/";
      $i = 0;
      if (isset($data)) {
        foreach ($data as $image) {
          if (file_exists($path . $image->location)) {

            if ($i == 2) {
              $i = 0;
      ?>
    </div>
    <div class="column">
    <?php
            }
    ?>
    <img class="display-image" src=<?= $path . $image->location ?>   alt=<?=$image->uid."X:".$image->id?>>
    <?php $i++; ?>
    <br>
<?php
          }
        }
      };
?>
<div id="myModal" class="modal">

  <!-- The Close Button -->
  <span class="close">close</span>
  <br>
  <div class="nav__profile-image">
    <img src="<?php echo URLROOT; ?>/images/avatar.jpg" alt="avatar" />
  </div>
  <div class="nav__profile-options">
    <span>
      Xavier
    </span>
  </div>

  <!-- Modal Content (The Image) -->
  <img class="modal-content" id="img01">

  <!-- Modal Caption (Image Text) -->
  <div id="caption"></div>
  <span class="close">download</span>
  <div class="close" id="likeButton" >likes</div>
</div>
    </div>
  </div>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>