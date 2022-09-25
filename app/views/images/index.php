<!DOCTYPE html>
<html>
<main>

  <head>
    <div id="Head">
      <h1>Gallery</h1>
    </div>
    <h6 style='text-align:left'><?php echo $_SESSION['user_username']?></h6>


    <title>
      Gallery
    </title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/image.css">

  </head>

  <body>
    <a href=<?php echo URLROOT . '/images/upload' ?>>upload</a>

    <div class="row">
      <div class="column">
        <?php
        $path = '../../uploads/';
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
      <img src=<?= $path . $image->location ?>>
      <?php $i++; ?>
      <br>
<?php
            }
          }
        };
?>
      </div>
    </div>

    <a href=<?php echo URLROOT . '/users/logout' ?>>logout</a>

  </body>
</main>

</html>