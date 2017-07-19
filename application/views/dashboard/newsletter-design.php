 <style>
.btn-circle {
  width: 30px;
  height: 30px;
  padding: 6px 0;
  border-radius: 15px;
  text-align: center;
  font-size: 12px;
  line-height: 1.428571429;
}
.table>thead:first-child>tr:first-child>th
	width: 200px !important;
}


       

 </style>
	 
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active"><?=$newsletter_design?></li>
				<li class="active"><?=$n_title?></li>
			</ol>
		</div><!--/.row-->
		
		 
		
		<div class="row" style="margin-top: 10px">
			<div class="col-lg-12">
<?php
	$result=$this->db->query("select * from tbl_newsletter_design where id='1' ")->row();
	if($result)
	{
?>				  
							 	<form class="form-horizontal" method="POST" enctype="multipart/form-data">
							 	
							 		<div class="panel panel-primary" style="margin-top: 10px;">
										<div class="panel-heading">
											<?=$n_title?>
										</div>
										<div class="panel-body">
											<div class="form-group">
												<label class="col-md-3 control-label" for="nl_title"><?=$n_title1?></label>
												<div class="col-md-9">
												<input id="nl_title" name="nl_title" type="text" placeholder="<?=$n_title1_p?>" class="form-control" value="<?=$result->nl_title?>">
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="nl_subject"><?=$n_subject?></label>
												<div class="col-md-9">
												<input id="nl_subject" name="nl_subject" type="text" placeholder="<?=$n_subject_p?> " class="form-control" value="<?=$result->nl_subject?>">
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="nl_design"><?=$n_design?></label>
												<div class="col-md-9">
												<textarea id="editor1" name="nl_design" placeholder="<?=$n_design?>" class="form-control"><?=base64_decode($result->nl_design)?></textarea>
												</div>
											</div>
											 
											<div class="form-group">
												<label class="col-md-3 control-label" for="name"></label>
												<div class="col-md-9">
												<input type="submit" name="btn_save_design" class="btn btn-primary" value="<?=$save?>">
												</div>
											</div>
											
										</div>
									</div>
			 					</form>
<?php
	}
?>			 					
								  
			</div>
		</div><!--/.row-->	
	 </div><!--/.main-->

