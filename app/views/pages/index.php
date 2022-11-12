<?php require APPROOT . '/views/includes/header.php'; ?>
<?php require APPROOT . '/views/includes/navbar.php'; ?>

<div class="gallery">
  <div class="box">
    <?php if (isset($data)) : ?>
      <div class="collection">
        <?php $row = $data['images'][0]; ?>
        <?php foreach ($row as $row1) : ?>
          <img class="display-image" src=<?= RUPLD_FILE . $row1->location ?> alt=<?= $row1->uid . "X:" . $row1->id ?>>
        <?php endforeach; ?>
      </div>

      <div class="collection">
        <?php foreach ($data['images'][1] as $row2) : ?>
          <img class="display-image" src=<?= RUPLD_FILE . $row2->location ?> alt=<?= $row2->uid . "X:" . $row2->id ?>>
        <?php endforeach; ?>
      </div>

      <div class="collection">
        <?php foreach ($data['images'][2] as $row3) : ?>
          <img class="display-image" src=<?= RUPLD_FILE . $row3->location ?> alt=<?= $row3->uid . "X:" . $row3->id ?>>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</div>


<?php if (isset($_SESSION['user_id'])) : ?>
  <?php require APPROOT . '/views/includes/modal.php'; ?>
  <script type="text/javascript" src="<?php echo URLROOT; ?>/js/modal.js"></script>
<?php endif; ?>
<?php require APPROOT . '/views/includes/footer.php'; ?>