<style>
.setbutton{
	padding: 8px 20px;
  font-size: 1em;
  font-weight: bold;
  font-family: Arial, "Helvetica Neue", "Helvetica", Tahoma, Verdana, sans-serif;
  border: 1px solid rgba(0,0,0,0.1);
  box-shadow: inset 0 1px 0 rgba(255,255,255,0.7);
  background: #3f4040;
  color: #fff;
  text-shadow: 0 1px 0 rgba(0, 0, 0, 0.4);
  -webkit-box-shadow: 0 1px rgba(255, 255, 255, 0.2) inset, 0 2px 2px -1px rgba(0, 0, 0, 0.3);
  -moz-box-shadow: 0 1px rgba(255,255,255,0.2) inset, 0 2px 2px -1px rgba(0,0,0,0.3);
  box-shadow: 0 1px rgba(255, 255, 255, 0.2) inset, 0 2px 2px -1px rgba(0, 0, 0, 0.3);
  -moz-border-radius: 3px;
  -webkit-border-radius: 3px;
  border-radius: 3px;
  margin: 10px 0;
  
  }
</style>
        
				<div class="rightsidebar span_3_of_1">
					 <div class="community-poll">
    					<h2>Newsletters Signup</h2>
    						<p>Subscribe yourself for our newsletter and receive daily great deals</p>
    						
						   <div class="poll">
      				 			<form method="POST">
      				 				<input type="email" name="newsletter_user" placeholder="Enter Your Email Id" style="padding: 10px 5px; width: 95%" required="" />
<?php
	if($this->session->userdata('nl_error_msg'))
	{
		echo '<p>'.$this->session->userdata('nl_error_msg').'</p>';
		$this->session->unset_userdata('nl_error_msg');
	}
?>      				 				
      				 				<input type="submit" name="btn_newsletter" class="setbutton"/>
      				 			</form>
      				 		</div>
      				</div>
      				 <div class="community-poll">
      				 	<h2>Advertise here</h2>
      				 	<div class="poll" style="background: #efefef;min-height: 200px">
      				 	
      				 	</div>
      				 </div>
 				</div>
 		</div>
 	</div>
  </div>
 </div>