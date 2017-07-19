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
 
	
<!-- ********************** to add 	ckeditor ----------------------->
<link href="<?=base_url()?>assets/dashboard/ckeditor/css/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

<!-- ********************** // to add ckeditor -----------------------> 
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active"><?=$web_pages?></li>
				<li class="active">Manage Pages</li>
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
	

	
		
				<div class="col-md-6" style="margin-top: 10px">
				<div class="panel panel-primary">
					<div class="panel-heading"><?=$web_banner_t?></div>
					<div class="panel-body">
						
						<form class="form-horizontal" method="POST" enctype="multipart/form-data">
								<div class="form-group">
									<label class="col-md-5 control-label" for="website_banner"><?=$banner_choose?> </label>
									<div class="col-md-7">
										<input id="website_banner" name="website_banner" type="file" class="form-control">
									</div>
								</div>
											
								<div class="form-group">
									<label class="col-md-5 control-label" for="name"><?=$banner_uploaded?> </label>
									<div class="col-md-7">
<?php
	$img_path=FCPATH.'assets/dashboard/uploads/banner.jpg';
	if(file_exists($img_path))
	{
?>
		<img src="<?=base_url()?>assets/dashboard/uploads/banner.jpg?<?=time()?>" width="100" height="100">
<?php		
	}
	else
	{
?>												
		<img src="<?=base_url()?>assets/dashboard/uploads/no_img.jpg?<?=time()?>" width="100" height="100">
<?php
	}
