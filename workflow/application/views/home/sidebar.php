
<div class="col-md-3 left_sidebar">
					<div class="login_user">
						<span class="glyphicons glyphicons-group"></span><span class="login_as">Login As:</span>
						<?php if($this->session->userdata('user_type')==2)
						
			{
				echo "Vice Chancellor";
			}elseif($this->session->userdata('user_type')==3)
			{
				echo("Register");
			}elseif($this->session->userdata('user_type')==4)
			{
				echo("Dean");
			}elseif($this->session->userdata('user_type')==5)
			{
				echo "Head (".$this->session->userdata('user_department')." Department)";
			}elseif($this->session->userdata('user_type')==6)
			{
				echo "Other";
			}elseif($this->session->userdata('user_type')==7)
			{
				echo "Student";
			}
			  ?>
					</div>
					<div class="col-md-4 thumb">
						<img src="<?php if(empty($user_pic))
						{
							echo base_url()."images/default.jpg";
						}else
						{ 
							echo base_url()."images/profile_pic/".$user_pic;
						}?>">
					</div>
					<div class="col-md-8 link">
						<ul>
							<li>
								<a href=""><?php echo $user_name; ?></a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>homepage/view_profile">View My Profile</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>homepage/change_password">Change Password</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>homepage/logout">Logout</a>
							</li>
						</ul>
					</div>
					<div class="col-md-12 link main_menu">
						<p class="menu">Quick Menu</p>
						<ul id="nav">
							<li>
								<a href="<?php echo base_url(); ?>homepage">Create Application</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>homepage/manage_application">Manage Application</a>
							</li>
							<?php if ($this->session->userdata('user_type')<6) { ?>
								
							
							<li>
								<a href="<?php echo base_url(); ?>homepage/inbox">Approvals</a>
							</li>
							<?php } ?>
						</ul>
					</div>
				</div>
				
