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
			<?php if (!empty($data['title_err'])) : ?>
				<div class="form-options">
					<span class="form-span"> <?php echo (!empty($data['title_err'])) ? $data['username_err'] : ''; ?> </span>
				</div>
			<?php endif; ?>
			<div class="form-options">
				<input id="rlInput" type="file" name="file">
			</div>
			<?php if (!empty($data['upload_err'])) : ?>
				<div class="form-options">
					<span class="form-span"> <?php echo (!empty($data['upload_err'])) ? $data['username_err'] : ''; ?> </span>
				</div>
			<?php endif; ?>
			<div class="form-options uploadbtn">
				<!-- <input class="uploadbtn" type="submit" name="submit" value= 'UPLOAD'>
				 -->
				<input class="uploadbtn" type="submit" name="submit" value='UPLOAD'>
			</div>
			<?php if (!empty($data['username_err'])) : ?>
				<div class="form-options">
					<span class="form-span"> <?php echo (!empty($data['username_err'])) ? $data['username_err'] : ''; ?> </span>
				</div>
			<?php endif; ?>
		</form>
	</div>
</div>
<?php require APPROOT . '/views/includes/footer.php'; ?>