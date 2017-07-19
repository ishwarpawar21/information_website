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

 </style>
	 
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Product Gallary</li>
			</ol>
		</div><!--/.row-->
		
		 
		
		<div class="row" style="margin-top: 10px">
		
		<div class="col-md-9" style="margin-top: 10px">
				<div class="panel panel-primary">
					<div class="panel-heading">Upload Product Image</div>
					<div class="panel-body">
						
						<form class="form-horizontal" method="POST" enctype="multipart/form-data">
						
											<div class="form-group">
												<label class="col-md-3 control-label" for="image_gal">Select Image (jpg only)</label>
												<div class="col-md-6">
													<input id="image_gal" name="image_gal" type="file" class="form-control" required="">
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="image_description">Image Description</label>
												<div class="col-md-9">
												<textarea id="image_description" name="image_description"  class="form-control" placeholder="Image Description" ></textarea>
												</div>
											</div>
											
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="name"></label>
												<div class="col-md-9">
													<button type="submit" name="btn_update_image" class="btn btn-primary">
														<i class="glyphicon glyphicon-ok"></i> Upload Image
													</button>
												</div>
											</div>
											
						</form>
					</div>
				</div>
			</div>
			
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
				<div class="panel panel-default">
					<div class="panel-heading">
						Manage Product Images
					 </div>
					<div class="panel-body">
						<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="asc">
						    <thead>
						    <tr>
						        <th data-field="state" data-checkbox="false" >Sr No</th>
						        <th data-field="id" data-sortable="true" >Image</th>
						        <th data-field="image_Description" data-sortable="true" >Image Description</th>
						        <th data-field="Action" data-sortable="true">Action</th>
						    </tr>
						    </thead>
						    <tbody>

<?php
	 $cnt=1;
	$result=$this->db->query("select * from tbl_product_gallary ");
	if($result->result() > 0)
	{
		foreach($result->result() as $row)
		{
?>
				    	<tr>
						    		<td><?=$cnt?></td>
						    		<td>
						    			<img src="<?=base_url()?>assets/dashboard/uploads/image_gal/<?=$row->image_name.'?'.time()?>" width="100" height="100" alt="<?=$row->image_description?>"/>
									</td>
						    		<td><?=$row->image_description?></td>
						    		 
						    		<td>
						    		<a href="<?=base_url()?>dashboard/product_gallary?&ch=del&d=<?=base64_encode($row->id)?>&nm=<?=base64_encode($row->image_name)?>" style="text-decoration: none">	
						    			<button type="button" class="btn btn-danger btn-circle " title="Delete Image">
						    				<i class="glyphicon glyphicon-remove"></i>
						    			</button>
                            		</a>
						    		</td>
						</tr>
		
<?php			
		$cnt++; }
	}
?>						    
						    	
						    
						    </tbody>
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->	
	 </div><!--/.main-->

