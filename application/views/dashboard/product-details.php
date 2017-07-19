<style>
	span p 
	{ color:red; font-size: 12px; }
</style>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="<?=base_url()?>dashboard"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Product Details </li>
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

$result=$this->db->query("select * from tbl_product_details WHERE id = '1'")->row();
	if($result)
	{
?>				  
							 	<form class="form-horizontal" method="POST">
							 	
							 		<div class="panel panel-primary" style="margin-top: 10px;">
										<div class="panel-heading">
											Edit Product Details
										</div>
										<div class="panel-body">
											<div class="form-group">
												<label class="col-md-3 control-label" for="product_name">Product Title</label>
												<div class="col-md-9">
												<input id="product_name" name="product_name" type="text" placeholder="Product Title" class="form-control" value="<?=$result->product_name?>">
												<?php echo '<span>'.form_error('product_name').'</span>';?>
												
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="short_description">short description</label>
												<div class="col-md-9">
												<textarea id="editor1" name="short_description"  placeholder="short description" class="form-control" ><?=$result->short_description?></textarea>
												<?php echo '<span>'.form_error('short_description').'</span>';?>
												</div>
											</div>
											
											 
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="price">Price</label>
												<div class="col-md-9">
												<input id="price" name="price" type="text" placeholder="Price" class="form-control" value="<?=$result->price?>">
												<?php echo '<span>'.form_error('price').'</span>';?>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="available_qty">Available Quantity</label>
												<div class="col-md-9">
												<input id="available_qty" name="available_qty" type="text" placeholder="Available Quantity" class="form-control" value="<?=$result->available_qty?>">
												<?php echo '<span>'.form_error('available_qty').'</span>';?>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="tax">Tax(%)</label>
												<div class="col-md-9">
												<input id="tax" name="tax" type="text" placeholder="Available Quantity" class="form-control" value="<?=$result->tax?>">
												<?php echo '<span>'.form_error('tax').'</span>';?>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="shipping_charges">Shipping Charges</label>
												<div class="col-md-9">
												<input id="shipping_charges" name="shipping_charges" type="text" placeholder="Available Quantity" class="form-control" value="<?=$result->shipping_charges?>">
												<?php echo '<span>'.form_error('shipping_charges').'</span>';?>
												</div>
											</div>
											 
											 <div class="form-group">
												<label class="col-md-3 control-label" for="long_description">Long description</label>
												<div class="col-md-9">
												<textarea id="editor2" name="long_description" placeholder="Long Description" class="form-control" ><?=$result->long_description?></textarea>
												<?php echo '<span>'.form_error('long_description').'</span>';?>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="name"></label>
												<div class="col-md-9">
												<button type="submit" name="btn_update_account" class="btn btn-primary">
													Update Product Details
												</button>
												</div>
											</div>
											
										</div>
									</div>
			 					</form>
<?php
	}
?>								  
			</div><!-- /.col-->
		</div><!-- /.row -->
		
	</div><!--/.main-->
