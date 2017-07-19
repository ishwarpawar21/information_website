
  

    <section id="contact">
        <div class="container">
            <div class="box">
                <div class="row">
                    <div class="col-sm-4">
                        <h1><?=$newsletter?></h1>
                        <p><?=$newsletter_sub?></p>
                        <div class="status alert alert-success" style="display: none"></div>
                        <form  method="post" >
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="text" name="newsletter_user" id="newsletter_user" class="form-control"   placeholder="<?=$c_email_p?>">
  <?php
	if($this->session->userdata('nl_error_msg'))
	{
		echo '<p>'.$this->session->userdata('nl_error_msg').'</p>';
		if($this->session->userdata("nl_succ_msg")=='1')
		{
			
?>
		<script>
			alert('Thank You for subscribing to us, You will receive news and offer shortly.');
		</script>
<?php		
		}
			$this->session->unset_userdata("nl_succ_msg");
			$this->session->unset_userdata('nl_error_msg');

	}
?> 
                                        <?php echo '<span>'.form_error('newsletter_user').'</span>'; ?>
                                    </div>
                                </div>
                            </div>
 
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="submit" name="btn_newsletter" id="btn_newsletter" class="btn btn-danger btn-lg" style="width: 100%" value="<?=$btn_sub?>" />
                                         
                                    </div>
                                </div>
                            </div>
                            
                        </form>
                    </div><!--/.col-sm-6-->
                    <div class="col-sm-4">
                        
                        <h1><?=$connect_us?></h1>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="social">
                                	
<?php
	$soc_res=$this->db->query("select * from tbl_website_settings where id='1'")->row();
	if($soc_res)
	{
		
?>                                
     <?php if($soc_res->facebook) { ?> <li><a target="_blank" href="<?=$soc_res->facebook?>"><i class="icon-facebook icon-social"></i> Facebook</a></li> <?php } ?>     
     <?php if($soc_res->google_plus) { ?> <li><a target="_blank"  href="<?=$soc_res->google_plus?>"><i class="icon-google-plus icon-social"></i> Google Plus</a></li> <?php } ?> 
      <?php if($soc_res->linkedin) { ?> <li><a target="_blank"  href="<?=$soc_res->linkedin?>"><i class="icon-linkedin icon-social"></i> LinkedIn</a></li> <?php } ?> 
								   	
                                     
<?php
	}
?>                                    
                                
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="social">         
<?php
	$soc_res=$this->db->query("select * from tbl_website_settings where id='1'")->row();
	if($soc_res)
	{	
?>                                
      <?php if($soc_res->twitter) { ?> <li><a  target="_blank" href="<?=$soc_res->twitter?>"><i class="icon-twitter icon-social"></i> Twitter</a></li> <?php } ?> 
      <?php if($soc_res->youtube) { ?> <li><a  target="_blank" href="<?=$soc_res->youtube?>"><i class="icon-youtube icon-social"></i> Youtube</a></li> <?php } ?> 
 
 <?php
	}
?>                                                
                                </ul>
                            </div>
                        </div>
                    </div><!--/.col-sm-6-->
                    
                    <div class="col-sm-4">
                        <h1><?=$contact?></h1>
                        <div class="row">
                            <div class="col-md-12">
                                <address>
                                

<?php
	$res=$this->db->query("select * from tbl_contact_details where id='1'")->row();
	if($res)
	{
?>                                	

                                    <?=$res->address?>
                                     <?php
                                    	if($res->email_id)
                                    	{
											echo '<span class="glyphicon glyphicon-envelope" ></span>';
											echo '<span style="margin:0 20px">'.$res->email_id.'</span><br/><br/>';
										}
                                    ?>
                                    
                                    
                                    <?php
                                    	if($res->phone_no)
                                    	{
											echo '<span class="glyphicon glyphicon-phone-alt" ></span>';
											echo '<span style="margin:0 20px">'.$res->phone_no.'</span>';
										}
                                    ?>
                                    
                                     <?php
                                    	if($res->fax_no)
                                    	{
											echo '<span class="glyphicon glyphicon-print" ></span>';
											echo '<span style="margin-left:20px">'.$res->fax_no.'</span>';
										}
                                    ?>
                                     
<?php
	}
?>                                    
                                
                                 </address>
                            </div>
                           
                        </div>
                         
                    </div><!--/.col-sm-6-->
                </div><!--/.row-->
            </div><!--/.box-->
        </div><!--/.container-->
    </section><!--/#contact-->
<style>
.footer_menu
{
	text-align: center;
	margin-left: 0px !important;
	padding-left: 0px !important;
}
	.footer_menu li
	{
		text-align: center;
		display: inline;
	}
	.footer_menu span
	{
		
		margin: 0 20px;
	}
	
</style>

<section>
<div class="container">

<div class="box last" style="background: #fff">
<div class="row">
                <div class="col-sm-12">
                	<ul class="footer_menu">
                	
<?php
$cnts=0;
	$web_pages=$this->db->query("select * from tbl_website_pages where status='1' and page_position='2' ");
	if($web_pages->result()>0)
	{
		foreach($web_pages->result() as $page_rows)
		{
?>
		<?php if($cnts > 0){ echo '<span>|</span>'; } ?>
	
			<li> <a href="<?=base_url()?>site/site_pages?pg_id=<?=base64_encode(base64_encode(base64_encode($page_rows->id)))?>"> <?=$page_rows->menu_name?> <a></li>
                		
<?php			
$cnts=1;
		}
	}
?> 


                		 
                		
                		
                		
                		
                	</ul>
                </div>
</div>                
            </div>
</div>
</section>
    <footer id="footer">
        <div class="container">
        	<div class="row">
                <div class="col-sm-6">
                    &copy; 2015 <a target="_blank" href="http://www.creowebtech.com/" >SimpleSite.com</a>. All Rights Reserved.
                </div>
                <div class="col-sm-6" style="text-align:right">
                   
                    Designed and Maintained By <a target="_blank"  title="Website development, Android Application Development, ERP Development" href="http://www.creowebtech.com/" ><strong>Creo Webtech </strong></a>. 
                </div>
            </div>
        </div>
    </footer><!--/#footer-->

    <script src="<?=base_url()?>assets/site/js/jquery.js"></script>
    <script src="<?=base_url()?>assets/site/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/site/js/jquery.isotope.min.js"></script>
    <script src="<?=base_url()?>assets/site/js/jquery.prettyPhoto.js"></script>
    <script src="<?=base_url()?>assets/site/js/main.js"></script>
     
</body>
</html>