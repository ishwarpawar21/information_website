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
?>    
 
    <section id="Blog" <?php if($margin_top_fg==0) echo 'style="margin-top:75px;"' ?>>
        <div class="container">
            <div class="box" >
                <div class="row">
                    <div class="col-md-12 ">
                         
                            <h1 align="center">Blogs </h1>
                            
                           
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
</style>                                    

	<div class="row" >
		
		<div class="col-md-10 col-md-offset-1">
        
<?php
	$res=$this->db->query("select * from tbl_blogs where status='1'");
	if($res->result()>0)
	{
		foreach($res->result() as $rows)
		{
?>
			 <div class="blog_box" style="margin:10px;padding: 10px">
			     	<h3>
				     	<a href="<?=base_url()?>site/blogs?myblog=<?=base64_encode(base64_encode(base64_encode($rows->id)))?>"> 
				     		<?=$rows->title?>
				     	</a>
			     	</h3>

<?php
	$img_path=FCPATH.'assets/dashboard/uploads/blogs/'.$rows->image_name;
	
	if(file_exists($img_path))
	{
?>
		<a href="<?=base_url()?>site/blogs?myblog=<?=base64_encode(base64_encode(base64_encode($rows->id)))?>"><img src="<?=base_url()?>assets/dashboard/uploads/blogs/<?=$rows->image_name?>" alt="image" class="img-responsive"></a>
<?php		
	}
?>			     	
			        

			     	<div class="links">
			  		   <p>Posted by <a>Admin</a> | <a href="#">
<?php
	$comments=$this->db->query("select count(id) as cnt from tbl_blog_comments where blog_id='".$rows->id."' and status='1'  ")->row();
	if($comments)
	{
		echo $comments->cnt.' Comments'; 
	}
?>			  		   
			  		   </a></p>
			  		</div>
			     	<p><?=$rows->short_description?></p>
			        <a class="hvr-shutter-out-vertical " href="<?=base_url()?>site/blogs?myblog=<?=base64_encode(base64_encode(base64_encode($rows->id)))?>">Read More</a>
			 </div>
<?php			
		}
	}
	
	
?>        
        
				
					
				  
					
				 
					
			</div>                       	 
		</div> 
                       
                    </div><!--/.col-md-4-->
                    
                     
                </div><!--/.row-->
            </div><!--/.box-->
        </div><!--/.container-->
    </section><!--/#services-->





     <?php
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
   
   
   