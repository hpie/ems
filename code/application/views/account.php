<link href='<?=base_url()?>assets/dist/admin/adminlte.min.css' rel='stylesheet' media='screen'>
<h3>Welcome, <?php echo $user->first_name.' '.$user->last_name; ?>!</h3>
<h4>You were last seen on,<b> <?php echo (date("F d, Y h:i:s", $user->last_login)); ?></b> </h4>
<div class="row">
    <?php
    if (!empty($notificationType)) {
        foreach ($notificationType as $notification) {
            ?>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>

                    <div class="info-box-content" onclick="UpdateStatus(<?= $notification['notification_id'] ?>)">
                        <span class="info-box-text"><?= $notification['category_title']; ?></span>
                        <span class="info-box-number"><?= $notification['count']; ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
    <?php }
} ?>
    <!-- /.col -->

</div>
<a href="auth/logout" class="btn btn-primary">Logout</a>
<script>
    function UpdateStatus(notificationId) {
        if (notificationId != '') {
            $.ajax({
                url: "<?= base_url() ?>" + "account/updateStatus",
                type: "POST",
                data: {notificationId: notificationId},
                success: function (data) {

                },
            });
        } else {
            return false;
        }
    }
</script>