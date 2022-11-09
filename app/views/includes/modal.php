<?php $profile_path = "../../profile/"?>
<div id="myModal" class="modal">
  <!-- The Close Button -->
  <span class="close">close</span>
  <br>
  <div class="nav__profile-image">
    <img  id="modalProfile" src="<?php echo $profile_path?>" alt="avatar" />
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