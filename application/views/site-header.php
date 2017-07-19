<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Simple Site</title>
    <link href="<?=base_url()?>assets/site/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/site/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/site/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/site/css/main.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
<!--    
<style>
.navbar-default .navbar-nav > li.active > a,
.navbar-default .navbar-nav > li.active:focus > a,
.navbar-default .navbar-nav > li.active:hover > a,
.navbar-default .navbar-nav > li:hover > a,
.navbar-default .navbar-nav > li:focus > a,
.navbar-default .navbar-nav > li.active > a:focus,
.navbar-default .navbar-nav > li.active:focus > a:focus,
.navbar-default .navbar-nav > li.active:hover > a:focus,
.navbar-default .navbar-nav > li:hover > a:focus,
.navbar-default .navbar-nav > li:focus > a:focus {
  background-color: #c43cb9;
  color: #fff;
}
</style>    
-->

<!--Start of Zopim Live Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){
z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
$.src='//v2.zopim.com/?3N2ckL2M7Fx22CesbQVTVTDane4jUSqC';z.t=+new Date;$.
type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
</script>
<!--End of Zopim Live Chat Script-->


</head><!--/head-->

<body data-spy="scroll" data-target="#navbar" data-offset="0">
    <header id="header" role="banner">
        <div class="container">
            <div id="navbar" class="navbar navbar-default">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
<?php
	$img_path=FCPATH."assets/dashboard/uploads/logo.png";
	if(is_file($img_path))
	{
?>
  		<a class="navbar-brand" href="<?=base_url()?>site/"><img src="<?=base_url()?>assets/dashboard/uploads/logo.png?<?=time()?>"/></a>
<?php	
	}
	else
	{
?>
  		<a class="navbar-brand" href="<?=base_url()?>site/"><img src="<?=base_url()?>assets/site/images/logo.png?>"/></a>
<?php		
	}
?>                    
                  
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a onclick='window.location = "<?=base_url()?>site/"' ><i class="icon-home"></i></a></li>
<?php
	$web_pages=$this->db->query("select * from tbl_website_pages where status='1' and page_position='1' ");
	if($web_pages->result()>0)
	{
		foreach($web_pages->result() as $page_rows)
		{
?>
			<li><a onclick='window.location = "<?=base_url()?>site/site_pages?pg_id=<?=base64_encode(base64_encode(base64_encode($page_rows->id)))?>"'><?=$page_rows->menu_name?></a></li>
<?php			
		}
	}

$res=$this->db->query("select count(id) as count from tbl_blogs where status='1'");
if($res->result()>0)
{
?>                        
    	<li><a onclick='window.location = "<?=base_url()?>site/blogs"' >Blogs</a></li>
<?php
}

$res=$this->db->query("select count(id) as count from tbl_news where status='1'");
if($res->result()>0)
{
?>                        
    	<li><a onclick='window.location = "<?=base_url()?>site/news"' >News</a></li>
<?php
}

$res=$this->db->query("select count(id) as count from tbl_events where status='1'");
if($res->result()>0)
{
?>                        
    	<li><a onclick='window.location = "<?=base_url()?>site/events"' >Events</a></li>
<?php
}

$res=$this->db->query("select display_schedule as ds from tbl_website_settings where id='1'")->row();
if($res->ds=='Yes')
{
?>                        
    	<li><a onclick='window.location = "<?=base_url()?>site/schedule"' >Schedule</a></li>
<?php
}

?>                     
                        <li><a onclick='window.location = "<?=base_url()?>site/contact"' >Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <a href="<?=current_url()?>?ln=en">English</a>
        <a href="<?=current_url()?>?ln=du">Dutch</a>
				
    </header><!--/#header-->
