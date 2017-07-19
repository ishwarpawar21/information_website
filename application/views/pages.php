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


<?php
	
	$res=$this->db->query("select * from tbl_website_pages where id = '".base64_decode(base64_decode(base64_decode($_GET['pg_id'])))."'")->row();
	if($res)
	{
 
?>
<section id="services" <?php if($margin_top_fg==0) echo 'style="margin-top:75px;"' ?>>
        <div class="container">
            <div class="box" >
                <div class="row">
                    <div class="col-md-12 ">
                            <h1 align="center"><?=$res->page_title?></h1>
                            <p><?=$res->page_content?></p>
                    </div><!--/.col-md-4-->
                </div><!--/.row-->
            </div><!--/.box-->
        </div><!--/.container-->
    </section><!--/#services-->

<?php
}

$res=$this->db->query("select * from  tbl_home_page_settings WHERE id='1'")->row();
if($res)
{
 
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
}	
?>   