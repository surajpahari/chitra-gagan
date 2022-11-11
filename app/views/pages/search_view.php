<?php require APPROOT . '/views/includes/header.php'; ?>
<?php require APPROOT . '/views/includes/navbar.php'; ?>
<div class="gallery">
    <?php $result_check = 0; ?>
    <?php if (isset($data['exact_user'])) : ?>
        <?php if (!empty($data['exact_user'])) : ?>
            <h1 style="text-align:center" ;>User</h1>
            <?php $exact_users = $data['exact_user']; ?>
            <div class="uploader">
                <div class="nav__profile-image">
                    <img class="searchedProfile" id="<?php echo "searchedProfileImage" .$result_check?>" src="<?php echo RPROF_FOLD . $exact_users->profile; ?>" alt="<?php echo $exact_users->profile . "X:" . $exact_users->id ?>" />
                </div>
                <p class="modalUsername" id="searchedUserName"><?php echo $exact_users->username ?></p>
            </div>
            <?php $result_check++ ?>
        <?php endif ?>
    <?php endif ?>


    <?php if (isset($data['approx_user'])) : ?>
        <?php if (!empty($data['approx_user'])) : ?>
            <h1 style="text-align:center" ;>Related Users</h1>
            <?php $approx_users = $data['approx_user']; ?>
            <?php foreach ($approx_users as $user) : ?>
                <div class="uploader">
                    <div class="nav__profile-image">
                        <img class="searchedProfile" id="<?php echo "searchedProfileImage".$result_check?>"
                        src="<?php echo RPROF_FOLD . $user['profile']; ?>"
                        alt="<?php echo $user['profile'] . "X:" . $user['id'] ?>"/>
                    </div>
                    <p class="modalUsername searchedUserName"><?php echo $user['username'] ?></p>
                </div>
                <?php $result_check++ ?>
            <?php endforeach ?>
        <?php endif ?>
    <?php endif ?>

    <?php if ($result_check == 0) : ?>
        <h3 style="text-align:center">No result found</h3>
    <?php endif ?>


    <script type="text/javascript" src="<?php echo URLROOT; ?>/js/search.js"></script>
    <?php require APPROOT . '/views/includes/footer.php'; ?>