?>												
									</div>
								</div>
											
						 	<div class="form-group">
								<label class="col-md-5 control-label" for="name"></label>
								<div class="col-md-7">
									<button type="submit" name="btn_update_banner" class="btn btn-primary">
										<i class="glyphicon glyphicon-picture"></i> 
										<?=$btn_upload?>
									</button>
								</div>
							</div>
											
						</form>
						
						<hr/>
						
						<form class="form-horizontal" method="POST" enctype="multipart/form-data">
									<div class="form-group">
									<label class="col-md-4 control-label" for="logo_position"><?=$banner_current_pos?></label>
									<div class="col-md-8">
									  <div class="radio">
										<label style="text-transform: uppercase"> 
											<?php
												$res=$this->db->query("select * from tbl_home_page_settings WHERE id='1' ")->row();
												if($res)
												{
													echo $res->banner_position;
												}
											?> 
										</label>
									  </div>
									</div>
							</div>
								<div class="form-group">
									<label class="col-md-4 control-label" for="banner_position"><?=$banner_pos?></label>
									<div class="col-md-8">
										<div class="radio">
											<label>
												<input id="banner_position" name="banner_position" type="radio"  value="Top" > <?=$postion_top?>
											</label>
										
											<label style="margin-left: 50px">
												<input id="banner_position" name="banner_position" type="radio"  value="Bottom">  <?=$postion_bottom?>
											</label>
										</div>
									</div>
									
								</div>
								
								<div class="form-group">
									<label class="col-md-4 control-label" for="name"></label>
									<div class="col-md-8">
										<button type="submit" name="btn_update_banner_position" class="btn btn-primary">
											<i class="glyphicon glyphicon-ok-sign"></i> 
													<?=$btn_set?>
										</button>
									</div>
							</div>
						</form>											
					 </div>
				</div>
			</div>
				 


				 
				<div class="col-md-6" style="margin-top: 10px">
				<div class="panel panel-primary">
					<div class="panel-heading"><?=$add_web_upper_info_t?></div>
					<div class="panel-body">
					 	<form class="form-horizontal" method="POST" enctype="multipart/form-data">
								<div class="form-group">
									<label class="col-md-5 control-label" for="info_image"><?=$ib_select_image?> </label>
									<div class="col-md-7">
										<input id="info_image" name="info_image" type="file" class="form-control">
										<?php echo '<span class="errors">'.form_error('info_image').'</span>'; ?>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-5 control-label" for="meta_keywords"><?=$ib_img_meta_key?> </label>
									<div class="col-md-7">
										<input id="meta_keywords" name="meta_keywords" type="text" class="form-control" placeholder="<?=$ib_img_meta_key_p?>">
										<?php echo '<span class="errors">'.form_error('meta_keywords').'</span>'; ?>
									</div>
								</div>

								
								<div class="form-group">
									<label class="col-md-5 control-label" for="Heading"><?=$ib_heading?> </label>
									<div class="col-md-7">
										<input id="headings" name="headings" type="text" class="form-control" placeholder="<?=$ib_heading_p?>">
										<?php echo '<span class="errors">'.form_error('headings').'</span>'; ?>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-5 control-label" for="short_description"><?=$ib_discrption?></label>
									<div class="col-md-7">
										<textarea style="height: 160px" id="short_description" name="short_description" placeholder="<?=$ib_discrption_p?>" class="form-control"></textarea>
										<?php echo '<span class="errors">'.form_error('short_description').'</span>'; ?>
									</div>
								</div>
								  
							<!--	   <div class="form-group">
                                        <label>Color picker:</label>                                         
                                        <input type="text" class="form-control my-colorpicker1"/>
                                    </div>
                                    
                                    <div class="input-group my-colorpicker2">                                            
                                            <input type="text" class="form-control"/>
                                            <div class="input-group-addon">
                                                <i></i>
                                            </div>
                                     </div><!-- /.input group -->
											
							 	<div class="form-group">
									<label class="col-md-5 control-label" for="name"></label>
									<div class="col-md-7">
										<button type="submit" name="btn_add_infobox" class="btn btn-primary">
											<?=$btn_add?>
										</button>
									</div>
								</div>
						</form>
						
					 </div>
				</div>
			</div>
			 
				
			</div>
		</div><!--/.row-->	
		

	 
	 
	 	<div class="row" style="margin-top: 10px">
			<div class="col-lg-12">
			<div class="panel-heading">
						<?=$m_clolor_title?>
						
					</div>

                 <?php
	                               $resmc=$this->db->query("select * from tbl_home_page_settings where id='1'")->row();
	                             if($resmc)
	                             {
		                         ?>	
				 
				<div class="col-md-6" style="margin-top: 10px">
				<div class="panel panel-primary">
					<div class="panel-heading"><?=$bg_title?></div>
					<div class="panel-body">
					 	<form class="form-horizontal" method="POST" enctype="multipart/form-data">
								 	
								<div class="form-group">
									<label class="col-md-5 control-label" for="menu_background_color">Select Background Color </label>
									<div class="col-md-7">
										<input id="menu_background_color" name="menu_background_color" type="text" class="form-control my-colorpicker1" value="<?=$resmc->menu_background_color?>" >
										<?php echo '<span class="errors">'.form_error('headings').'</span>'; ?>
									</div>
								</div>
															  
								 
											
							 	<div class="form-group">
									<label class="col-md-5 control-label" for="name"></label>
									<div class="col-md-7">
										<button type="submit" name="btn_set_menu_background_color" class="btn btn-primary">
											<?=$btn_set?>
										</button>
									</div>
								</div>
								
								
						</form>
						
					 </div>
				</div>
			</div>
			
				<div class="col-md-6" style="margin-top: 10px">
				<div class="panel panel-primary">
					<div class="panel-heading"><?=$bg_title2?></div>
					<div class="panel-body">
					 	<form class="form-horizontal" method="POST" enctype="multipart/form-data">
															  
								   <div class="form-group">
                                        <label><?=$select_h_color?></label>                                         
                                        <input type="text" name="menu_hover_color" value="<?=$resmc->menu_hover_color?>" class="form-control my-colorpicker1"/>
                                    </div><!-- /.form group -->
                                    
                                 
											
							 	<div class="form-group">
									<label class="col-md-5 control-label" for="name"></label>
									<div class="col-md-7">
										<button type="submit" name="btn_set_menu_hover_color" class="btn btn-primary">
												<?=$btn_set?>
										</button>
									</div>
								</div>
						</form>
						
					 </div>
				</div>
			</div>
			 
				<?php }?>
			</div>
		</div><!--/.row-->	
		
		
		

		
			
			<div class="row" style="margin-top: 10px">
				<div class="col-lg-12">
				
				
				
				<div class="panel panel-default">
					<div class="panel-heading">
						<?=$mng_upper_infobox_t?>
						
					</div>

					
					
					<div class="panel-body">
						<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="asc">
						    <thead>
						    <tr>
						        <th data-field="sr" data-checkbox="false" width="50" ><?=$tbl_sr_no?></th>
						        <th data-field="info_img" data-sortable="true"><?=$tbl_heading?></th>
						        <th data-field="metawords"  data-sortable="true"><?=$tbl_meta_key?></th>
						        <th data-field="headings" data-sortable="true"><?=$tbl_heading?></th>
						        <th data-field="short_desc" data-sortable="true"><?=$tbl_discription?></th>
						        
						        <th data-field="status" data-sortable="true"><?=$tbl_status?></th>
						        <th data-field="action" data-sortable="true"><?=$tbl_action?></th>
						    </tr>
						    </thead>
						    <tbody>

