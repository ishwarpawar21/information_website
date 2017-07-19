

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
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active"><?=$video?></li>
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
   
				<div class="col-md-6" style="margin-top: 10px">
				<div class="panel panel-primary">
					<div class="panel-heading"><?=$web_video_title?></div>
					<div class="panel-body">
						
						
						<form  class="form-horizontal"  method="POST"  >
								<div class="form-group">
									<label class="col-md-5 control-label" for="website_logo"><?=$youtube_video_link?></label>
									<div class="col-md-7">
										<input id="video_url" name="video_url" type="url" placeholder="<?=$youtube_video_link_p?>" class="form-control" >
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-5 control-label" for="name"></label>
									<div class="col-md-7">
										<input type="submit" name="btn_submit_link" value="<?=$btn_upload?>" class="btn btn-primary" />
									</div>
								</div>
											
								
						</form>
								
								<div class="form-group">
									<label class="col-md-12 control-label" style="text-align: center">Or</label> 
								</div>
								
								
								
						<form  class="form-horizontal"  method="POST" enctype="multipart/form-data" >
								<div class="form-group">
									<label class="col-md-5 control-label" for="name"><?=$select_video?>
									<br/>
<small style="color: #ff0000;font-weight:normal">
<?=$select_video_note?>

</small>									
									</label>
									<div class="col-md-7">
 										<input type="file" id="video_file" name="userfile" class="form-control" />
									</div>
								</div>
    
    							<div class="form-group">
									<label class="col-md-5 control-label" for="name"></label>
									<div class="col-md-7">
										<input type="submit" name="btn_submit_video" value="<?=$btn_upload?>"  />
									</div>
								</div>
</form>
					 
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
			
 	