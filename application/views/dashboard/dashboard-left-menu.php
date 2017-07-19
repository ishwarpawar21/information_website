	<?php 
	//echo current_url(); echo base_url()."index.php/dashboard/newsletter/ ";
	
	?>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<ul class="nav menu">
			<li <?php if(current_url()==base_url()."index.php/dashboard"){ echo 'class="active"';} ?> ><a href="<?=base_url()?>dashboard"><span class="glyphicon glyphicon-dashboard"></span> <?=$dashboard?></a></li>
			<li <?php if(current_url()==base_url()."index.php/dashboard/website_settings"){ echo 'class="active"';} ?> ><a href="<?=base_url()?>dashboard/website_settings/"><span class="glyphicon glyphicon-cog"></span> <?=$web_setting?></a></li>
			<li <?php if(current_url()==base_url()."index.php/dashboard/website_slider"){ echo 'class="active"';} ?> ><a href="<?=base_url()?>dashboard/website_slider/"><span class="glyphicon glyphicon-picture"></span> <?=$web_slider?></a></li>
			
			<li <?php if(current_url()==base_url()."index.php/dashboard/home_page"){ echo 'class="active"';} ?> ><a  href="<?=base_url()?>dashboard/home_page/"><span class="glyphicon glyphicon-book"></span> <?=$home_page_setting?></a></li>
			
			<li <?php if(current_url()==base_url()."index.php/dashboard/blogs"){ echo 'class="active"';} ?> ><a  href="<?=base_url()?>dashboard/blogs/"><span class="glyphicon glyphicon-book"></span> <?=$blog?> </a></li>
			
			<li <?php if(current_url()==base_url()."index.php/dashboard/news"){ echo 'class="active"';} ?> ><a  href="<?=base_url()?>dashboard/news/"><span class="glyphicon glyphicon-book"></span> <?=$news?></a></li>
			
			
			<li <?php if(current_url()==base_url()."index.php/dashboard/events"){ echo 'class="active"';} ?> ><a  href="<?=base_url()?>dashboard/events/"><span class="glyphicon glyphicon-book"></span> <?=$event?> </a> </li>
			
			<li <?php if(current_url()==base_url()."index.php/dashboard/schedules"){ echo 'class="active"';} ?> ><a  href="<?=base_url()?>dashboard/schedules/"><span class="glyphicon glyphicon-book"></span><?=$appointment?> </a> </li>
			
				<li <?php if(current_url()==base_url()."index.php/dashboard/reservation"){ echo 'class="active"';} ?> ><a  href="<?=base_url()?>dashboard/reservation/"><span class="glyphicon glyphicon-book"></span> <?=$reservation?> </a> </li>
			
			<li <?php if(current_url()==base_url()."index.php/dashboard/website_pages"){ echo 'class="active"';} ?> ><a href="<?=base_url()?>dashboard/website_pages/"><span class="glyphicon glyphicon-book"></span> <?=$web_pages?></a></li>
			
			
						
			<li <?php if(current_url()==base_url()."index.php/dashboard/videos"){ echo 'class="active"';} ?> ><a href="<?=base_url()?>dashboard/videos/"><span class="glyphicon glyphicon glyphicon-facetime-video"></span><?=$video?></a></li>
			
			<li <?php if(current_url()==base_url()."index.php/dashboard/contact_details"){ echo 'class="active"';} ?> ><a  href="<?=base_url()?>dashboard/contact_details/"><span class="glyphicon glyphicon-phone-alt"></span> <?=$contact_details?></a></li>
			

			
			<!--
			
			<li  <?php if(current_url()==base_url()."index.php/dashboard/product_details"){ echo 'class="active"';} ?> ><a href="<?=base_url()?>dashboard/product_details/"><span class="glyphicon glyphicon-shopping-cart"></span> Product Details</a></li>
			<li  <?php if(current_url()==base_url()."index.php/dashboard/product_gallary"){ echo 'class="active"';} ?> ><a href="<?=base_url()?>dashboard/product_gallary/"><span class="glyphicon glyphicon-picture"></span> Product Gallary</a></li>
			<li <?php if(current_url()==base_url()."index.php/dashboard/product_order"){ echo 'class="active"';} ?> ><a href="<?=base_url()?>dashboard/product_order/"><span class="glyphicon glyphicon-usd"></span> Orders</a></li>
			
			!-->
			<li class="parent <?php if(current_url()==base_url()."index.php/dashboard/newsletter_design" || current_url()==base_url()."index.php/dashboard/newsletter"){ echo "active";}?>"  >
				<a href="<?=base_url()?>dashboard/newsletter/">
					<span class="glyphicon glyphicon-pencil"></span> <?=$newsletter?> <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="glyphicon glyphicon-s glyphicon-<?php if(current_url()==base_url()."index.php/dashboard/newsletter_design" || current_url()==base_url()."index.php/dashboard/newsletter"){ echo "minus";}?>"></em></span> 
				</a>
				<ul class="children collapse <?php if(current_url()==base_url()."index.php/dashboard/newsletter_design" || current_url()==base_url()."index.php/dashboard/newsletter"){ echo "in";}?>" id="sub-item-1">
					<li  <?php if(current_url()==base_url()."index.php/dashboard/newsletter"){ echo 'class="active"';} ?> >
						<a class="" href="<?=base_url()?>dashboard/newsletter/">
							<span class="glyphicon glyphicon-share-alt"></span> <?=$sub_user?>
						</a>
					</li>
					<li <?php if(current_url()==base_url()."index.php/dashboard/newsletter_design"){ echo 'class="active"';} ?> >
						<a class="" href="<?=base_url()?>dashboard/newsletter_design/">
							<span class="glyphicon glyphicon-share-alt"></span> <?=$newsletter_design?>
						</a>
					</li>
					 
				</ul>
			</li>
			
			<li <?php if(current_url()==base_url()."index.php/dashboard/website_enquery"){ echo 'class="active"';} ?> ><a href="<?=base_url()?>dashboard/website_enquery/"><span class="glyphicon glyphicon-comment"></span> <?=$web_enq?></a></li>
			  
		</ul>
		<div class="attribution"><?=$designed_by?> <a href="http://www.creowebtech.com/">Creo Webtech</a></div>
	</div><!--/.sidebar-->