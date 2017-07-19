
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Orders</li>
			</ol>
		</div><!--/.row-->
		
		 
				
		
		<div class="row" style="margin-top: 10px">
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
						Manage Product Orders
					 </div>
					<div class="panel-body">
						<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="asc">
						    <thead>
						    <tr>
						        <th data-field="state" data-checkbox="false" >Sr No</th>
						        <th data-field="name" data-sortable="true" >Customer Name</th>
						        <th data-field="id" data-sortable="true" >Order No</th>
						        <th data-field="payment_stat" data-sortable="false" >Payment Status</th>
						        <th data-field="delivery_stat" data-sortable="false" >Delivery Status</th>
						        <th data-field="date_tyme" data-sortable="true" >Date Time</th>
						     <!--   <th data-field="Action" data-sortable="true">Action</th> -->
						    </tr>
						    </thead>
						    <tbody>

<?php
	 $cnt=1;
	$result=$this->db->query("select * from tbl_orders ");
	if($result->result() > 0)
	{
		foreach($result->result() as $row)
		{
?>
				    	<tr>
						    		<td><?=$cnt?></td>
						    		<td>
						    			<?=$row->customer_fname.' '.$row->customer_lname?>
						    		</td>
						    		<td>
						    			<?=$row->order_no?>
						    		</td>
						    		<td><?=$row->customer_payment_status?></td>
						    		<td><?=$row->delivery_status?></td>
						    		<td><?=$row->date_tyme?></td>
						    		 
						    	<!--	<td>
						    		<a href="<?=base_url()?>dashboard/product_gallary?&ch=del&d=<?=base64_encode($row->id)?>&nm=<?=base64_encode($row->image_name)?>" style="text-decoration: none">	
						    			<button type="button" class="btn btn-danger btn-circle " title="Delete Image">
						    				<i class="glyphicon glyphicon-remove"></i>
						    			</button>
                            		</a>
						    		</td> -->
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
		</div><!-- /.row -->
		
	</div><!--/.main-->
