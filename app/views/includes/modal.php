<?php $profile_path = SITE . "profile" ?>

<div class="modalwrapper" id="">
</div>

<div class="modal" id="myModal">
  <div class="imageWrapper">
    <div>
      <a class="close"> <i class="uil uil-times-circle closebtn"></i></a>
    </div>
    <div class="imageDiv">
      <img class="modal-content modalImage" id="img01">
      <div class="imageContent">
        <div class="uploader">
          <div class="nav__profile-image">
            <img id="modalProfile" src="<?php echo $profile_path ?>" alt="avatar" />
          </div>
          <p class="modalUsername" id="modalUsername"></p>
        </div>
        <div class="caption">
          <span id="imageTitle"></span>
        </div>
        <div class="imageProperty">
          <span id="imageData">
            <ul>
              <li id="category"></li>
              <li id="exposure"> </li>
              <li id="aperture"> </li>
              <li id="shutterSpeed"> </li>
              <li id="iso"> </li>
              <!-- <li id = "dimension"> Dimension</li> -->
              <li id="imageWidth">type</li>
              <li id="imageHeight"> Dimension</li>
              <li id="imageType">type</li>
              <li id="imageBits">type</li>
            </ul>
          </span>
        </div>
        <div class="imageInfo">
          <div class="imageActions">
            <button class="btn btn-primary" id="downloadLink">Download</button>
            <button class="btn btn-success" id="likeButton"><i class="uil uil-thumbs-up"></i></button>
          </div>
          <div>
            <span>Likes: </span><span id="likeCount"></span>
          </div>
          <?php if (isset($data)) : ?>
            <?php if (isset($data['mygallery'])) : ?>
              <?php if ($data['mygallery']) : ?>
                <div>
                  <button class="btn btn-danger" id="modalDeleteButton"><i class="uil uil-image-times"></i></i></button>
                </div>
              <?php endif ?>
            <?php endif ?>
          <?php endif ?>
        </div>
      </div>
    </div>
  </div>