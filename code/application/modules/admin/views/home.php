<div class="row">

	<div class="col-md-4">
		<?php echo modules::run('adminlte/widget/box_open', 'Shortcuts'); ?>
			<?php echo modules::run('adminlte/widget/app_btn', 'fa fa-user', 'Account', 'panel/account'); ?>
			<?php echo modules::run('adminlte/widget/app_btn', 'fa fa-sign-out', 'Logout', 'panel/logout'); ?>
		<?php echo modules::run('adminlte/widget/box_close'); ?>
	</div>

	<div class="col-md-4">
		<?php echo modules::run('adminlte/widget/info_box', 'yellow', $count['users'], 'Users', 'fa fa-users', 'user'); ?>
	</div>
	
	<div class="col-md-4">
		<?php echo modules::run('adminlte/widget/info_box', 'yellow', $count['groups'], 'Groups', 'fa fa-users', 'user/group'); ?>
	</div>
	
	<div class="col-md-4">
		<?php echo modules::run('adminlte/widget/info_box', 'green', $count['cdac_arcs'], 'ARCs', 'fa fa-users', 'arc'); ?>
	</div>
	
	<div class="col-md-4">
		<?php echo modules::run('adminlte/widget/info_box', 'green', $count['cdac_atcs'], 'ATCs', 'fa fa-users', 'atc'); ?>
	</div>
	
</div>
