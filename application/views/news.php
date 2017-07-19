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
                         
                            <h1 align="center">News / Events </h1>
                            
                           
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
	$res=$this->db->query("select * from tbl_news where status='1' ORDER BY news_date");
	if($res->num_rows()>0)
	{
		foreach($res->result() as $rows)
		{
?>

                       		<div class="row news">
                       		
                       			<div class="col-md-12">
                       				<div class="col-md-4">
<?php
	$img_path=FCPATH.'assets/dashboard/uploads/news/'.$rows->image_name;
	if(file_exists($img_path))
	{
?>
		<img src="<?=base_url()?>assets/dashboard/uploads/news/<?=$rows->image_name?>" class="img-responsive" style="margin: 0 auto" />
<?php		
	}
	else
	{
?>
		<img src="<?=base_url()?>assets/dashboard/uploads/no_img.jpg" class="img-responsive" style="margin: 0 auto" />
<?php		
	}
?>                       				
        
                       				</div>
                       				<div class="col-md-8">
                       					<h3 style="margin-top: 10px" ><?=$rows->title?></h3>	
                       					<span>Date : <?=$rows->news_date?></span>
                       					<p><?=base64_decode($rows->description)?></p>
                       				</div>
                       			</div>
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
   
   
   