  
<style>
.comment_suc
{
	color:green;
	font-size: 18px;
	font-weight: 400;
	text-align: center;
}

.comment_err
{
	color:red;
	font-size: 14px;
	font-weight: 600;
}
.errorrs
{
	font-size: 12px;
	font-weight: normal;
	color: #ff0000;
}
</style>                                    
    <section id="services" style="margin-top: 30px">
        <div class="container">
            <div class="box" >
                <div class="row">
<?php
	if($this->session->userdata('comment_msg'))
	{
		echo '<p style="text-align: center;">'.$this->session->userdata('comment_msg').'</p>';
		$this->session->unset_userdata('comment_msg');
	}
?>               
                    <div class="col-md-8 ">
                    	<h3>Appointment Schedule</h3>
                    	<!--<iframe src="1.html" width="100%" height="600" frameborder="no" scrolling="no" ></iframe>-->
                    	<iframe src="<?=base_url()?>site/calender_display" frameborder="no" width="100%" height="800" scrolling="no"></iframe>
                    </div><!--/.col-md-4-->
                    
                    <div class="col-md-4 ">
                     
                    <form method="post" >
                    
                    	<h3>Book Appointment</h3>
                    	<label>Appointment Date </label>
                    	<select name="appointment_date" id="appointment_date" class="form-control">
                    		<option value>Select Appointment Date</option>
<?php

	$ins=$this->db->query("select * from tbl_schedule where start_date >='".date("Y-m-d")."' GROUP BY start_date ");
	
	if($ins->result()>0)
	{
		foreach($ins->result() as $row)
		{
?>
			<option value="<?=$row->start_date?>"><?=$row->start_date?></option>
<?php			
		}
	} 
?>                		
                    		 
                    	</select>
                    	<?php echo '<span class="errorrs">'.form_error('appointment_date').'</span>';?>
                    	
                    	<label>Appointment Timing</label>
                    	<select name="appointment_time" id="appointment_time" class="form-control">
                    		<option value>Select Appointment Date</option>
                    	</select>
                    	<?php echo '<span class="errorrs">'.form_error('appointment_time').'</span>';?>
                    	<label>  Name :</label>
                    	<input type="text" required="" name="person_name" id="person_name" class="form-control" placeholder="Please Enter Your name" value="<?=set_value('person_name')?>"/>
                    	<?php echo '<span class="errorrs">'.form_error('person_name').'</span>';?>
                    	
                    	<label> Email :</label>
                    	<input type="email" required="" name="person_email" id="person_email" class="form-control" placeholder="Please Enter Your Email" value="<?=set_value('person_email')?>"/>
                    	<?php echo '<span class="errorrs">'.form_error('person_email').'</span>';?>
                    	
                    	<label> Phone :</label>
                    	<input type="text" class="form-control" name="person_phone" id="person_phone" placeholder="Please Enter Your Phone No" value="<?=set_value('person_phone')?>"/>
                    	<?php echo '<span class="errorrs">'.form_error('person_phone').'</span>';?>
                    	<div class="form-group">
                    		
                    	</div>
                    	<div class="col-sm-12" style="padding-left:0px;padding-right:0px">
                             <div class="form-group">
                                  <input type="submit" name="btn_book_now" class="btn btn-danger btn-lg" style="width: 100%" value="Book Appointment Now"/>
                             </div>
                        </div>
                    </form>	
                    </div><!--/.col-md-4-->
                    
                     
                </div><!--/.row-->
            </div><!--/.box-->
        </div><!--/.container-->
    </section><!--/#services-->

 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js" type="text/javascript"></script>  

     <script>
$(document).ready(function($) {
  var list_target_id = 'appointment_time'; //first select list ID
  var list_select_id = 'appointment_date'; //second select list ID
  var initial_target_html = '<option value="">Please select a Appointment Date...</option>'; //Initial prompt for target select
 
  $('#'+list_target_id).html(initial_target_html); //Give the target select the prompt option
 
  $('#'+list_select_id).change(function(e) {
    //Grab the chosen value on first select list change
    var selectvalue = $(this).val();
 
    //Display 'loading' status in the target select list
    $('#'+list_target_id).html('<option value="">Loading...</option>');
 
    if (selectvalue == "") {
        //Display initial prompt in target select if blank value selected
       $('#'+list_target_id).html(initial_target_html);
    } else {
      //Make AJAX request, using the selected value as the GET
      $.ajax({url: '<?=base_url()?>site/get_appointment_time?svalue='+selectvalue,
             success: function(output) {
                $('#'+list_target_id).html(output);
            },
          error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status + " "+ thrownError);
          }});
        }
    });
});

</script>	
    
