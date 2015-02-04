<div class="content col-md-9 ">
					<ul class="breadcrumb">
						<li>
							<a href="<?php echo base_url(); ?>homepage">Home</a>
						</li>
						<li class="active"><?php echo $this->uri->segment(2) ?></li>
					</ul>
					<table class="table" style="">
						<thead>
							<tr class="active">
								
								<th draggable="true">App ID</th>
								<th>Subject</th>
								<th>Status</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						
						<tbody>
						<?php if(!empty($app)){ 
						foreach($app as $value){
								foreach($value as $v)
								{
									
								
							
							 ?>
							<tr class="info">
								
								<td><?php echo $v->app_id ?></td>
								<td>
									<a href="<?php echo base_url()?>homepage/view_application/<?php echo $v->app_id ?> "><?php echo $v->subject ?></a>
								</td>
								<td>
									<?php if(empty($v->app_status))
									{
										echo('<p style="color:orange">Pending</p>');
									}elseif($v->app_status==1)
									{
										echo('<p style="color:green">Accepted</p>');
									}else
									{
										echo('<p style="color:red">Rejected</p>');
									}?>
								</td>
								
								<td class="text-center">
									<div class="btn-group" role="group">
									
										<a href="<?php echo base_url()?>homepage/view_application/<?php echo $v->app_id ?> "><button type="button" class="btn btn-success">View</button></a>
									</div>
								</td>
							</tr>
							<?php }} }?>
						</tbody>
					</table>
				</div>