<!-- error and success massege -->

<div class="col-4 my-3">
    <?php if ('duplicateroll' == $alert) : ?>
        <div class="alert alert-danger m-0" role="alert">
            Duplicate Roll Number
        </div>
    <?php elseif ('success' == $alert) : ?>
        <div class="alert alert-success m-0" role="alert">
            Student Add Successfull
        </div>
    <?php elseif ('duplicate_roll' == $alert) : ?>
        <div class="alert alert-success m-0" role="alert">
            duplicate roll
        </div>
    <?php elseif ('seedsuccess' == $alert) : ?>
        <div class="alert alert-success m-0" role="alert">
            seeding complete
        </div>
    <?php elseif ('deletecomplete' == $alert) : ?>
        <div class="alert alert-success m-0" role="alert">
            student deleted
        </div>
    <?php elseif ('updatesuccess' == $alert) : ?>
        <div class="alert alert-success m-0" role="alert">
            student Updated
        </div>
    <?php endif; ?>
</div>