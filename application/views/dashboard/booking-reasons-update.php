<style>
	.errorss p
	{
		color: red;
		font-size: 12px;
	}
</style>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="<?=base_url()?>dashboard"><span class="glyphicon glyphicon-home"></span></a></li>
				<li><a href="<?=base_url()?>dashboard/schedules"><?=$appointment?></a></li>
				<li class="active"><?=$reason_up_t?></li>
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

?>				  
							 	<form class="form-horizontal" method="POST" enctype="multipart/form-data">
							 	<?php
	$rec= $this->db->query("select * from  tbl_booking_reasons where id='".base64_decode($_GET['id'])."' ")->row();
	
	if($rec)
	{
?>
	<input type="hidden" value="<?=$_GET['id']?>" name="id" />						 	
							 		<div class="panel panel-primary" style="margin-top: 10px;">
										<div class="panel-heading">
										
										
								     <?=$reason_up_t?>
										</div>
										<div class="panel-body">
											<div class="form-group">
												<label class="col-md-3 control-label" for="title"><?=$tbl_reason?></label>
												<div class="col-md-9">
													<input id="reason" name="reason" type="text" placeholder="<?=$reason_p?>" class="form-control" value="<?=$rec->reason?>"/  >
													<?php echo '<span class="errorss">'.form_error('reson').'</span>';?>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="start_date"><?=$tbl_message?></label>
												<div class="col-md-9">
												<input id="message" name="message" type="text" placeholder="<?=$message_p?>" class="form-control" value="<?=$rec->message?>"/  >
												<?php echo '<span class="errorss">'.form_error('message').'</span>';?>
												</div>
											</div>
											
											
											
											
											 <div class="form-group">
												<label class="col-md-3 control-label" for="name"></label>
												<div class="col-md-9">
												 <button type="submit" name="btn_update_resons" class="btn btn-primary"><i class="glyphicon glyphicon-ok-sign white"></i><?=$update?> </button>
												</div>
											</div>
										 </div>
									</div>
									<?php
									}?>
			 					</form>
 								  
			</div><!-- /.col-->
		
		</div><!-- /.row -->
		
	</div><!--/.main-->
