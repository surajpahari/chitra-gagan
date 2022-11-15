<?php require APPROOT . '/views/includes/header.php'; ?>
<?php require APPROOT . '/views/includes/navbar.php'; ?>
<div class="form-wrapper">
	<h1>Select Image </h1>
	<div id="formBox">
		<form class="entryform" action="<?php echo URLROOT; ?>/images/upload" method="POST" enctype="multipart/form-data">
			<!-- <label for="title">Resource Title</label> -->
			<div class="form-options">
				<input type="text" name="title" value="<?php echo (!empty($data['title_err'])) ? $data['username_err'] : '' ?>" placeholder="Image Title ...." required>
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
					<span class="form-span"> <?php echo (!empty($data['upload_err'])) ? $data['upload_err'] : ''; ?> </span>
				</div>
			<?php endif; ?>

			<div id=metaFormBox>
				<div class="form-options">
					<label>Category</label>
					<select id="select-category" name="category">
						<option>--</option>
					</select>
					<!-- <button id="category-show" class="show btn"><i class="uil uil-angle-down"></i></button> -->
				</div>

				<div class="form-options">
					<label>Shutter-speed</label>
					<select id="select-shutter-speed" name="shutter-speed">
						<option>--</option>
					</select>
					<!-- <button id="shutter-speed-show" class="show btn"><i class="uil uil-angle-down"></i></button> -->
				</div>

				<div class="form-options">
					<label>Aperture</label>
					<select id="select-aperture" name="aperture">
						<option>--</option>
					</select>
					<!-- <button id="aperture-show" class="show btn"><i class="uil uil-angle-down"></i></button> -->
				</div>

				<div class="form-options">
					<label>Exposure</label>
					<select id="select-exposure" name="exposure">
						<option>--</option>
					</select>
					<!-- <button id="exposure-show" class="show btn"><i class="uil uil-angle-down"></i></button> -->
				</div>

				<div class="form-options">
					<label>ISO</label>
					<select id="select-iso" name="iso">
						<option>--</option>
					</select>
					<!-- <button id="iso-show" class="show btn"><i class="uil uil-angle-down"></i></button> -->
				</div>

				<div id="hidden-form-option" class="form-options">
					<input id="hidden-input" value="no" name="meta_check">
					<!-- <button id="aperture-show" class="show btn"><i class="uil uil-angle-down"></i></button> -->
				</div>
			</div>
			<button id="showMeta" class="entrybtn">Add meta data</button>
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
<script type="text/javascript" src="<?php echo URLROOT; ?>/js/metaform.js"></script>
<?php require APPROOT . '/views/includes/footer.php'; ?>