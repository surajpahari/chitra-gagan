<?php require APPROOT . '/views/includes/header.php'; ?>
<?php require APPROOT . '/views/includes/navbar.php'; ?>
<div class="form-wrapper">
	<h1>Select Image </h1>

	<div id="formBox">
		<form class="entryform" action="<?php echo URLROOT; ?>/images/upload" method="POST" enctype="multipart/form-data">
			<!-- <label for="title">Resource Title</label> -->
			<div class="form-options">
				<input type="text" name="title" placeholder="Image Title ...." required>
			</div>
			<div class="form-options">
				<input id="rlInput" type="file" name="file">
			</div>
			<div class="form-options">
				<button class="entrybtn" type="submit"></button>
			</div>
		</form>
	</div>
</div>