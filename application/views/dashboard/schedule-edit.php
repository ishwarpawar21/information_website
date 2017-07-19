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
				<li class="active"><?=$shedule_edit?></li>
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
	$rec= $this->db->query("select * from  tbl_schedule where id='".base64_decode($_GET['id'])."' ")->row();
	
	if($rec)
	{
?>
		
<input type="hidden" value="<?=$_GET['id']?>" name="id" />
							 	
							 		<div class="panel panel-primary" style="margin-top: 10px;">
										<div class="panel-heading">
											<?=$shedule_edit?>
										</div>
										<div class="panel-body">
											<div class="form-group">
												<label class="col-md-3 control-label" for="title"><?=$shedule_title?></label>
												<div class="col-md-9">
													<input id="title" name="title" type="text" placeholder="<?=$shedule_title_p?>" class="form-control" value="<?=$rec->title?>"/  >
													<?php echo '<span class="errorss">'.form_error('title').'</span>';?>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="start_date"><?=$shedule_sdate?></label>
												<div class="col-md-9">
												<input id="start_date" name="start_date" type="date" placeholder="Schedule From" class="form-control" value="<?=$rec->start_date?>"/  >
												<?php echo '<span class="errorss">'.form_error('start_date').'</span>';?>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="end_date"><?=$shedule_edate?></label>
												<div class="col-md-9">
												<input id="end_date" name="end_date" type="date" placeholder="Schedule To" class="form-control" value="<?=$rec->end_date?>"/  >
												<?php echo '<span class="errorss">'.form_error('end_date').'</span>';?>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="start_time"><?=$shedule_stime?></label>
												<div class="col-md-9">
												<input id="start_time" name="start_time" type="time" class="form-control" value="<?=$rec->start_time?>"/  >
												<?php echo '<span class="errorss">'.form_error('start_time').'</span>';?>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="end_time"><?=$shedule_etime?></label>
												<div class="col-md-9">
												<input id="end_time" name="end_time" type="time" placeholder="Schedule To" class="form-control" value="<?=$rec->end_time?>"/  >
												<?php echo '<span class="errorss">'.form_error('end_time').'</span>';?>
												</div>
											</div>
											
											 <div class="form-group">
												<label class="col-md-3 control-label" for="bg_colors"><?=$shedule_ev_color?></label>
												<div class="col-md-9">
													<input id="bg_colors" name="bg_colors" type="text" class="form-control my-colorpicker1"  value="<?=$rec->bg_colors?>" >
													<?php echo '<span class="errorss">'.form_error('bg_colors').'</span>'; ?>
												</div>
											</div>
											
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="allday"><?=$shedule_all_day_e?> </label>
												<div class="col-md-9">
													<select name="allday" class="form-control">
														<option value>Event Type</option>
														<option value="true" <?php if($rec->allday=='true') { echo 'selected'; } ?>><?=$Yes?></option>
														<option value="false" <?php if($rec->allday=='false') { echo 'selected'; } ?> ><?=$no?></option>
														
													</select>
													<?php echo '<span class="errorss">'.form_error('allday').'</span>';?>
												</div>
											</div>
											
												<div class="form-group">
												<label class="col-md-3 control-label" for="is_available"><?=$shedule_available?> </label>
												<div class="col-md-9">
													<select name="is_available" class="form-control">
														<option value><?=$is_available?></option>
														<option value="1" <?php if($rec->is_available=='1') { echo 'selected'; } ?> ><?=$yes?></option>
														<option value="0" <?php if($rec->is_available=='0') { echo 'selected'; } ?> ><?=$no?></option>
													</select>
													<?php echo '<span class="errorss">'.form_error('is_available').'</span>';?>
												</div>
											</div>
											  
											 <div class="form-group">
												<label class="col-md-3 control-label" for="name"></label>
												<div class="col-md-9">
												 <button type="submit" name="btn_update_schedule" class="btn btn-primary"><i class="glyphicon glyphicon-ok-sign white"></i> <?=$update?></button>
												</div>
											</div>
										 </div>
									</div>
<?php		
	}
	
?>							 										
			 					</form>
 								  
			</div><!-- /.col-->
		
		</div><!-- /.row -->
		
	</div><!--/.main-->