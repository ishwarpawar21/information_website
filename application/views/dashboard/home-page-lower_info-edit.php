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

.errors p
{
	color: #ff0000;
}
 </style>
	 
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li>Home Page</li>
				<li>Info Box </li>
				<li class="active">Update Lower Info Box </li>
			</ol>
		</div><!--/.row-->
		
		  
		
		
			<div class="row" style="margin-top: 10px">
			<div class="col-lg-12">
				<div class="col-md-6" style="margin-top: 10px">
				<div class="panel panel-primary">
					<div class="panel-heading">Update Website Lower Infobox</div>
					<div class="panel-body">
					 	<form class="form-horizontal" method="POST" enctype="multipart/form-data">
					 	<input type="hidden" name="id" value="<?=$_GET['id']?>"/>
							 
								
								<div class="form-group">
									<label class="col-md-5 control-label" for="Heading">Heading </label>
									<div class="col-md-7">
										<input id="headings" name="headings" type="text" class="form-control" placeholder="Headings">
										<?php echo '<span class="errors">'.form_error('headings').'</span>'; ?>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-5 control-label" for="short_description">Short Description</label>
									<div class="col-md-7">
										<textarea style="height: 160px" id="short_description" name="short_description" placeholder="Description" class="form-control"></textarea>
										<?php echo '<span class="errors">'.form_error('short_description').'</span>'; ?>
									</div>
								</div>
								  
											
							 	<div class="form-group">
									<label class="col-md-5 control-label" for="name"></label>
									<div class="col-md-7">
										<button type="submit" name="btn_update_lower_infobox" class="btn btn-primary">
											Update Infobox
										</button>
									</div>
								</div>
						</form>
						
					 </div>
				</div>
			</div> 
				</div>
			</div>
	 </div><!--/.main-->
 