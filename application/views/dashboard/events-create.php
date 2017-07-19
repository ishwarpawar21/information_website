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
				<li class="active"><a href="<?=base_url()?>dashboard/blogs"><?=$event?></a></li>
				<li class="active"><?=$event_create?></li>
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

?>				  
							 	<form class="form-horizontal" method="POST" enctype="multipart/form-data">
							 	
							 		<div class="panel panel-primary" style="margin-top: 10px;">
										<div class="panel-heading">
											<?=$event_create?>
										</div>
										<div class="panel-body">
											<div class="form-group">
												<label class="col-md-3 control-label" for="title"><?=$event_title?></label>
												<div class="col-md-6">
												<input id="title" name="title" type="text" placeholder="<?=$event_title_p?>" class="form-control" value="<?=set_value('title')?>"/  >
												<?php echo '<span class="errorss">'.form_error('title').'</span>';?>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="blog_date"><?=$event_date?></label>
												<div class="col-md-6">
													<div class="col-md-4">
													<select name="dd" id="dd" class="form-control" >
														<option value>DD</option>
													<?php for($i=1;$i<32;$i++) { ?>
														<option <?php if(set_value('dd')==$i)  {echo "selected";} ?> value="<?=$i?>"><?=$i?></option>														
													<?php } ?>
													</select>
													</div>
													<div class="col-md-4">
													<select name="mm" id="mm" class="form-control" >
														<option value>mm</option>
													<?php for($i=1;$i<13;$i++) { ?>
														<option <?php if(set_value('mm')==$i)  {echo "selected";}?>  value="<?=$i?>"><?=$i?></option>														
													<?php } ?>
													</select>
													</div>
													<div class="col-md-4">
													
													<select name="yyyy" id="yyyy" class="form-control">
														<option value>yyyy</option>
													<?php for($i=2015;$i<2020;$i++) { ?>
														<option <?php if(set_value('yyyy')==$i)  {echo "selected";}?> value="<?=$i?>"><?=$i?></option>														
													<?php } ?>
													</select>
													</div>
													
													<?php echo '<span class="errorss">'.form_error('dd').'</span>';?>
													<?php echo '<span class="errorss">'.form_error('mm').'</span>';?>
													<?php echo '<span class="errorss">'.form_error('yyyy').'</span>';?>
												 </div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="location"><?=$event_location?></label>
												<div class="col-md-6">
												<input id="location" name="location" type="text" placeholder="<?=$event_location_p?>" class="form-control" value="<?=set_value('location')?>"/  >
												<?php echo '<span class="errorss">'.form_error('location').'</span>';?>
												</div>
											</div>
											
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="location"><?=$event_day?></label>
												<div class="col-md-6">
												
												<select name="day" id="day" class="form-control" >
													<option value>Event Day</option>
													<option <?php if(set_value('day')=='Monday')  {echo "selected";}?> value="Monday"> Monday</option>
													<option <?php if(set_value('day')=='Tuesday')  {echo "selected";}?> value="Tuesday">Tuesday</option>
													<option <?php if(set_value('day')=='Wednesday')  {echo "selected";}?> value="Wednesday">Wednesday</option>
													<option <?php if(set_value('day')=='Thirsday')  {echo "selected";}?> value="Thirsday">Thirsday</option>
													<option <?php if(set_value('day')=='Friday')  {echo "selected";}?> value="Friday">Friday</option>
													<option <?php if(set_value('day')=='Saturday')  {echo "selected";}?> value="Saturday">Saturday</option>
													<option <?php if(set_value('day')=='Sunday')  {echo "selected";}?> value="Sunday">Sunday</option>
												</select>
												<?php echo '<span class="errorss">'.form_error('day').'</span>';?>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="tyme"><?=$event_time?></label>
												<div class="col-md-6">
												<input id="tyme" name="tyme" type="time" placeholder="Events Time" class="form-control" value="<?=set_value('tyme')?>"/  >
												<?php echo '<span class="errorss">'.form_error('tyme').'</span>';?>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="title"><?=$event_address?></label>
												<div class="col-md-6">
												<textarea name="address" placeholder="<?=$event_address_p?>" id="address" class="form-control"><?=set_value('address')?></textarea>
												<?php echo '<span class="errorss">'.form_error('address').'</span>';?>
												</div>
											</div>
											 
											<div class="form-group">
												<label class="col-md-3 control-label" for="short_description"><?=$event_dis?></label>
												<div class="col-md-6">
													<textarea name="short_description" placeholder="<?=$event_dis_p?>" id="short_description" class="form-control"><?=set_value('short_description')?></textarea>
													<?php echo '<span class="errorss">'.form_error('short_description').'</span>';?>
												</div>
											</div>
											
											
											
										  
										 	  
											<div class="form-group">
												<label class="col-md-3 control-label" for="description"><?=$event_content?></label>
												<div class="col-md-9">
													<textarea id="editor1"  name="description" required="" placeholder="<?=$event_content_p?>" ></textarea>
													<?php echo '<span class="errorss">'.form_error('description').'</span>';?>
												</div>
											</div>
											 <div class="form-group">
												<label class="col-md-3 control-label" for="name"></label>
												<div class="col-md-9">
												 <button type="submit" name="btn_create_events" class="btn btn-primary"><i class="glyphicon glyphicon-ok-sign white"></i><?=$create?></button>
												</div>
											</div>
										 </div>
									</div>
			 					</form>
 								  
			</div><!-- /.col-->
		
		</div><!-- /.row -->
		
	</div><!--/.main-->
