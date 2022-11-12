<?php require APPROOT . '/views/includes/header.php'; ?>
<?php require APPROOT . '/views/includes/navbar.php'; ?>
<div class="gallery">
    <?php $result_check = 0; ?>
    <?php if (isset($data['exact_user'])) : ?>
        <?php if (!empty($data['exact_user'])) : ?>
            <h3 style="text-align:center" ;>User</h3>
            <?php $exact_users = $data['exact_user']; ?>
            <div class="searchedUploader">
                <div class="nav__profile-image">
                    <img class="searchedProfile" id="<?php echo "searchedProfileImage" . $result_check ?>" src="<?php echo RPROF_FOLD . $exact_users->profile; ?>" alt="<?php echo $exact_users->profile . "X:" . $exact_users->id ?>" />
                </div>
                <p class="modalUsername" id="searchedUserName"><?php echo $exact_users->username ?></p>
            </div>
            <?php $result_check++ ?>
        <?php endif ?>
    <?php endif ?>


    <?php if (isset($data['approx_user'])) : ?>
        <?php if (!empty($data['approx_user'])) : ?>
            <h3 style="text-align:center" ;>Related Users</h3>
            <?php $approx_users = $data['approx_user']; ?>
            <?php foreach ($approx_users as $user) : ?>
                <div class="searchedUploader">
                    <div class="nav__profile-image">
                        <img class="searchedProfile" id="<?php echo "searchedProfileImage" . $result_check ?>" src="<?php echo RPROF_FOLD . $user['profile']; ?>" alt="<?php echo $user['profile'] . "X:" . $user['id'] ?>" />
                    </div>
                    <p class="modalUsername searchedUserName"><?php echo $user['username'] ?></p>
                </div>
                <?php $result_check++ ?>
            <?php endforeach ?>
        <?php endif ?>
    <?php endif ?>
    <?php if ($result_check == 0) : ?>
        <h3 style="text-align:center">No users found</h3>
    <?php endif ?>
</div>

<?php if (isset($data['images'])) : ?>
    <?php if (!empty($data['images'][0][0])) : ?>
        <div class="gallery">
            <h3 style="text-align:center;margin-bottom:20px" ;>Related Images</h3>
            <div class="box">
                <div class="collection">
                    <?php $row = $data['images'][0]; ?>
                    <?php foreach ($row as $row1) : ?>
                        <?php if (!empty($row1)) : ?>
                            <img class="display-image" src=<?= RUPLD_FILE . $row1["location"] ?> alt=<?= $row1["uid"] . "X:" . $row1["id"] ?>>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>

                <div class="collection">
                    <?php foreach ($data['images'][1] as $row2) : ?>
                        <?php if (!empty($row1)) : ?>
                            <img class="display-image" src=<?= RUPLD_FILE . $row1["location"] ?> alt=<?= $row1["uid"] . "X:" .  $row1["id"] ?>>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>

                <div class="collection">
                    <?php foreach ($data['images'][2] as $row3) : ?>
                        <?php if (!empty($row1)) : ?>
                            <img class="display-image" src=<?= RUPLD_FILE . $row1["location"] ?> alt=<?= $row1["uid"] . "X:" . $row3["id"] ?>>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>
<script type="text/javascript" src="<?php echo URLROOT;?>/js/search.js"></script>
<?php require APPROOT . '/views/includes/modal.php'; ?>
<script type="text/javascript" src="<?php echo URLROOT; ?>/js/modal.js"></script>
<?php require APPROOT . '/views/includes/footer.php'; ?>