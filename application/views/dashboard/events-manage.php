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
				<li class="active"><?=$event?></li>
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
						<?=$event_mng?>
						
<div style="float: right">
		<a href="<?=base_url()?>dashboard/events?pg=<?=base64_encode('events-create')?>" style="text-decoration: none">
			<button type="button" class="btn btn-success btn-circle">
				<i class="glyphicon glyphicon-plus" style="margin-left:8px"></i>           
			</button>	
			<span style="color: #ccc;"><?=$event_create?></span>
		</a>
</div>
				
				
										
					</div>
					
			
											
					<div class="panel-body">
						<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="asc">
						    <thead>
							    <tr>
							        <th data-field="sr" data-checkbox="false" width="50" ><?=$tbl_sr_no?></th>
							        <th data-field="title" data-sortable="true"><?=$tbl_title?></th>
							        <th data-field="picture"  data-sortable="true"><?=$tbl_location?></th>
							        <th data-field="short_description"><?=$tbl_discription?></th>
							        <th data-field="Status" data-sortable="true"><?=$tbl_status?></th>
							        <th data-field="Action" data-sortable="true"><?=$tbl_action?></th>
							    </tr>
						    </thead>
						    <tbody>

<?php
	$cnt=1;
	$result=$this->db->query("select * from tbl_events ");
	if($result->result() > 0)
	{
		foreach($result->result() as $row)
		{
?>
		<tr>
						    		<td><?=$cnt?></td>
						    		<td><?=$row->title?></td>
						    		<td><?=$row->location?></td>
						    		
						    		<td>
							    		 <?=$row->short_description?>
							    	</td>
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
</style>							    	
							    			<?php 
												if($row->status=='1')
							    					{
														echo '<div class="label1" style="position: relative;">'.$status_u.'</div>';
														
													}
													else
													{
														echo '<div class="label2" style="position: relative;">'.$status_p.'</div>';	
													}
							    			?>
							    	</td>
						    		<td>
						    		
							    		<a href="<?=base_url()?>dashboard/events?pg=<?=base64_encode('events-update')?>&id=<?=base64_encode($row->id)?>" style="text-decoration: none">
							    			<button type="button" class="btn btn-primary btn-circle" title="<?=$update?>">
							    				<i class="glyphicon glyphicon-check"></i>
							    			</button>
							    		</a>
							    		
							    		<a href="<?=base_url()?>dashboard/events?ch=del&id=<?=base64_encode($row->id)?>" style="text-decoration: none">	
							    			<button type="button" class="btn btn-danger btn-circle " title="<?=$delete?>">
							    				<i class="glyphicon glyphicon-remove"></i>
							    			</button>
	                            		</a>
	                            		
	                            		
<?php
	if($row->status=='1')
	{
		
	
?>	                            		
	                            		<a href="<?=base_url()?>dashboard/events?ch=down&id=<?=base64_encode($row->id)?>" style="text-decoration: none">	
							    			<button type="button" class="btn btn-danger btn-circle " title="<?=$status_u?>">
							    				<i class="glyphicon glyphicon-thumbs-down"></i>
							    			</button>
	                            		</a>
<?php
	}
	else
	{
?>
										<a href="<?=base_url()?>dashboard/events?ch=up&id=<?=base64_encode($row->id)?>" style="text-decoration: none">	
							    			<button type="button" class="btn btn-info btn-circle" style="background: #8ad919;border-color:#8ad919 " title="<?=$status_p?>">
							    				<i class="glyphicon glyphicon-thumbs-up"></i>
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

 