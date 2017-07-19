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
				<li class="active">NewsLetter</li>
				<li class="active"><?=$n_manage_user?></li>
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
						<?=$n_manage_user?>
						<div style="float: right">
							<a href="<?=base_url()?>dashboard/newsletter?send=all</a>" style="text-decoration: none">
								<button type="button" class="btn btn-success btn-circle">
									<i class="glyphicon glyphicon-share-alt" style="margin-left:8px"></i>           
								</button>	
								<span style="color: #ccc;"><?=$n_send?></span>
							</a>
						</div>
					 </div>
					<div class="panel-body">
						<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="asc">
						    <thead>
						    <tr>
						        <th data-field="Sr_no" data-checkbox="false" ><?=$tbl_sr_no?></th>
						        <th data-field="Email" data-sortable="true" ><?=$tbl_email?></th>
						        <th data-field="date_tyme" data-sortable="false" ><?=$n_sdate_time?></th>
						        <th data-field="Action" data-sortable="false"><?=$tbl_action?></th>
						    </tr>
						    </thead>
						    <tbody>

<?php
	 $cnt=1;
	$result=$this->db->query("select * from tbl_newsletter ");
	if($result->result() > 0)
	{
		foreach($result->result() as $row)
		{
?>
				    	<tr>
						    		<td><?=$cnt?></td>
						    		 
						    		<td><?=$row->email_id?></td>
						    		
						    		<td><?=$row->date_tyme?></td>
						    		 
						    		<td>
						    		<a href="<?=base_url()?>dashboard/newsletter?&ch=del&d=<?=base64_encode($row->id)?>" style="text-decoration: none">	
						    			<button type="button" class="btn btn-danger btn-circle " title="<?=$delete?>">
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

