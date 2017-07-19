<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?=$page_header?></title>
<link href="<?=base_url()?>assets/dashboard/css/bootstrap.min.css" rel="stylesheet">
<link href="<?=base_url()?>assets/dashboard/css/styles.css" rel="stylesheet">
<style>
	span p
	{
		color: red;
		font-size: 12px;
	}
</style>
</head>

<body>
	
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in To <?=$Website_name?> </div>
				<div class="panel-body">
					<form role="form" method="POST">
						<fieldset>
<?php
	if($this->session->userdata('error_msg'))
	{
		echo '<span style="color:red">'.$this->session->userdata('error_msg').'</span>';
		$this->session->unset_userdata('error_msg');
	}
?>						
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="username" type="text" autofocus="">
								<?php echo '<span>'.form_error('username').'</span>'; ?>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
								<?php echo '<span>'.form_error('password').'</span>'; ?>
							</div>
							 
							<input type="submit" name="btn_login" class="btn btn-primary" value="Login">
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	
		

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	 
</body>

</html>
