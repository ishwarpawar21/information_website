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
				<li class="active">Website Settings</li>
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
							 	 
<?php
$rs=$this->db->query("select * from tbl_website_settings where id='1'")->row();
if($rs)
{
?>				
 				<div class="col-md-6" style="margin-top: 10px">
				<div class="panel panel-primary">
					<div class="panel-heading"><?=$web_logo_title?></div>
					<div class="panel-body">
						
						<form class="form-horizontal" method="POST" enctype="multipart/form-data">
								<div class="form-group">
									<label class="col-md-5 control-label" for="website_logo"><?=$choose_logo?></label>
									<div class="col-md-7">
										<input id="website_logo" name="website_logo" type="file" placeholder="Phone No" class="form-control">
									</div>
								</div>
											
								<div class="form-group">
									<label class="col-md-5 control-label" for="name"><?=$uploaded_logo?> </label>
									<div class="col-md-7">
<?php
	$img_path=FCPATH.'assets/dashboard/uploads/'.$rs->logo;
	if(file_exists($img_path))
	{
?>
		<img src="<?=base_url()?>assets/dashboard/uploads/<?=$rs->logo?>?<?=time()?>" width="100" height="100">
<?php		
	}
	else
	{
?>												
		<img src="<?=base_url()?>assets/dashboard/uploads/no_img.jpg?<?=time()?>" width="100" height="100">
<?php
	}
?>												
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-5 control-label" for="name"></label>
												<div class="col-md-7">
												<button type="submit" name="btn_update_logo" class="btn btn-primary">
													<i class="glyphicon glyphicon-picture"></i> 
													Upload
												</button>
												
												
												</div>
											</div>
											
						</form>
						<hr/>
						<form class="form-horizontal" method="POST" >
						
						<div class="form-group">
									<label class="col-md-4 control-label" for="logo_position"><?=$current_pos?></label>
									<div class="col-md-8">
									  <div class="radio">
										<label style="text-transform: uppercase"> 
										<?php
											$res=$this->db->query("select * from  tbl_website_settings WHERE id='1' ")->row();
											if($res)
											{
												echo $res->logo_position;
											}
										?> 
										</label>
									  </div>
									</div>
							</div>
						
							<div class="form-group">
									<label class="col-md-4 control-label" for="logo_position"><?$logo_posstion?></label>
									<div class="col-md-8">
									  <div class="radio">
											<label>
												<input id="logo_position" name="logo_position" type="radio"  value="left" > <?=$postion_left?>
											</label>
										
											<label style="margin-left: 50px">
												<input id="logo_position" name="logo_position" type="radio"  value="right"> <?=$postion_right?>
											</label>
										</div>
									</div>
							</div>
							
							<div class="form-group">
									<label class="col-md-4 control-label" for="name"></label>
									<div class="col-md-8">
										<button type="submit" name="btn_update_logo_position" class="btn btn-primary">
											<i class="glyphicon glyphicon-ok-sign"></i> 
													<?=$btn_set?>
										</button>
									</div>
							</div>
							
							
						</form>
					</div>
				</div>
			</div>
			
			
			<div class="col-md-6" style="margin-top: 10px">
				<div class="panel panel-primary">
					<div class="panel-heading"><?=$web_d_title?></div>
					<div class="panel-body">
						
						<form class="form-horizontal" method="POST">
						
											<div class="form-group">
												<label class="col-md-5 control-label" for="website_title"><?=$web_title?></label>
												<div class="col-md-7">
												<input id="website_title" name="website_title" type="text" placeholder="<?=$web_title_p?>" class="form-control" value="<?=$rs->website_title?>" >
												<?php echo '<span>'.form_error('website_title').'</span>';?>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-5 control-label" for="keywords"><?=$meta_key?></label>
												<div class="col-md-7">
												<input id="keywords" name="keywords" type="text" placeholder="<?=$meta_key_p?>" class="form-control" value="<?=$rs->keywords?>" >
												<?php echo '<span>'.form_error('keywords').'</span>';?>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-5 control-label" for="description"><?=$web_discription?></label>
												<div class="col-md-7">
												<textarea id="description" name="description" placeholder="<?=$web_discription_p?>" class="form-control" style="height: 210px"><?=$rs->description?></textarea>
												<?php echo '<span>'.form_error('description').'</span>';?>
												</div>
											</div>
											 
											 
											
											<div class="form-group">
												<label class="col-md-5 control-label" for="name"></label>
												<div class="col-md-7">
												<button type="submit" name="btn_update_details" class="btn btn-primary">
													<i class="glyphicon glyphicon-ok-sign"></i> 
													<?=$btn_upload?> 
												</button>
												
												
												</div>
											</div>
											
						</form>
					</div>
				</div>
			</div>
			
			<div class="col-md-6" style="margin-top: 10px">
				<div class="panel panel-primary">
					<div class="panel-heading"><?=$web_soicial_title?></div>
					<div class="panel-body">
						
						<form class="form-horizontal" method="POST">
						
											<div class="form-group">
												<label class="col-md-3 control-label" for="facebook"><?=$facebook?></label>
												<div class="col-md-9">
												<input id="facebook" name="facebook" type="url" placeholder="<?=$facebook_p?>" class="form-control" value="<?=$rs->facebook?>" >
												<?php echo '<span>'.form_error('facebook').'</span>';?>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="twitter"><?=$twitter?></label>
												<div class="col-md-9">
												<input id="twitter" name="twitter" type="url" placeholder="<?=$twitter_p?>" class="form-control" value="<?=$rs->twitter?>" >
												<?php echo '<span>'.form_error('twitter').'</span>';?>
												</div>
											</div>
											
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="google_plus"><?=$google?></label>
												<div class="col-md-9">
												<input id="google_plus" name="google_plus" type="url" placeholder="<?=$google_p?>" class="form-control" value="<?=$rs->google_plus?>" >
												<?php echo '<span>'.form_error('google_plus').'</span>';?>
												</div>
											</div>
											
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="youtube"><?=$youetube?></label>
												<div class="col-md-9">
												<input id="youtube" name="youtube" type="url" placeholder="<?=$youetube_p?>" class="form-control" value="<?=$rs->youtube?>" >
												<?php echo '<span>'.form_error('youtube').'</span>';?>
												</div>
											</div>
											
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="twitter"><?=$linkedin?></label>
												<div class="col-md-9">
												<input id="linkedin" name="linkedin" type="url" placeholder="<?=$linkedin_p?>" class="form-control" value="<?=$rs->linkedin?>" >
												<?php echo '<span>'.form_error('linkedin').'</span>';?>
												</div>
											</div>
											
											 
											 
											 
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="name"></label>
												<div class="col-md-9">
												<button type="submit" name="btn_update_social_link" class="btn btn-primary">
													<i class="glyphicon glyphicon-ok"></i> 
													<?=$btn_upload?>
												</button>
												
												
												</div>
											</div>
											
						</form>
					</div>
				</div>
			</div>
			
			
			<div class="col-md-6" style="margin-top: 10px">
				<div class="panel panel-primary">
					<div class="panel-heading"><?=$web_email_title?></div>
					<div class="panel-body">
						
						<form class="form-horizontal" method="POST">
						
											<div class="form-group">
												<label class="col-md-4 control-label" for="for_contact_page"><?=$contact_enq?></label>
												<div class="col-md-8">
												<input id="for_contact_page" name="for_contact_page" type="email" placeholder="<?=$contact_enq_p?>" class="form-control" value="<?=$rs->for_contact_page?>" >
												<?php echo '<span>'.form_error('for_contact_page').'</span>';?>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-4 control-label" for="for_newsletter_page"><?=$contact_new?></label>
												<div class="col-md-8">
												<input id="for_newsletter_page" name="for_newsletter_page" type="email" placeholder="<?=$contact_new_p?>" class="form-control" value="<?=$rs->for_newsletter_page?>" >
												<?php echo '<span>'.form_error('for_newsletter_page').'</span>';?>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-4 control-label" for="for_support"><?=$contact_support?></label>
												<div class="col-md-8">
												<input id="for_support" name="for_support" type="email" placeholder="<?=$contact_support_p?>" class="form-control" value="<?=$rs->for_support?>" >
												<?php echo '<span>'.form_error('for_support').'</span>';?>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="name"></label>
												<div class="col-md-9">
												<button type="submit" name="btn_update_emails" class="btn btn-primary">
													<i class="glyphicon glyphicon-ok"></i> 
													<?=$btn_upload?>
												</button>
												
												
												</div>
											</div>
											
						</form>
					</div>
				</div>
			</div>
			
			
			 
<?php
}
?>			
							  
			</div><!-- /.col-->
		</div><!-- /.row -->
		
	</div><!--/.main-->
