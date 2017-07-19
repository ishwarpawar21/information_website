  
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
	font-size: 18px;
	font-weight: 400;
}
.heads
{
	font-size: 18px;
	font-weight: 400;
	color: #999;
}
.vals{
	font-size: 18px;
	font-weight: 800px;
	color: #333;
}
</style>                                    
    <section id="services" style="margin-top: 50px">
        <div class="container">
            <div class="box" >
                <div class="row">
<?php
if(isset($_GET['booking_id']))
{
	$ins=$this->db->query("select * from tbl_booking_appointment where id='".base64_decode(base64_decode(base64_decode(base64_decode($_GET['booking_id']))))."'")->row();	
	if($ins)
	{
		
		$data_vals=array(
			'status'=>'confirmed'
		);
		
		$this->db->where('id',base64_decode(base64_decode(base64_decode(base64_decode($_GET['booking_id'])))));
		$result=$this->db->update('tbl_booking_appointment',$data_vals);
		if($result)
		{
		
?>
				<div class="col-md-12">
					<h3 align="center"><span style="color: green">Congratulations !!! </span>Your appointment has been confirmed Sucessfully</h3>
					<h5 align="center">Following Are your details </h5>
					<div class="col-md-6 col-md-offset-3" style="border: 1px solid #ccc;padding: 10px; margin-top: 10px; margin-bottom: 10px;">
						<table>
							<tr>
								<td style="text-align: right;width: 50%"><label class="heads">Patient Name : </label></td>
								<td style="width: 50%"><label class="vals"> <?=$ins->person_name?></label></td>
							</tr>
							
							<tr>
								<td style="text-align: right"><label class="heads">Contact Email : </label></td>
								<td><label class="vals"> <?=$ins->person_email?></label></td>
							</tr>
							<tr>
								<td style="text-align: right"><label class="heads">Patient Phone : </label></td>
								<td><label class="vals"> <?=$ins->person_phone?></label></td>
							</tr>
							<tr>
								<td style="text-align: right"><label class="heads">Appointment Date : </label></td>
								<td ><label class="vals"> <?=$ins->appointment_date?></label></td>
							</tr>
							<tr>
								<td style="text-align: right"><label class="heads">Appointment Time : </label></td>
								<td><label class="vals"> <?=$ins->appointment_time?></label></td>
							</tr>
							<tr>
								<td style="text-align: right"><label class="heads">Appointment Status : </label></td>
								<td><label class="vals"><span style="color: green"> Confirmed</span></td>
							</tr>
						</table>
					</div>
				</div>
<?php		
		}
		else
		{
			?>
				<div style="min-height:250px;padding-top:75px">
					<h3 align="center" style="color:#ff0000" > Error occurred, Please try again. </h3>
				</div>
			<?php
			
		}
	}
	else
	{
		$emailid=$this->db->query("select for_support as emailid from tbl_website_settings where id = '1'")->row();
	echo '<div style="min-height:250px;padding-top:75px"><p style="text-align: center;"><span class="comment_err"><h3 align="center" style="color:#ff0000">Invalid Booking Id or Booking has been expired. </h3><br/><p style="text-align: center;"> Please contact us at <a href="mailto:'.$emailid->emailid.'">'.$emailid->emailid.'</a></p> </span></p></div>';
	}
}
else
{
	$emailid=$this->db->query("select for_support as emailid from tbl_website_settings where id = '1'")->row();
	echo '<div style="min-height:250px;padding-top:75px"><p style="text-align: center;"><span class="comment_err"><h3 align="center" style="color:#ff0000">Invalid Booking Id or Booking has been expired. </h3><br/><p style="text-align: center;"> Please contact us at <a href="mailto:'.$emailid->emailid.'">'.$emailid->emailid.'</a></p> </span></p></div>';
}

?>               
                   
                     
                </div><!--/.row-->
            </div><!--/.box-->
        </div><!--/.container-->
    </section><!--/#services-->
 
    
