       
 <style>
.btn-circle {
  width: 30px;
  height: 30px;
  padding: 6px 0;
  border-radius: 15px;
  text-align: center;
  font-size: 12px;
  line-height: 1.428571429;
}

 </style> 
    
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active"><?=$appointment?></li>
			</ol>
		</div><!--/.row-->
		 
<div class="row" style="margin-top: 10px">		
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
?>
 		</div>
			
			
			<div class="col-md-6">
				<div class="panel panel-primary">
					<div class="panel-heading">
						Show/Hide Scheduling	
					</div>
						
					<div class="panel-body">
							<form class="form-horizontal" method="POST" >
								<div class="form-group">
									<div class="col-md-4">
										<label><?=$shedule_s?></label>
									</div>
<?php
	$res=$this->db->query("select display_schedule as ds from tbl_website_settings where id='1'")->row();
?>									
									<div class="col-md-4">
										<input type="radio" name="display_stat" value="Yes" <?php if($res->ds=='Yes'){ echo 'checked=""'; } ?> /> <label><?=$show?></label>
									</div>
									<div class="col-md-4">
										<input type="radio" name="display_stat" value="No" <?php if($res->ds=='No'){ echo 'checked=""'; } ?> /> <label><?=$hide?></label>
									</div>
								</div>
								 <div class="form-group">
									<label class="col-md-4 control-label" for="name"></label>
									<div class="col-md-8">
												 <button type="submit" name="btn_change_stat" class="btn btn-primary"><i class="glyphicon glyphicon-ok-sign white"></i> <?=$update?></button>
												</div>
									</div>
							</form>
					</div>
				</div>
			</div>
			
			
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<?=$shedule_t2?>
						
<div style="float: right">
		<a href="<?=base_url()?>dashboard/schedules?pg=<?=base64_encode('schedule-create')?>" style="text-decoration: none">
			<button type="button" class="btn btn-success btn-circle">
				<i class="glyphicon glyphicon-plus" style="margin-left:8px"></i>           
			</button>	
			<span style="color: #ccc;"><?=$shedule_add_new?></span>
		</a>
		
		
		<a href="<?=base_url()?>dashboard/schedules?pg=<?=base64_encode('schedule-manage1')?>" style="text-decoration: none">
			<button type="button" class="btn btn-info btn-circle">
				<i class="glyphicon glyphicon-asterisk" style="margin-left:8px"></i>           
			</button>	
			<span style="color: #ccc;"><?=$shedule_mng?></span>
		</a>
		
</div>
				
				</div>
				 					
					<div class="panel-body">
						 <iframe src="<?=base_url()?>dashboard/calender_display" frameborder="no" width="100%" height="800" scrolling="no"></iframe>
					</div>
				</div>
			</div>
		</div><!--/.row-->	
	 </div><!--/.main-->

 