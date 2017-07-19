<style>
span p 
{
	color:red;
	font-size: 12px;
}
</style>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="<?=base_url()?>dashboard"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active"><?=$contact_details?></li>
			</ol>
		</div><!--/.row-->
		
		 	
		
		<div class="row">
			<div class="col-lg-12">
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

$result=$this->db->query("select * from tbl_contact_details WHERE id = '1'")->row();
	if($result)
	{
?>				  
							 	<form class="form-horizontal" method="POST" >
							 	
							 		<div class="panel panel-primary" style="margin-top: 10px;">
										<div class="panel-heading">
											<?=$contact_edit_t?>
										</div>
										<div class="panel-body">
											<div class="form-group">
												<label class="col-md-3 control-label" for="name"><?=$c_email?></label>
												<div class="col-md-6">
												<input id="email_id" name="email_id" type="text" class="form-control" value="<?=$result->email_id?>">
												<?php echo '<span style="color:red">'.form_error('email_id').'</span>';?>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="name"><?=$c_phone?></label>
												<div class="col-md-6">
												<input id="phone_no" name="phone_no" type="text" class="form-control" value="<?=$result->phone_no?>">
												<?php echo '<span style="color:red">'.form_error('phone_no').'</span>';?>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="name"><?=$c_fax_no?></label>
												<div class="col-md-6">
												<input id="fax_no" name="fax_no" placeholder="" type="text" class="form-control" value="<?=$result->fax_no?>">
												<?php echo '<span style="color:red">'.form_error('fax_no').'</span>';?>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="name"><?=$c_address?></label>
												<div class="col-md-9">
												<textarea name="address" id="editor1" class="form-control" placeholder="<?=$c_address_p?>"><?=$result->address?></textarea>
												<?php echo '<span style="color:red">'.form_error('address').'</span>';?>
												</div>
											</div> 
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="name"></label>
												<div class="col-md-9">
												 <button type="submit" name="btn_update_contact" class="btn btn-primary"><i class="glyphicon glyphicon-new-window"></i> <?=$update?></button>
												 
												<a href="<?=base_url()?>dashboard/" style="text-decoration: none;color: white"> <button type="button" name="btn_update_contact" class="btn"><i class="glyphicon glyphicon-chevron-left"></i> <?=$back?></button></a>
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
