<div class="content col-md-12 ">
	<ul class="breadcrumb">
		<li>
			<a href="<?php echo base_url(); ?>homepage">Home</a>
		</li>
		<li class="active">View Profile</li>
	</ul>
<div class="col-md-offset-3 col-md-6 ">
	<h3 class="text-center login">Change Password</h3>
	<form class="form-horizontal login_form" role="form" action="<?php echo base_url();?>homepage/password_change" method="post">
		<div class="form-group">
			<div class="col-sm-5">
                <label for="inputEmail3" class="control-label">Current Password:</label>
			</div>
			<div class="col-sm-7">
                <input type="password" name="cur_pass" class="form-control" id="inputEmail3" placeholder="Current Password">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-5">
                <label for="inputPassword3" class="control-label">New Password:</label>
			</div>
			<div class="col-sm-7">
                <input type="password" name="newpass1" class="form-control" id="inputPassword3" placeholder="New Password">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-5">
                <label for="inputPassword3" class="control-label">Retype New Password:</label>
			</div>
			<div class="col-sm-7">
                <input type="password" name="newpass2" class="form-control" id="inputPassword3" placeholder="Retype New Password">
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-sm-offset-5 col-sm-7">
                <button type="submit" class="btn btn-default">Save Change</button>
			</div>
			<div class="show_msg">
				<?php echo $this->session->userdata('msg');
				$this->session->unset_userdata('msg');
				 ?>
				
			</div>
		</div>
	</form>
</div>
</div>