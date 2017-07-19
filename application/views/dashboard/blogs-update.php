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
				<li class="active"><a href="<?=base_url()?>dashboard/blogs"><?=$blog?></a></li>
				<li class="active"><?=$blog_update_t?></li>
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

$res=$this->db->query("select * from tbl_blogs where id='".base64_decode($_GET['id'])."'")->row();
if($res)
{

?>				  

							 	<form class="form-horizontal" method="POST" enctype="multipart/form-data">
							 		<input type="hidden" name="id" value="<?=$_GET['id']?>" />
							 		<div class="panel panel-primary" style="margin-top: 10px;">
										<div class="panel-heading">
											<?=$blog_update_t?> 
										</div>
										<div class="panel-body">
											<div class="form-group">
												<label class="col-md-3 control-label" for="title"><?=$blog_title?></label>
												<div class="col-md-6">
												<input id="title" name="title" type="text" placeholder="Blogs Title" class="form-control" value="<?=$res->title?>"/  >
												<?php echo '<span class="errorss">'.form_error('title').'</span>';?>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="blog_img"><?=$blog_img?> </label>
												<div class="col-md-6">
												<input id="blog_img" name="blog_img" type="file" class="form-control">
												<?php echo '<span class="errorss">'.form_error('blog_img').'</span>';?>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="blog_img"><?=$blog_img?>  </label>
												<div class="col-md-6">
<?php 
	$img_path=FCPATH."assets/dashboard/uploads/blogs/".$res->image_name;
	if(file_exists($img_path))
	{
?>												
	<img src="<?=base_url()?>assets/dashboard/uploads/blogs/<?=$res->image_name?>" width="200" height="100" />
<?php
	}
	else
	{
?>
	<img src="<?=base_url()?>assets/dashboard/uploads/no_img.jpg" width="200" height="100" />
<?php		
	}
?>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="short_description"><?=$blog_dis?></label>
												<div class="col-md-6">
													<textarea name="short_description" id="short_description" placeholder="<?=$blog_dis_p?>" class="form-control"><?=$res->short_description?></textarea>
													<?php echo '<span class="errorss">'.form_error('short_description').'</span>';?>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="blog_date"><?=$blog_dis?></label>
												<div class="col-md-6">
												<input id="blog_date" name="blog_date" type="date" placeholder="<?=$blog_dis_p?>"  value="<?=$res->blog_date?>"/ class="form-control">
												<?php echo '<span class="errorss">'.form_error('blog_date').'</span>';?>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="tags"><?=$blog_tag?></label>
												<div class="col-md-6">
													<textarea name="tags" id="tags" class="form-control" placeholder="<?=$blog_tag_p?>"><?=$res->tags?></textarea>
													<?php echo '<span class="errorss">'.form_error('tags').'</span>';?>
												</div>
											</div>
											
										 	  
											<div class="form-group">
												<label class="col-md-3 control-label" for="descriptions"><?=$blog_content?></label>
												<div class="col-md-9">
													<textarea id="editor1" placeholder="<?=$blog_content_p?>" name="descriptions" required=""><?=base64_decode($res->descriptions)?></textarea>
													<?php echo '<span class="errorss">'.form_error('descriptions').'</span>';?>
												</div>
											</div>
											 <div class="form-group">
												<label class="col-md-3 control-label" for="name"></label>
												<div class="col-md-9">
												 <button type="submit" name="btn_update_blog" class="btn btn-primary"><i class="glyphicon glyphicon-ok-sign white"></i> <?=$update?></button>
												 
												 
												  <a href="<?=base_url()?>dashboard/blogs"><button type="submit" name="btn_update_blog" class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> <?=$back?> </button></a>
												  
												  
												</div>
											</div>
										 </div>
									</div>
			 					</form>
<?php
	}
	else
	{
		$this->session->set_userdata('error_msg','Error occurred, Unbale to find blog');
		$this->session->set_userdata('error_cls','danger');
		redirect(base_url().'dashboard/blogs');
	}

?>			 					
 								  
			</div><!-- /.col-->
		
		</div><!-- /.row -->
		
	</div><!--/.main-->
