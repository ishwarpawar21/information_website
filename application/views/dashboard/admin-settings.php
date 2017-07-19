<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="<?=base_url()?>dashboard"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Account Settings</li>
			</ol>
		</div><!--/.row-->
		 
		<div class="row">
			<div class="col-lg-6">
<?php
if($this->session->userdata('error_msg'))
{
?>
			<div class="alert bg-<?=$this->session->userdata('error_cls')?>" role="alert" style="margin-top: 10px">
				<span class="glyphicon glyphicon-check"></span> 
				<?=$this->session->userdata('error_msg')?>					
			</div>
<?php	
		$this->session->unset_userdata('error_msg');
		$this->session->unset_userdata('error_cls');
}			

$result=$this->db->query("select * from tbl_admin WHERE username = '".$this->session->userdata('Ausername')."'")->row();
	if($result)
	{
?>				  
							 	<form class="form-horizontal" method="POST" >
							 	
							 		<div class="panel panel-primary" style="margin-top: 10px;">
										<div class="panel-heading">
											Change Account Password
										</div>
										<div class="panel-body">
											<div class="form-group">
												<label class="col-md-3 control-label" for="name">Old Password</label>
												<div class="col-md-9">
												<input id="password" name="password" type="password" placeholder="Old Password" class="form-control">
												<?php echo '<span style="color:red">'.form_error('password').'</span>';?>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="name">New Password</label>
												<div class="col-md-9">
												<input id="Npassword" name="Npassword" type="password" placeholder="New Password" class="form-control"  >
													<?php echo '<span style="color:red">'.form_error('Npassword').'</span>';?>
												</div>
											</div>
											 <div class="form-group">
												<label class="col-md-3 control-label" for="name">Confirm Password</label>
												<div class="col-md-9">
												<input id="Cpassword" name="Cpassword" type="password" placeholder="Confirm Password" class="form-control"  >
												<?php echo '<span style="color:red">'.form_error('Cpassword').'</span>';?>
												</div>
											</div>
											 <div class="form-group">
												<label class="col-md-3 control-label" for="name"></label>
												<div class="col-md-9">
												<input type="submit" name="btn_password" class="btn btn-primary" value="Save Password">
												</div>
											</div>
										 </div>
									</div>
			 					</form>
<?php
	}
?>								  
			</div><!-- /.col-->
		</div><!-- /.row -->
		
	</div><!--/.main-->
