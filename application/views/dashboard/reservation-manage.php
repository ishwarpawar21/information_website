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
				<li class="active"><?=$mng_reservation?></li>
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

			 
		</div>
			<div class="col-lg-12">
 
				<div class="panel panel-default">
					<div class="panel-heading">
					  <?=$mng_reservation?>
					</div>
					
			
											
					<div class="panel-body">
						<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="asc">
						    <thead>
						    <tr>
						        <th data-field="sr" data-checkbox="false" width="50" ><?=$tbl_sr_no?></th>
						        <th data-field="name" data-sortable="true"><?=$tbl_person_name?></th>
						        <th data-field="email"  data-sortable="true"><?=$tbl_email?></th>
						        <th data-field="phno"><?=$tbl_phone?></th>
						        <th data-field="date"><?=$tbl_a_date?></th>
						        <th data-field="time"><?=$tbl_a_time?></th>
						        <th data-field="Status" data-sortable="true"><?=$tbl_status?></th>
						        <th data-field="Action" data-sortable="true"><?=$tbl_action?></th>
						    </tr>
						    </thead>
						    <tbody>

<?php
	$cnt=1;
	$result=$this->db->query("select * from  tbl_booking_appointment  ");
	if($result->result() > 0)
	{
		foreach($result->result() as $row)
		{
?>
		<tr>
						    		<td><?=$cnt?></td>
						    		<td><?=$row->person_name?></td>
						    		<td><?=$row->person_email?></td>
						    		<td><?=$row->person_phone?></td>
						    		<td><?=$row->appointment_date?></td>
						    		<td><?=$row->appointment_time?></td>
						    		  
							    	<td>
<style>
	.label1
	{
		background:#8ad919;
		padding: 3px 5px;
    border-radius: 2px;
    cursor: pointer;
    font-weight: 600;
    display: inline-block;
    margin: 0 5px 5px 0;
    color: #fff;
	}
	
	.label2
	{
		background:#f56954;
		padding: 3px 5px;
	    border-radius: 2px;
	    cursor: pointer;
	    font-weight: 600;
	    display: inline-block;
	    margin: 0 5px 5px 0;
	    color: #fff;
	}
	.label3
	{
		background:#30a5ff;
		padding: 3px 5px;
	    border-radius: 2px;
	    cursor: pointer;
	    font-weight: 600;
	    display: inline-block;
	    margin: 0 5px 5px 0;
	    color: #fff;
	}
</style>							    	
							    			<?php 
													if($row->status=='sent_to_admin')
							    					{
														echo '<div class="label2" style="position: relative;">'.$not_confirmed.'</div>';
														
													}
													if($row->status=='sent_to_user')
							    					{
														echo '<div class="label3" style="position: relative;">Confirmation Send</div>';
													}
													if($row->status=='confirmed')
							    					{
														echo '<div class="label1" style="position: relative;">'.$confirmed.'</div>';
													}
													
													
							    			?>
							    	</td>
						    		<td>
						    		
							    		 
							    		
							    		<a href="<?=base_url()?>dashboard/reservation?ch=del&id=<?=base64_encode($row->id)?>" style="text-decoration: none">	
							    			<button type="button" class="btn btn-danger btn-circle " title="<?=$delete?>">
							    				<i class="glyphicon glyphicon-remove"></i>
							    			</button>
	                            		</a>
	                            		
	                            		
<?php
	if($row->status=='sent_to_admin')
	{
?>	                            		
	                            		<a href="<?=base_url()?>dashboard/reservation?ch=confirm&id=<?=base64_encode($row->id)?>&nm=<?=base64_encode($row->person_name)?>&email=<?=base64_encode($row->person_email)?>" style="text-decoration: none">	
							    			<button type="button" class="btn btn-danger btn-circle " style="background: #8ad919;border-color:#8ad919 "  title="<?=$confirmed?>">
							    				<i class="glyphicon glyphicon-ok"></i>
							    			</button>
	                            		</a>
<?php
	}
?>	                            		
	                            	 
						    		</td>
		</tr>		
<?php			
		$cnt++;}
	}
?>						    
						    	
						    
						    </tbody>
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->	
	 </div><!--/.main-->

 