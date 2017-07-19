<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?=$page_header?></title>

<link href="<?=base_url()?>assets/dashboard/css/bootstrap.min.css" rel="stylesheet">
<link href="<?=base_url()?>assets/dashboard/css/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet"/>
<link href="<?=base_url()?>assets/dashboard/css/datepicker3.css" rel="stylesheet">
<link href="<?=base_url()?>assets/dashboard/css/bootstrap-table.css" rel="stylesheet">
<link href="<?=base_url()?>assets/dashboard/css/styles.css" rel="stylesheet">


<!-- ********************** to add 	ckeditor ----------------------->
<link href="<?=base_url()?>assets/dashboard/ckeditor/css/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

<!-- ********************** // to add ckeditor ----------------------->

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span><?=$Website_name?></span>Admin</a>
				<a href="<?=current_url()?>?ln=en">English</a>
                <a href="<?=current_url()?>?ln=du">Dutch</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> User <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="<?=base_url()?>dashboard/account_details/"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
							<li><a href="<?=base_url()?>dashboard/account_settings/"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
							<li><a href="<?=base_url()?>dashboard/logout/"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
	
		
	
