<div class="content col-md-12 ">
	<ul class="breadcrumb">
		<li>
			<a href="<?php echo base_url(); ?>homepage">Home</a>
		</li>
		<li class="active">View Profile</li>
	</ul>
	<div class="row" style="margin: 0;padding:0">
		
		<div class="col-md-4">
			<div class="view_img">
				<?php if(!empty($user_pic))
				{?>
				<img src="<?php echo base_url()."images/profile_pic/".$user_pic;?>">
				<?php }else{ ?>
				<img src="<?php echo base_url()?>images/default.jpg">
				<?php } ?>
				<div class="change_img">
					<button id="show" onclick="showDiv()">Change Photo</button>
					
				</div>
				<div id="msg">
					<?php 
					echo $this->session->userdata('msg');
					$this->session->unset_userdata('msg');
						?>
				</div>
				<div id="p" style="display:none;">
					<p>Image size should be 100kb and dimension maximum 250*300</p>
					<?php echo form_open_multipart('homepage/do_upload');?>
						<input type="file" name="userfile" size="20" />
						<input type="submit" value="Save Change"/>
					</form>
				</div>
				
				
			</div>
		</div>
		
		<div class="col-md-8 ">
			<div class="table-responsive" id="table">
				<table class="table table-bordered">
					<tbody>
					
						
					
						<tr class="danger">
							<td colspan='2' draggable="true" align="center">Personal Detail</td>
						</tr>
						<tr class="info">
							<td draggable="true">Name:</td>
							<td><?php echo $user_name;?></td>
						</tr>
						<tr class="info">
							<td>Email:</td>
							<td><?php echo $user_email;?></td>
						</tr>
						<tr class="info">
							<td>Department:</td>
							<td><?php echo $user_department;?></td>
						</tr>
						<tr class="info">
							<td>Date of Birth:</td>
							<td><?php echo $date_of_birth;?></td>
						</tr>
						<tr class="info">
							<td>Gender:</td>
							<td><?php 
							if($user_gender==1)
							{
								echo("Male");
							}else
							{
								echo("Female");
							}
							?>
								
							</td>
						</tr>
						
						<tr class="info">
							<td>Designation:</td>
							<td><?php 
									if($user_type==1)
									{
										echo "System Admin";
									}elseif($user_type==2)
									{
										echo "Vice Chancellor";
									}elseif($user_type==3)
									{
										echo "Register";
									}elseif($user_type==4)
									{
										echo "Dean";
									}elseif($user_type==5)
									{
										echo "Department Head";
									}elseif($user_type==6)
									{
										echo "Ohter";
									}elseif($user_type==7)
									{
										echo "Student";
									}
									
									
									?></td>
						</tr>
						<tr class="info">
							<td>Phone:</td>
							<td><?php echo $user_phone;?></td>
						</tr>
						<tr class="info" >
							<td>Address:</td>
							<td><?php echo $user_address;?></td>
						</tr>
					</tbody>
					
				</table>
			</div>
			<div id="button">
				<button id="show" onclick="showEditProfile()">Edit Profile</button>
			</div>
			<div class="show_msg">
				<?php echo $this->session->userdata('success_msg');
				$this->session->unset_userdata('success_msg');
				 ?>
			</div>
			<form action="<?php echo base_url()?>homepage/update_user" method="post">
				<div class="table-responsive" id="editable_table" style="display:none;">
					<table class="table table-bordered">
						
						<tbody>
							<tr class="danger">
								<td colspan='2' draggable="true" align="center">Personal Detail</td>
							</tr>
							<tr class="info">
								<td draggable="true">Name:</td>
								<td><input name="name" class="input_box" type="text" value="<?php echo $user_name;?>" /></td>
							</tr>
							<tr class="info">
								<td>Email:</td>
								<td><input name="email" class="input_box" type="text" value="<?php echo $user_email;?>" /></td>
							</tr>
							<tr class="info">
								<td>Department:</td>
								<td><input name="dept" class="input_box" type="text" value="<?php echo $user_department;?>" /></td>
							</tr>
							<tr class="info">
								<td>Date of Birth:</td>
								<td><input name="dob" class="input_box" type="text" value="<?php echo $date_of_birth;?>" /></td>
							</tr>
							<tr class="info">
								<td>Gender:</td>
								<td> <select name="gender">
										<option value="1">Male</option>
										<option value="2">Female</option>
									
									</select> 
								</td>
							</tr>
							
							<tr class="info">
								<td>Designation:</td>
								<td><input name="access_level" class="input_box" type="text" value="<?php 
									if($user_type==1)
									{
										echo "System Admin";
									}elseif($user_type==2)
									{
										echo "Vice Chancellor";
									}elseif($user_type==3)
									{
										echo "Register";
									}elseif($user_type==4)
									{
										echo "Dean";
									}elseif($user_type==5)
									{
										echo "Department Head";
									}elseif($user_type==6)
									{
										echo "Ohter";
									}elseif($user_type==7)
									{
										echo "Student";
									}
									
									
									?>" readonly/></td>
							</tr>
							<tr class="info">
								<td>Phone:</td>
								<td><input name="phone" class="input_box" type="text" value="<?php echo $user_phone;?>" /></td>
							</tr>
							<tr class="info" >
								<td>Address:</td>
								<td><textarea name="address" class="input_box"><?php echo $user_address;?></textarea></td>
							</tr>
						</tbody>
						
					</table>
				</div>
				<div id="save_button" style="display:none;">
					<input type="submit" value="Save Change"/>
				</div>
			</form>
		</div>
		
	</div>
</div>