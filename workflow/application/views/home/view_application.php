<div class="content col-md-9 ">

	<ul class="breadcrumb">
		<li>
			<a href="<?php echo base_url()?>homepage">home</a>
		</li>
		<li>
			<a href="<?php echo base_url()?>homepage/<?php echo $this->uri->segment(2) ?>"><?php echo $this->uri->segment(2) ?></a>
		</li>
		
		<li class="active"><?php echo $app[0]['app_id'] ?></li>
	</ul>
	<div class="part1">
		<?php $datetime = explode(" ",$app[0]['date']);
			$date=$datetime[0];
			$reformatted_date = date('d-m-Y',strtotime($date));
		echo $reformatted_date;  ?>
		<br><strong>To</strong>
		<br><?php if($app[0]['user_type_to']==2)
			{
				echo "Vice Chancellor";
			}elseif($app[0]['user_type_to']==3)
			{
				echo("Register");
			}elseif($app[0]['user_type_to']==4)
			{
				echo("Dean");
			}elseif($app[0]['user_type_to']==5)
			{
				echo "Head of the ".$app[0]['user_department_to']." Department";
			} ?>
			
				<br><strong>Through</strong><br>
				<?php   
				foreach($app as $value)
				{
					if($value['through_user']==2)
					{
						echo "Vice Chancellor, ";
					}elseif($value['through_user']==3)
					{
						echo("Register, ");
					}elseif($value['through_user']==4)
					{
						echo("Dean, ");
					}elseif($value['through_user']==5)
					{
						echo "Head of the ".$value['user_department_through']." Department, ";
					}
				}
				
				
				?>

	
	<br>Daffodil International University
	<br>
	<strong>Subject: <?php echo $app[0]['subject'] ?></strong>
</div>
<div class="part2">
	<?php echo '<pre>'.$app[0]['body'].'</pre>' ?>
</div>

<div class="part3">
	<p>Best regards
		<br><strong>Name: <?php echo $app[0]['user_name']; ?>
		<br>ID: <?php echo $app[0]['user_id']; ?></strong>
	</p>
</div>

<div class="btn">
	<a href="#" class="btn btn-primary">Show Attachment</a>
</div>
<?php if($this->session->userdata('user_type')>1 && $this->session->userdata('user_type')<7)
	
	{ ?>
	
	<div  class="btn">
		<a id="disableButton" href="<?php echo base_url()?>homepage/accept_application/<?php echo $app[0]['app_id']?>" class="btn btn-primary btn-success">Accept</a>
	</div>
	<div class="btn">
		<a id="disableButton" href="<?php echo base_url()?>homepage/reject_application/<?php echo $app[0]['app_id']?>" class="btn btn-primary btn-danger">Reject</a>
	</div>
<?php } ?>
<!--<div class="btn pos_right" data-toggle="modal">
	<a href="#" class="btn btn-success">Check Status</a>