<?php
	$cnt=1;
	$result=$this->db->query("select * from tbl_info_box  order by id DESC");
	if($result->result() > 0)
	{
		foreach($result->result() as $row)
		{
?>
				    	<tr>
						    		<td><?=$cnt?></td>
						    		<td><img src="<?=base_url().'assets/dashboard/uploads/info_box/'.$row->image_name?>" width="100" height="100"/></td>
						    		<td> <?=$row->meta_keywords?>							    		 
							    	</td>
							    	
							    	<td> <?=$row->headings?>							    		 
							    	</td>
							    	
						    		<td> <?=$row->short_description?>							    		 
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
														echo '<div class="label1" style="position: relative;">'.$status_p.'</div>';
														
													}
													else
													{
														echo '<div class="label2" style="position: relative;">'.$status_u.'</div>';	
													}
							    			?>
							    	</td>
							    	
							    	
						    		<td>
						    		
						    		<a href="<?=base_url()?>dashboard/home_page?pg=<?=base64_encode('home-page-edit')?>&id=<?=base64_encode($row->id)?>" style="text-decoration: none">
						    			<button type="button" class="btn btn-primary btn-circle" title="Modify Page">
						    				<i class="glyphicon glyphicon-check"></i>
						    			</button>
						    		</a>
						    		<a href="<?=base_url()?>dashboard/home_page?pg=<?=base64_encode('home-page-manage')?>&ch=del_upper&id=<?=base64_encode($row->id)?>" style="text-decoration: none">	
						    			<button type="button" class="btn btn-danger btn-circle " title="Delete Page">
						    				<i class="glyphicon glyphicon-remove"></i>
						    			</button>
                            		</a>
                            		
                            		


	                            		
<?php
	if($row->status=='1')
	{
		
	
?>	                            		
	                            		<a href="<?=base_url()?>dashboard/home_page?ch=down1&id=<?=base64_encode($row->id)?>" style="text-decoration: none">	
							    			<button type="button" class="btn btn-danger btn-circle " title="<?=$status_u?>">
							    				<i class="glyphicon glyphicon-thumbs-down"></i>
							    			</button>
	                            		</a>
<?php
	}
	else
	{
?>
										<a href="<?=base_url()?>dashboard/home_page?ch=up1&id=<?=base64_encode($row->id)?>" style="text-decoration: none">	
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
				
				
				
				<div class="col-md-6" style="margin-top: 10px">
				
				<div class="panel panel-primary">
					<div class="panel-heading"><?=$wb_lowerinfo_t?></div>
						<div class="panel-body">
					 		<form class="form-horizontal" method="POST">
<?php
	$res=$this->db->query("select * from tbl_home_page_settings where id='1'")->row();
	if($res)
	{	
?>					 		
								<div class="form-group">
									<label class="col-md-3 control-label" for="Heading"><?=$lbx_t?> </label>
									<div class="col-md-9">
										<input id="lower_title" name="lower_title" type="text" class="form-control" placeholder="<?=$lbx_t_p?>" value="<?=$res->lower_title?>">
										<?php echo '<span class="errors">'.form_error('lower_title').'</span>'; ?>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-3 control-label" for="Heading">	<?=$lbx_bg_color?> </label>
									<div class="col-md-9">
										 <input type="text"  name="lowerinfo_background_color" value="<?=$res->lowerinfo_background_color?>" class="form-control my-colorpicker1"/>
										<?php echo '<span class="errors">'.form_error('lower_title').'</span>'; ?>
									</div>
								</div>
								
<?php
	}
?>									

                               
                                    			
							 	<div class="form-group">
									<label class="col-md-3 control-label" for="name"></label>
									<div class="col-md-9">
										<button type="submit" name="btn_update_lower_tile" class="btn btn-primary">
											<?=$btn_set?>
										</button>
									</div>
								</div>
								
								
                                    
                                 
											
							 	
								
								
								
								
							</form>
							
							
							
							
								
						</div>
					</div>	
				</div>
	
				
				<div class="col-md-6" style="margin-top: 10px">
				<div class="panel panel-primary">
					<div class="panel-heading"><?=$add_lowerinfo_t?></div>
					<div class="panel-body">
					 	<form class="form-horizontal" method="POST">
								<div class="form-group">
									<label class="col-md-5 control-label" for="Heading"><?=$lbx_heading?> </label>
									<div class="col-md-7">
										<input id="headings" name="headings" value="" type="text" class="form-control" placeholder="<?=$lbx_heading_p?>">
										<?php echo '<span class="errors">'.form_error('headings').'</span>'; ?>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-5 control-label" for="short_description"><?=$lbx_dis?></label>
									<div class="col-md-7">
										<textarea style="height: 160px" id="short_description" name="short_description" placeholder="<?=$lbx_dis_p?>" class="form-control"></textarea>
										<?php echo '<span class="errors">'.form_error('short_description').'</span>'; ?>
									</div>
								</div>
								  
											
							 	<div class="form-group">
									<label class="col-md-5 control-label" for="name"></label>
									<div class="col-md-7">
										<button type="submit" name="btn_add_lower_infobox" class="btn btn-primary">
											<?=$btn_add?>
										</button>
									</div>
								</div>
						</form>
						
					 </div>
				</div>
			</div>
			
			
		

			
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<?=$mng_lbx_t?>
					</div>
					<div class="panel-body">
						<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="asc">
						    <thead>
						    <tr>
						        <th data-field="sr" data-checkbox="false" width="50" ><?=$tbl_sr_no?></th>
						        <th data-field="headings" data-sortable="true"><?=$tbl_heading?></th>
						        <th data-field="short_desc" data-sortable="true"><?=$tbl_discription?></th>
						        <th data-field="Status" data-sortable="true"><?=$tbl_status?></th>
						        <th data-field="action" data-sortable="true"><?=$tbl_action?></th>
						    </tr>
						    </thead>
						    <tbody>

<?php
	$cnt=1;
	$result=$this->db->query("select * from  tbl_lower_infobox  order by id DESC");
	if($result->result() > 0)
	{
		foreach($result->result() as $row)
		{
?>
				    	<tr>
						    		<td><?=$cnt?></td>
						    		  
							    	
							    	<td> <?=$row->headings?>							    		 
							    	</td>
							    	
						    		<td> <?=$row->short_descriptions?>							    		 
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
														echo '<div class="label1" style="position: relative;">'.$status_p.'</div>';
														
													}
													else
													{
														echo '<div class="label2" style="position: relative;">'.$status_u.'</div>';	
													}
							    			?>
							    	</td>
						    		<td>
						    		
						    		<a href="<?=base_url()?>dashboard/home_page?pg=<?=base64_encode('home-page-lower_info-edit')?>&id=<?=base64_encode($row->id)?>" style="text-decoration: none">
						    			<button type="button" class="btn btn-primary btn-circle" title="Modify">
						    				<i class="glyphicon glyphicon-check"></i>
						    			</button>
						    		</a>
						    		<a href="<?=base_url()?>dashboard/home_page?pg=<?=base64_encode('home-page-manage')?>&ch=del_lowwer&id=<?=base64_encode($row->id)?>" style="text-decoration: none">	
						    			<button type="button" class="btn btn-danger btn-circle " title="Delete">
						    				<i class="glyphicon glyphicon-remove"></i>
						    			</button>
                            		</a>
                            		

                       		
<?php
	if($row->status=='1')
	{
		
	
?>	                            		
	                            		<a href="<?=base_url()?>dashboard/home_page?ch=down&id=<?=base64_encode($row->id)?>" style="text-decoration: none">	
							    			<button type="button" class="btn btn-danger btn-circle " title="<?=$status_u?>">
							    				<i class="glyphicon glyphicon-thumbs-down"></i>
							    			</button>
	                            		</a>
<?php
	}
	else
	{
?>
										<a href="<?=base_url()?>dashboard/home_page?ch=up&id=<?=base64_encode($row->id)?>" style="text-decoration: none">	
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
				
				
			
	
				
				<div class="col-md-12" style="margin-top: 10px">
				<div class="panel panel-primary">
					<div class="panel-heading"><?=$wb_bottom_cnt?></div>
					<div class="panel-body">
					 	<form class="form-horizontal" method="POST">
					 	
<?php
	$res=$this->db->query("select * from tbl_home_page_settings where id='1'")->row();
	if($res)
	{
		
 
?>					 	
								<div class="form-group">
									<label class="col-md-3 control-label" for="bottom_container_heads"><?=$bt_cnt_heading?></label>
									<div class="col-md-9">
										<input id="bottom_container_heads" name="bottom_container_heads" type="text" class="form-control" placeholder="<?=$bt_cnt_heading_p?>" value="<?=$res->bottom_container_heads?>">
										<?php echo '<span class="errors">'.form_error('headings').'</span>'; ?>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-3 control-label" for="bottom_container_desc"><?=$bt_cnt_dis?></label>
									<div class="col-md-9">
										<textarea id="editor1" name="bottom_container_desc" placeholder="<?=$bt_cnt_dis_p?>" class="form-control"><?=base64_decode($res->bottom_container_desc)?></textarea>
										<?php echo '<span class="errors">'.form_error('bottom_container_desc').'</span>'; ?>
									</div>
								</div>
								  
<?php
	}
?>											
							 	<div class="form-group">
									<label class="col-md-3 control-label" for="name"></label>
									<div class="col-md-9">
										<button type="submit" name="btn_update_container" class="btn btn-primary">
											<?=$update?>
										</button>
									</div>
								</div>
						</form>
						
					 </div>
				</div>
			</div>
			
			
				
			</div>
	 </div><!--/.main-->
 

<!-- ********************** to add 	ckeditor ----------------------->
	
	  <script src="<?=base_url()?>assets/dashboard/ckeditor/ckeditor/ckeditor.js" type="text/javascript"></script>
         <script src="<?=base_url()?>assets/dashboard/ckeditor/css/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(function() {
                CKEDITOR.replace('editor1');
                 $(".textarea").wysihtml5();
                 
                
                
            });
          </script>
        
<!-- ********************** // to add ckeditor ----------------------->