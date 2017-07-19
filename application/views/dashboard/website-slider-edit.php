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
				<li class="active">Website Slider</li>
				<li class="active">Manage Slider</li>
				<li class="active">Edit Slide</li>
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

$result=$this->db->query("select * from tbl_website_slider WHERE id = '".base64_decode($_GET['id'])."'")->row();
	if($result)
	{
?>				  
							 	<form class="form-horizontal" method="POST" >
							 	<input id="id" name="id" type="hidden" value="<?=$_GET['id']?>">
							 	
							 		<div class="panel panel-primary" style="margin-top: 10px;">
										<div class="panel-heading">
											<?=$web_s_title?>
										</div>
										<div class="panel-body">
											<div class="form-group">
												<label class="col-md-3 control-label" for="name"><?=$web_s_heading?></label>
												<div class="col-md-6">
												<input id="headings" name="headings" type="text" placeholder="<?=$web_s_heading_p?>" class="form-control" value="<?=$result->headings?>">
												<?php echo '<span style="color:red">'.form_error('headings').'</span>';?>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="name"><?=$web_s_discription?></label>
												<div class="col-md-6">
													<textarea id="descriptions" name="descriptions" type="text" placeholder="<?=$web_s_discription_p?>" class="form-control"><?=$result->descriptions?></textarea>
													<?php echo '<span style="color:red">'.form_error('descriptions').'</span>';?>
												</div>
											</div>
											 
											 
											 <div class="form-group">
												<label class="col-md-3 control-label" for="name"></label>
												<div class="col-md-9">
												<input type="submit" name="btn_edit_slide" class="btn btn-primary" value="<?=$update?>">
												</div>
											</div>
										 </div>
									</div>
									<input type="hidden" name="id" value="<?=base64_encode($result->id)?>" />
			 					</form>
<?php
	}
?>								  
			</div><!-- /.col-->
		</div><!-- /.row -->
		
	</div><!--/.main-->
