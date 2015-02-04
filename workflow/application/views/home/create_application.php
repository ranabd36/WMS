<div class="content col-md-9 ">
			
					
					<ul class="breadcrumb">
						<li>
							<a href="<?php echo base_url(); ?>homepage">Home</a>
						</li>
						<li class="active">Create Application</li>
					</ul>
					
					<form method="POST" class="form-horizontal app_form" role="form" action="<?php echo base_url(); ?>homepage/save_application"> 
						<div class="form-group">
							<div class="col-sm-offset-1 col-sm-2">
								<label for="inputPassword3" class="control-label">To:</label>
							</div>
							<div class="col-sm-8">
								<select name="app_to" class="form-control">
									<?php foreach($user as $value)
									{ ?>
									<option value="<?php echo $value['user_id']?>"><?php if($value['user_type']==2)
									{
										echo "Vice Chancellor";
									}elseif($value['user_type']==3)
									{
										echo("Register");
									}elseif($value['user_type']==4)
									{
										echo("Dean");
									}elseif($value['user_type']==5)
									{
										echo "Head of the ".$value['user_department']." Department";
									}
									else
									{
										continue;
									}
									
									?></option>		
								<?php	} ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-1 col-sm-2">
								<label for="inputPassword3" class="control-label">Through:</label>
							</div>
							<div class="col-sm-8">
								
								<select name="through[]" id="ddlFruits" >
									<?php foreach($user as $value)
									{ ?>
									<option value="<?php echo $value['user_id']?>"><?php if($value['user_type']==2)
									{
										echo "Vice Chancellor";
									}elseif($value['user_type']==3)
									{
										echo("Register");
									}elseif($value['user_type']==4)
									{
										echo("Dean");
									}elseif($value['user_type']==5)
									{
										echo "Head of the ".$value['user_department']." Department";
									}else
									{
										continue;
									}
									
									?></option>		
								<?php	} ?>
								</select>
								<a class="btn btn-danger" id="btnClone">+</a>
							
							
						</div>
						 <div id="container">
</div>
							<div class="new-categories">
							
							</div>
							
						</div>
						<div class="form-group">
							<div class="col-sm-offset-1 col-sm-2">
								<label for="inputPassword3" class="control-label">Subject:</label>
							</div>
							<div class="col-sm-8">
								<input name="subject" type="text" class="form-control" id="inputPassword3" placeholder="Subject">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-1 col-sm-2">
								<label class="control-label">Message:</label>
							</div>
							<div class="col-sm-8">
								<textarea name="body" class="form-control" col="50" style="height: 230px; width: 500px;"></textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-1 col-sm-2 attachment">Add Attachment
								<input type="file">
							</div>
							<div class="col-sm-2 submit_button">
								<button type="submit" class="btn btn-success">Submit Application</button>
							</div>
						</div>
					</form>
					
					<?php if(!empty($this->session->userdata('msg')))
						{?>
					<div class="show_msg">
						
						<?php	echo($this->session->userdata('msg'));
						$this->session->unset_userdata('msg');
							
							
						 ?>
			</div>
			<?php }?>
					
				</div>