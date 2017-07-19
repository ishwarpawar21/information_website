<?php
/*
$res=$this->db->query("select count(id) as cnt from tbl_website_pages")->row();
	$count=$res->cnt; 
	if($count>=6)
	{	
		$this->session->set_userdata('error_cls','danger');
		$this->session->set_userdata('error_msg','You already created maximum number of pages');
		
		redirect(base_url().'dashboard/website_pages');
	}
	*/
?>

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
				<li class="active"><?=$web_pages?></li>
				<li class="active"><?=$create_page?></li>
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
							 	<form class="form-horizontal" method="POST" >
							 	
							 		<div class="panel panel-primary" style="margin-top: 10px;">
										<div class="panel-heading">
											<?=$create_page?>
										</div>
										<div class="panel-body">
											<div class="form-group">
												<label class="col-md-3 control-label" for="name">	<?=$page_menu_name?></label>
												<div class="col-md-6">
												<input id="menu_name" name="menu_name" type="text" placeholder="	<?=$page_menu_name_p?>" class="form-control">
												<?php echo '<span style="color:red">'.form_error('menu_name').'</span>';?>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="name">	<?=$page_title?></label>
												<div class="col-md-6">
												<input id="page_title" name="page_title" type="text" placeholder="<?=$page_title_p?>" class="form-control">
												<?php echo '<span style="color:red">'.form_error('page_title').'</span>';?>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-3 control-label" for="name">	<?=$page_pos?></label>
												<div class="col-md-3">
												<select class="form-control" name="page_position" id="page_position">
													<option value>	<?=$page_pos_p?></option>
													<option value="1">Header</option>
													<option value="2">Footer</option>
												</select>
												
												<?php echo '<span style="color:red">'.form_error('page_position').'</span>';?>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-3 control-label" for="name">	<?=$page_content?></label>
												<div class="col-md-9">
												<textarea id="editor1"  name="page_content" required="" placeholder="	<?=$page_content_p?>"></textarea>
												<?php echo '<span style="color:red">'.form_error('page_content').'</span>';?>
												</div>
											</div>
											 <div class="form-group">
												<label class="col-md-3 control-label" for="name"></label>
												<div class="col-md-9">
												 <button type="submit" name="btn_create_page" class="btn btn-primary"><i class="glyphicon glyphicon-ok-sign white"></i> <?=$create?></button>
												</div>
											</div>
										 </div>
									</div>
			 					</form>
 								  
			</div><!-- /.col-->
		</div><!-- /.row -->
		
	</div><!--/.main-->
