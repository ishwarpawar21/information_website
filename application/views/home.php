<?php
$res=$this->db->query("select * from  tbl_home_page_settings WHERE id='1'")->row();
if($res)
{

?>
    <section id="main-slider" class="carousel">
        <div class="carousel-inner">

<?php
$cntx=1;
$web_slider=$this->db->query("select * from tbl_website_slider where status='1'  ");
	if($web_slider->result()>0)
	{
		foreach($web_slider->result() as $slide_rows)
		{
?>        
            <div class="item <?php if($cntx==1) { echo 'active'; $cntx=2;} ?>" >
                <div class="container">
                    <div class="carousel-content">
                    	<h1><?=$slide_rows->headings?></h1>
                        <p class="lead"><?=$slide_rows->descriptions?></p>
                    </div>
                </div>
            </div><!--/.item-->
<?php
		}
	}
?>            
           
        </div><!--/.carousel-inner-->
        <a class="prev" href="#main-slider" data-slide="prev"><i class="icon-angle-left"></i></a>
        <a class="next" href="#main-slider" data-slide="next"><i class="icon-angle-right"></i></a>
    </section><!--/#main-slider-->

    <section id="services">
        <div class="container">
            <div class="box first">
                <div class="row">

<?php
	$web_pages=$this->db->query("select * from tbl_info_box where status='1'  ");
	if($web_pages->result()>0)
	{
		foreach($web_pages->result() as $page_rows)
		{
			
?>
					 <div class="col-md-4 col-sm-6">
                        <div class="center">
<?php
	$img_path=FCPATH."assets/dashboard/uploads/info_box/".$page_rows->image_name;
	if(is_file($img_path))
	{
	
?>                    
                            <img class="img-responsive img-thumbnail img-circle" src="<?=base_url()?>assets/dashboard/uploads/info_box/<?=$page_rows->image_name?>" alt="<?=$page_rows->meta_keywords?>"> 
<?php
	}else
	{
?>
	 <img class="img-responsive img-thumbnail img-circle" src="<?=base_url()?>assets/dashboard/uploads/info_box/nop.jpg" alt="<?=$page_rows->meta_keywords?>"> 
<?php		
	}
?>                            
                            
                            <h4><?=$page_rows->headings?></h4>
                            <p><?=$page_rows->short_description?></p>
                        </div>
                    </div><!--/.col-md-4-->
<?php			
		}
	}
?> 
                
                   
                        
                        
                </div><!--/.row-->
            </div><!--/.box-->
        </div><!--/.container-->
    </section><!--/#services-->

<?php
	$img_path=FCPATH."assets/dashboard/uploads/banner.jpg";
	if(is_file($img_path))
	{
		if($res->banner_position=="Top")
		{
		
?>
     <section>
        <div class="container " >
            <div class="box" style="width:100%;padding:0">
            	<img src="<?=base_url()?>assets/dashboard/uploads/banner.jpg" width="100%" height="100">            	
            </div>
       </div>
    </section>
<?php
		}	
	}
?>    
    
    <section id="portfolio">
        <div class="container " >
            <div class="box" style="float: left">
 <?php $web_pages_title=$this->db->query("select * from tbl_home_page_settings where id='1' ")->row();
	if($web_pages_title)
	{           
?>	
              <div class="center">
                    <h2><?=$web_pages_title->lower_title?></h2>
                </div><!--/.center-->   
<?php
   }
	$web_pages=$this->db->query("select * from tbl_lower_infobox where status='1'  ");
	if($web_pages->result()>0)
	{
		foreach($web_pages->result() as $page_rows)
		{
			
?>              
                 <div class="col-md-4">
                 	<h4><?=$page_rows->headings?></h4>
                 	<span><?=$page_rows->short_descriptions?></span>
                 </div>
<?php
		}
	}
?>                 
                 
                    
                 
            </div><!--/.box-->
        </div><!--/.container-->
    </section><!--/#portfolio-->

    
    
    <section id="about-us">
        <div class="container">
            <div class="box">
                <div class="center">
<?php $web_pages_container=$this->db->query("select * from tbl_home_page_settings where id='1' ")->row();
	if($web_pages_container)
	{           
?>	                
                    <h2><?=$web_pages_container->bottom_container_heads?></h2>
                    <p class="lead"><?=base64_decode($web_pages_container->bottom_container_desc)?></p>
<?php
	}
?>                    
                </div>
                <div class="gap"></div>
 
<?php
 	$video_path=FCPATH."assets/dashboard/uploads/video.mp4";
	if(is_file($video_path))
	{
?>
<script src="<?=base_url()?>assets/site/video/jquery.js"></script>
<script src="<?=base_url()?>assets/site/video/mediaelement-and-player.min.js"></script>
<link rel="stylesheet" href="<?=base_url()?>assets/site/video/mediaelementplayer.css" />

<video class="mejs-wmp" width="100%" height="360" src="<?=base_url()?>assets/dashboard/uploads/video.mp4" type="video/mp4" id="player2"  controls="controls" preload="none"></video>

<script>
$('audio,video').mediaelementplayer({
	success: function(player, node) {
		$('#' + node.id + '-mode').html('mode: ' + player.pluginType);
	}
});
</script>
 
<?php		
	}
	
	$res1=$this->db->query("select youtube_link from tbl_website_settings where id='1'")->row();
	if($res1)
	{
		if($res1->youtube_link!='No')
		{

?>

<iframe width="100%" height="315" style="margin-top:10px" frameborder="0" src="http://www.youtube.com/embed/<?=$res1->youtube_link?>">
</iframe>
<?php		
		}
	}
?>

          
                           
            </div><!--/.box-->
        </div><!--/.container-->
    </section><!--/#about-us-->



  <?php
	$img_path=FCPATH."assets/dashboard/uploads/banner.jpg";
	if(is_file($img_path))
	{
		if($res->banner_position=="Bottom")
		{
		
?>
     <section>
        <div class="container " >
            <div class="box" style="width:100%;padding:0">
            	<img src="<?=base_url()?>assets/dashboard/uploads/banner.jpg" width="100%" height="100">            	
            </div>
       </div>
    </section>
<?php
		}	
	}
?>    

 
 

<?php
}
else
{
	echo '<h3 style="color:red">There is some error, Please Contact Administrator</h3>';
}

?>    