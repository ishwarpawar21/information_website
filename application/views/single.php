<?php
$margin_top_fg=0;
$res=$this->db->query("select * from  tbl_home_page_settings WHERE id='1'")->row();
if($res)
{
 
	$img_path=FCPATH."assets/dashboard/uploads/banner.jpg";
	if(is_file($img_path))
	{
		if($res->banner_position=="Top")
		{
		
		$margin_top_fg=1;
?>
     <section style="margin-top: 75px">
        <div class="container " >
            <div class="box" style="width:100%;padding:0">
            	<img src="<?=base_url()?>assets/dashboard/uploads/banner.jpg" width="100%" height="100">            	
            </div>
       </div>
    </section>
<?php
		}	
	}
}	

$res=$this->db->query("select * from  tbl_blogs where id= '".base64_decode(base64_decode(base64_decode($_GET['myblog'])))."' ")->row();
if($res)
{
?>    



   
    <section id="Blog" style="padding-top: 75px">
        <div class="container">
            <div class="box" >
                <div class="row">
                    <div class="col-md-12 ">
                         
                            
                            
                           
<style>
.news{
	border: 1px solid #cccff0;
	padding: 10px;
	margin: 10px;
	background: #efefef;
}     
.news h3{
	margin-bottom: 0;
}
.news span{
	color: #999;
	font-size: 12px;
	font-weight: 600;	
}

.comment_suc
{
	color:green;
	font-size: 14px;
	font-weight: 600;
}

.comment_err
{
	color:red;
	font-size: 14px;
	font-weight: 600;
}
</style>                                    

	<div class="row" >
		
		<div class="col-md-10 col-md-offset-1">
			
			<div class=" blog_box">
		        <h3><a href="#"><?=$res->title?></a></h3>
<?php 
	$img_path=FCPATH.'assets/dashboard/uploads/blogs/'.$res->image_name;
	if(file_exists($img_path))
	{
?>
		<img src="<?=base_url()?>assets/dashboard/uploads/blogs/<?=$res->image_name?>" alt="image" class="img-responsive">
<?php		
	}
?>		        
		        
		        
		     	
		     	
		     	<p><?=$res->short_description?></p>
		     	
		     	<p><?=base64_decode($res->descriptions)?></p>

			</div>
			
					<div style="padding:10px; border: 1px solid #ccc">
					
						<span>
							<i class="icon-calendar"></i>
							<span><?=$res->blog_date?></span>
						</span>	
						<span style="margin-left: 30px">
							<i class="icon-user"></i>
							<span>Posted By Admin</span>
						</span>
					 
						<span style="margin-left: 30px">
							<i class="icon-tags"></i>
							<span><?=$res->tags?></span>
						</span>	
						 
					</div>
					
				  
				<div class="leave-comment">
						<h3>Comments</h3>
						<div>
<?php
	if($this->session->userdata('comment_msg'))
	{
		echo '<p>'.$this->session->userdata('comment_msg').'</p>';
		$this->session->unset_userdata('comment_msg');
	}
?>

							<form method="POST">
							
							<input type="hidden" name="blog_id" value="<?=$_GET['myblog']?>"/>
								<div class="panel-body"  style="padding: 0 15px"	>
									<div class="form-group col-xs-6">
									<input type="text" class="form-control " name="users_name" id="users_name" placeholder="Your Name." required="" />
									</div>
								
									<div class="form-group col-xs-6">
									<input type="email" class="form-control"  name="email" id="email" placeholder="Your Email." required="" />
									</div>
								</div>
								
								<div class="panel-body"  style="padding: 0 15px">
									<div class="form-group col-xs-12">
									<textarea  class="form-control" name="comments" id="comments" placeholder="Your Comment... " required=""></textarea>
									</div>
								
								</div>								
								
								<div class="panel-body" style="padding: 0 15px">
									<div class="form-group col-xs-12">  
										<input type="submit" name="btn_post_comment" class="btn btn-danger btn-lg" value="Post Your Comment">
									</div>
								</div>
									
							</form>
									
					</div>
				</div>
				
				<div>
					<h3 style="border-bottom: 1px solid #ccc">Users Comments</h3>

<?php
$ccnt=1;
	$rs=$this->db->query("select * from tbl_blog_comments where status='1' and blog_id = '".base64_decode(base64_decode(base64_decode($_GET['myblog'])))."' ");
	if($rs->num_rows>0)
	{
		foreach($rs->result() as $rows)
		{
?>
			<div class="callout <?php if($ccnt%2==0){ echo "callout-danger"; }else { echo "callout-info"; } ?> ">
            	<h4><?=$rows->users_name?></h4>
                <p><?=$rows->comments?></p>
            </div>
<?php			
$ccnt++;
		}
	}
	else
	{
?>
		<h4 style="color: #ff0000">No Comments Yet...</h4>
<?php
	}
?>					
		 			
				</div>
		
		</div>                       	 
		</div> 
                       
                    </div><!--/.col-md-4-->
                    
                     
                </div><!--/.row-->
            </div><!--/.box-->
        </div><!--/.container-->
    </section><!--/#services-->
    
    





     <?php
	
}
else
{
	redirect(base_url().'site/blogs');
}



     
$margin_top_fg=0;
$res=$this->db->query("select * from  tbl_home_page_settings WHERE id='1'")->row();
if($res)
{
 
	$img_path=FCPATH."assets/dashboard/uploads/banner.jpg";
	if(is_file($img_path))
	{
		if($res->banner_position=="Bottom")
		{
		
		$margin_top_fg=1;
?>
     <section >
        <div class="container " >
            <div class="box" style="width:100%;padding:0">
            	<img src="<?=base_url()?>assets/dashboard/uploads/banner.jpg" width="100%" height="100">            	
            </div>
       </div>
    </section>
<?php
		}	
	}
}	
?> 
   
   
   