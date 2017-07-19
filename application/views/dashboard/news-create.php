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
				<li class="active"><a href="<?=base_url()?>dashboard/news"><?=$news?></a></li>
				<li class="active"><?=$news_create?></li>
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
											<?=$news_create?>
										</div>
										<div class="panel-body">
											<div class="form-group">
												<label class="col-md-3 control-label" for="title"><?=$news_title?></label>
												<div class="col-md-6">
												<input id="title" name="title" type="text" placeholder="<?=$news_title_p?>" class="form-control" value="<?=set_value('title')?>"/  >
												<?php echo '<span class="errorss">'.form_error('title').'</span>';?>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="news_img"><?=$news_img_pre?></label>
												<div class="col-md-6">
												<input id="news_img" name="news_img" type="file" class="form-control">
												<?php echo '<span class="errorss">'.form_error('news_img').'</span>';?>
												</div>
											</div>
											
										 
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="news_date"><?=$news_date?></label>
												<div class="col-md-6">
												<input id="news_date" name="news_date" type="date" placeholder="<?=$news_date?>"  value="<?=set_value('news_date')?>"/ class="form-control">
												<?php echo '<span class="errorss">'.form_error('news_date').'</span>';?>
												</div>
											</div>
											
											 
										 	  
											<div class="form-group">
												<label class="col-md-3 control-label" for="description"><?=$news_dis?></label>
												<div class="col-md-9">
													<textarea id="editor1" placeholder="<?=$news_dis_p?>" name="description" required=""><?=set_value('description')?></textarea>
													<?php echo '<span class="errorss">'.form_error('description').'</span>';?>
												</div>
											</div>
											
											 <div class="form-group">
												<label class="col-md-3 control-label" for="name"></label>
												<div class="col-md-9">
												 <button type="submit" name="btn_create_news" class="btn btn-primary"><i class="glyphicon glyphicon-ok-sign white"></i> <?=$create?></button>
												</div>
											</div>
										 </div>
									</div>
			 					</form>
 								  
			</div><!-- /.col-->
		
		</div><!-- /.row -->
		
	</div><!--/.main-->
