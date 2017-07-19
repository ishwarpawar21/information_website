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
				<li class="active"><?=$create_new_blog?></li>
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
											<?=$create_new_blog?>
										</div>
										<div class="panel-body">
											<div class="form-group">
												<label class="col-md-3 control-label" for="title"><?=$blog_title?></label>
												<div class="col-md-6">
												<input id="title" name="title" type="text" placeholder="<?=$blog_title_p?>" class="form-control" value="<?=set_value('title')?>"/  >
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
												<label class="col-md-3 control-label" for="short_description"><?=$blog_dis?></label>
												<div class="col-md-6">
													<textarea name="short_description" id="short_description" placeholder="<?=$blog_dis_p?>" class="form-control"><?=set_value('short_description')?></textarea>
													<?php echo '<span class="errorss">'.form_error('short_description').'</span>';?>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="blog_date"><?=$blog_date?></label>
												<div class="col-md-6">
												<input id="blog_date" name="blog_date" type="date" placeholder="Blogs Date"  value="<?=set_value('date')?>"/ class="form-control">
												<?php echo '<span class="errorss">'.form_error('blog_date').'</span>';?>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="tags"><?=$blog_tag?></label>
												<div class="col-md-6">
													<textarea name="tags" id="tags" class="form-control" placeholder="<?=$blog_tag_p?>"></textarea>
													<?php echo '<span class="errorss">'.form_error('tags').'</span>';?>
												</div>
											</div>
											
										 	  
											<div class="form-group">
												<label class="col-md-3 control-label" for="descriptions"><?=$blog_content?></label>
												<div class="col-md-9">
													<textarea id="editor1"  name="descriptions" required="" placeholder="<?=$blog_content_p?>"></textarea>
													<?php echo '<span class="errorss">'.form_error('descriptions').'</span>';?>
												</div>
											</div>
											 <div class="form-group">
												<label class="col-md-3 control-label" for="name"></label>
												<div class="col-md-9">
												 <button type="submit" name="btn_create_blog" class="btn btn-primary"><i class="glyphicon glyphicon-ok-sign white"></i> <?=$create?></button>
												</div>
											</div>
										 </div>
									</div>
			 					</form>
 								  
			</div><!-- /.col-->
		
		</div><!-- /.row -->
		
	</div><!--/.main-->
