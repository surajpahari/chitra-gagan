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
 
<?php require APPROOT . '/views/includes/modal.php'; ?>
<?php require APPROOT . '/views/includes/footer.php'; ?>