<!DOCTYPE html>
<html>
	
	<head>
		<meta charset="utf-8">
		<title>Workflow Management System</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<link href="css/font-awesome.min.css" rel="stylesheet" />
		<link type='text/css' rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">
		<link type='text/css' rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-theme.min.css">
		
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap-select.min.css">
		<link type='text/css' rel="stylesheet" href="<?php echo base_url(); ?>style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		
		<!--[if lt IE 9]>
			<script src="bower_components/html5shiv/dist/html5shiv.js"></script>
		<![endif]-->
	</head>
	
	<body>
		<div class="container main">
			<div class="row">
				<div class="col-md-12 header" style="">
					<div class="logo">
						<a href="<?php echo base_url();?>/homepage"><img src="<?php echo base_url(); ?>images/logo.png" alt=""></a>
					</div>
					
				</div>
			</div>
			<div class="row main_container2">
				<?php 
					if(isset($sidebar))
					{ 
						echo $sidebar;
					}
					if(isset($content))
					{
						echo $content;
					}
					
				?>
			</div>
			<div class="row">
				<div class="col-md-12 footer">
					<p>©Daffodil International University. All right reserved.</p>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap-select.min.js"></script>
		<script>
			function showDiv() {
				document.getElementById('p').style.display = "block";
			}
			function showEditProfile() {
				document.getElementById('editable_table').style.display = "block";
				document.getElementById('save_button').style.display = "block";
				document.getElementById('table').style.display = "none";
				document.getElementById('button').style.display = "none";
			}
			$(function() {
				$("#msg,.show_msg").fadeOut(5000);
				
			});
			
			$(function () {
        $("#btnClone").bind("click", function () {
 
            var index = $("#container select").length + 1;
 
            //Clone the DropDownList
            var ddl = $("#ddlFruits").clone();
 
            //Set the ID and Name
            ddl.attr("id", "ddlFruits_" + index);
            ddl.attr("name", "through[]");
 
            //[OPTIONAL] Copy the selected value
            var selectedValue = $("#ddlFruits option:selected").val();
            ddl.find("option[value = '" + selectedValue + "']").attr("selected", "selected");
 
            //Append to the DIV.
            $("#container").append(ddl);
            $("#container").append("<br />");
        });
    });
		</script>
	</body>
	
</html>