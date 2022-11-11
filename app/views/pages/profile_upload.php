<?php require APPROOT . '/views/includes/header.php'; ?>
<?php require APPROOT . '/views/includes/navbar.php'; ?>

 	<div class="gallery" id="formBox">
		<!-- <h1>change your profile</h1> -->
	<form action="<?php echo URLROOT; ?>/images/profile_upload" method="POST" enctype="multipart/form-data">
			<!-- <label for="title">Resource Title</label> -->
			<input id="rlInput"type="file" name="file">
			<input type="submit" name="submit" value="submit">
		</form>
	</div>
		
<?php $profile_path ='../../profile/'?>
 <div class="gallery">
	<div class="box">
		<div class="collection">
		<img class="display-image" src=<?=$profile_path.$data[0]->profile?> alt="your profile"> 
		</div>
	</div>
</div>
<?php require APPROOT . '/views/includes/footer.php'; ?>
