<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="<?=base_url()?>dashboard"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Account Details</li>
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
							 	<form class="form-horizontal" method="POST" enctype="multipart/form-data">
							 	
							 		<div class="panel panel-primary" style="margin-top: 10px;">
										<div class="panel-heading">
											Edit Account Details
										</div>
										<div class="panel-body">
											<div class="form-group">
												<label class="col-md-3 control-label" for="name">First Name</label>
												<div class="col-md-9">
												<input id="f_name" name="f_name" type="text" placeholder="First name" class="form-control" value="<?=$result->f_name?>">
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="name">Last Name</label>
												<div class="col-md-9">
												<input id="l_name" name="l_name" type="text" placeholder="Last name" class="form-control" value="<?=$result->l_name?>">
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="name">Address</label>
												<div class="col-md-9">
												<textarea name="address" class="form-control" placeholder="Address"><?=$result->address?></textarea>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="name">Phone No</label>
												<div class="col-md-9">
												<input id="phno" name="phno" type="text" placeholder="Phone No" class="form-control" value="<?=$result->phno?>">
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="name">Choose Profile Picture </label>
												<div class="col-md-9">
												<input id="profile_pic" name="profile_pic" type="file" placeholder="Phone No" class="form-control">
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="name">Uploaded Picture </label>
												<div class="col-md-9">
<?php
	$img_path=FCPATH.'assets/dashboard/uploads/account_pic.jpg';
	if(file_exists($img_path))
	{
?>
		<img src="<?=base_url()?>assets/dashboard/uploads/account_pic.jpg?<?=time()?>" width="100" height="100">
<?php		
	}
	else
	{
?>												
		<img src="<?=base_url()?>assets/dashboard/uploads/default.jpg?<?=time()?>" width="100" height="100">
<?php
	}
?>												
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="name"></label>
												<div class="col-md-9">
												<input type="submit" name="btn_update_account" class="btn btn-primary" value="Update Account">
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
