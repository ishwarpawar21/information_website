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
				<li class="active"><a href="<?=base_url()?>dashboard/news">News</a></li>
				<li class="active">Update News</li>
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

$res=$this->db->query("select * from tbl_news where id='".base64_decode($_GET['id'])."'")->row();
if($res)
{

?>				  

							 	<form class="form-horizontal" method="POST" enctype="multipart/form-data">
							 		<input type="hidden" name="id" value="<?=$_GET['id']?>" />
							 		<div class="panel panel-primary" style="margin-top: 10px;">
										<div class="panel-heading">
											<?=$news_update_t?> 
										</div>
										<div class="panel-body">
											<div class="form-group">
												<label class="col-md-3 control-label" for="title"><?=$news_title?></label>
												<div class="col-md-6">
												<input id="title" name="title" type="text" placeholder="<?=$news_title_p?>" class="form-control" value="<?=$res->title?>"/  >
												<?php echo '<span class="errorss">'.form_error('title').'</span>';?>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="news_img"><?=$news_img?> </label>
												<div class="col-md-6">
												<input id="news_img" name="news_img" type="file" class="form-control">
												<?php echo '<span class="errorss">'.form_error('news_img').'</span>';?>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="news_img"><?=$news_image_pre?> </label>
												<div class="col-md-6">
<?php 
	$img_path=FCPATH."assets/dashboard/uploads/news/".$res->image_name;
	if(file_exists($img_path))
	{
?>												
	<img src="<?=base_url()?>assets/dashboard/uploads/news/<?=$res->image_name?>" width="150" height="150" />
<?php
	}
	else
	{
?>
	<img src="<?=base_url()?>assets/dashboard/uploads/no_img.jpg" width="150" height="150" />
<?php		
	}
?>
												</div>
											</div>
												<div class="form-group">
												<label class="col-md-3 control-label" for="news_date"><?=$news_date?></label>
												<div class="col-md-6">
												<input id="news_date" name="news_date" type="date" placeholder="News Date"  value="<?=$res->news_date?>"/ class="form-control">
												<?php echo '<span class="errorss">'.form_error('news_date').'</span>';?>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="description"><?=$news_dis?></label>
												<div class="col-md-6">
													<textarea name="description" id="editor1" class="form-control" placeholder="<?=$news_dis_p?>"><?=base64_decode($res->description)?></textarea>
													<?php echo '<span class="errorss">'.form_error('description').'</span>';?>
												</div>
											</div>
											
									 		<div class="form-group">
												<label class="col-md-3 control-label" for="name"></label>
												<div class="col-md-9">
												 <button type="submit" name="btn_update_news" class="btn btn-primary"><i class="glyphicon glyphicon-ok-sign white"></i> <?=$update?></button>
												
												  <a href="<?=base_url()?>dashboard/news"><button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> <?=$back?> </button></a>
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
