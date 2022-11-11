<?php require APPROOT . '/views/includes/header.php'; ?>
<?php require APPROOT . '/views/includes/navbar.php'; ?>
<div class="gallery">
    <?php if ($data['user']!=false):?>
    <div class="uploader">
        <div class="nav__profile-image">
            <img id="vistProfile" src="<?php echo RPROF_FOLD.$data['user']->profile;?>" alt="avatar" />
        </div>
        <p class="modalUsername" id="visitUserName" ><?php echo $data['user']->username?></p>
    </div>
    <?php endif?>
</div>

<div class="gallery">
  <div class="box">
    <?php if (isset($data)) : ?>
      <div class="collection">
        <?php $row = $data['images'][0]; ?>
        <?php foreach ($row as $row1) : ?>
          <?php if (!empty($row1)) : ?>
            <img class="display-image" src=<?= RUPLD_FILE . $row1->location ?> alt=<?= $row1->uid . "X:" . $row1->id ?>>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>

      <div class="collection">
        <?php foreach ($data['images'][1] as $row2) : ?>
          <?php if (!empty($row1)) : ?>
            <img class="display-image" src=<?= RUPLD_FILE . $row2->location ?> alt=<?= $row2->uid . "X:" . $row2->id ?>>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>

      <div class="collection">
        <?php foreach ($data['images'][2] as $row3) : ?>
          <?php if (!empty($row1)) : ?>

            <img class="display-image" src=<?= RUPLD_FILE . $row3->location ?> alt=<?= $row3->uid . "X:" . $row3->id ?>>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</div>

<?php require APPROOT . '/views/includes/modal.php'; ?>
<script type="text/javascript" src="<?php echo URLROOT; ?>/js/modal.js"></script>
<?php require APPROOT . '/views/includes/footer.php'; ?>