</div>-->
<div class="check_status">
	<!-- Button HTML (to Trigger Modal) -->
	<!-- Button trigger modal -->
	<button type="button" class="btn btn-primary btn-md pos_right btn-info" data-toggle="modal" data-target="#myModal">
		Check Status
	</button>
	
	<!-- Modal -->
	<div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Current Application Status</h4>
				</div>
				<div class="modal-body">
					<?php   
				foreach($app as $value)
				{
					if($value['through_user']==2)
					{
						echo "<strong>Vice Chancellor:</strong>";
						if($value['through_status']==1)
						{
							echo "<br />". date("d-m-Y h:i:sa",strtotime($app[0]['date_status']));
							echo '<p style="color:green">Accepted</p>';
						}elseif($value['through_status']==2)
						{
							echo "<br />". date("d-m-Y h:i:sa",strtotime($app[0]['date_status']));
							echo '<p style="color:red">Rejected</p>';
						}else
						{
							echo '<p style="color:orange">Pending</p>';
						}
					}elseif($value['through_user']==3)
					{
						echo("<strong>Register:</strong> ");
						if($value['through_status']==1)
						{
							echo "<br />". date("d-m-Y h:i:sa",strtotime($app[0]['date_status']));
							echo '<p style="color:green">Accepted</p>';
						}elseif($value['through_status']==2)
						{
							echo "<br />". date("d-m-Y h:i:sa",strtotime($app[0]['date_status']));
							echo '<p style="color:red">Rejected</p>';
						}else
						{
							echo '<p style="color:orange">Pending</p>';
						}
					}elseif($value['through_user']==4)
					{
						echo("<strong>Dean:</strong> ");
						if($value['through_status']==1)
						{
							echo "<br />". date("d-m-Y h:i:sa",strtotime($app[0]['date_status']));
							echo '<p style="color:green">Accepted</p>';
						}elseif($value['through_status']==2)
						{
							echo "<br />". date("d-m-Y h:i:sa",strtotime($app[0]['date_status']));
							echo '<p style="color:red">Rejected</p>';
						}else
						{
							echo '<p style="color:orange">Pending</p>';
						}
					}elseif($value['through_user']==5)
					{
						
						echo "<strong>Head of the ".$value['user_department_through']." Department:</strong> ";
						if($value['through_status']==1)
						{
							echo "<br />". date("d-m-Y h:i:sa",strtotime($app[0]['date_status']));
							echo '<p style="color:green">Accepted</p>';
						}elseif($value['through_status']==2)
						{
							echo "<br />". date("d-m-Y h:i:sa",strtotime($app[0]['date_status']));
							echo '<p style="color:red">Rejected</p>';
						}else
						{
							echo '<p style="color:orange">Pending</p>';
						}
					}
				}
				
				//For TO
				
					if($app[0]['user_type_to']==2)
					{
						echo "<strong>Vice Chancellor:</strong> ";
						if($app[0]['app_status']==1)
						{
							echo "<br />". date("d-m-Y h:i:sa",strtotime($app[0]['date_status']));
							echo '<p style="color:green">Accepted</p>';
						}elseif($app[0]['app_status']==2)
						{
							echo "<br />". date("d-m-Y h:i:sa",strtotime($app[0]['date_status']));
							echo '<p style="color:red">Rejected</p>';
						}else
						{
							
							echo '<p style="color:orange">Pending</p>';
						}
					}elseif($app[0]['user_type_to']==3)
					{
						echo("<strong>Register:</strong> ");
						if($app[0]['app_status']==1)
						{
							echo "<br />". date("d-m-Y h:i:sa",strtotime($app[0]['date_status']));
							echo '<p style="color:green">Accepted</p>';
						}elseif($app[0]['app_status']==2)
						{
							echo "<br />". date("d-m-Y h:i:sa",strtotime($app[0]['date_status']));
							echo '<p style="color:red">Rejected</p>';
						}else
						{
							echo '<p style="color:orange">Pending</p>';
						}
					}elseif($app[0]['user_type_to']==4)
					{
						echo("<strong>Dean:</strong> ");
						if($app[0]['app_status']==1)
						{
							echo "<br />". date("d-m-Y h:i:sa",strtotime($app[0]['date_status']));
							echo '<p style="color:green">Accepted</p>';
						}elseif($app[0]['app_status']==2)
						{
							echo "<br />". date("d-m-Y h:i:sa",strtotime($app[0]['date_status']));
							echo '<p style="color:red">Rejected</p>';
						}else
						{
							echo '<p style="color:orange">Pending</p>';
						}
					}elseif($app[0]['user_type_to']==5)
					{
						echo "<strong>Head of the ".$app[0]['user_department_through']." Department: </strong>";
						if($app[0]['app_status']==1)
						{
							echo "<br />". date("d-m-Y h:i:sa",strtotime($app[0]['date_status']));
							echo '<p style="color:green">Accepted</p>';
						}elseif($app[0]['app_status']==2)
						{
							echo "<br />". date("d-m-Y h:i:sa",strtotime($app[0]['date_status']));										echo '<p style="color:red">Rejected</p>';
						}else
						{
							echo '<p style="color:orange">Pending</p>';
						}
					}
				
				?>
				</div>
				
			</div>
		</div>
	</div>
</div>
<?php if(!empty($this->session->userdata('success_msg')) || !empty($this->session->userdata('reject_msg')))
	{ ?>
<div class="show_msg">
	<?php 
		echo($this->session->userdata('success_msg'));
		$this->session->unset_userdata('success_msg');
		echo '<p style="color:red">'.$this->session->userdata('reject_msg').'</p>';
		$this->session->unset_userdata('reject_msg');
	
	?>
</div>
<?php } ?>
<?php if($this->session->userdata('user_type')>1 && $this->session->userdata('user_type')<7)
	
	{ ?>
	<hr />
<div class="comment_section">
	<?php
		if (is_array($comment))
		{
	 foreach($comment as $com)
	{ ?>
	<div class="user_comment_head">
		<p style="font-weight: bold"><?php echo $com['designation'];?></p>
		<p style="margin-top:-10px;font-size:10px;font-weight: bold"><?php echo date("d-m-Y h:i:sa",strtotime($com['date']));?></p>
	</div>
	
	<div style="margin-bottom: 30px" class="user_comment_body">
		<p><?php echo $com['comment'];?></p>
	</div>
	<?php } } ?>
	<form method="POST" action="<?php echo base_url()?>homepage/do_comment">
		Comment:<br />
		<textarea name="comment" rows="5" cols="50"></textarea><br />
		<input type="text" name="app_id" value="<?php echo $app[0]['app_id'] ?> " hidden/>
		
		<button class="btn btn-primary">Post Comment</button>
	</form>
	
</div>
<?php  }  ?>

</div>