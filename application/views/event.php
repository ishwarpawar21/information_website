    <section id="Blog" style="padding-top: 30px">
        <div class="container">
            <div class="box" style="padding-top: 0px 30px" >
                <div class="row">
                    <div class="col-md-12 ">
                           
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
.events
{
	margin: 5px 0; 
	border: 1px solid #efefef !important;
	padding: 10px;
	
}
.events th label
{
	padding: 10px 20px;
	color: #4f7dd4;
	
}
.events td label
{
	padding: 10px 20px;
	color: #999;
	
}
.events h3
{
	color: #e1ab1e;	
}
.events p
{
	background: #ddd;
	padding: 5px;
	color: #fff;
}
.set_btn
{
	text-align: center;
	background: #c43cb9;
	color:#fff;
	font-weight: 600;
	font-size: 20px;
	padding: 5px;
	border-radius: 3px;
	
}
.events table { border: 1px solid #ccc; text-align: center;}
.events table tr { border: none;text-align: center;}
.events table tr th{ border: none;background: #efefef;text-align: center;}
</style>                                    

	<div class="row" >
		<h2 align="center" style="display: block">My Events</h2>
<?php
$cnt=1;
	$rec=$this->db->query("select * from tbl_events where status=1");
	if($rec->result()>0)
	{
		foreach($rec->result() as $row)
		{
?>
<div class="col-md-6" > 
			<div class="events">
				<h4>Event <?=$cnt?></h4>
				<table style="width: 100%">
					<tr>
						<th><label>Date</label></th>
						<th><label>Day</label></th>
						<th><label>Location</label></th>
						<th><label>Time</label></th>
					</tr>
					<tr>
						<td><label><?=($row->dd).'-'.($row->mm).'-'.($row->yyyy)?></label></td>
						<td><label><?=$row->day?></label></td>
						<td><label><?=$row->location?></label></td>
						<td><label><?=$row->tyme?></label></td>
						
					</tr>
				</table>
				<h3 align="center"><?=$row->title?></h3>
				<p><?=$row->short_description?></p>
				<a href="#"><div class="set_btn" >Read More</div></a>
				<table style="border:none; width: 100%;text-align: left">
					<tr>
						<td> <i class="icon-home" ></i> <?=$row->address?> </td>
					</tr>
				</table>
			</div>
		</div> 
<?php			
	$cnt++;	}
	}
?>		
		
		
		    
		
		
		
		   
		                   	 
	</div> 
                       
                    </div><!--/.col-md-4-->
                    
                     
                </div><!--/.row-->
            </div><!--/.box-->
        </div><!--/.container-->
    </section><!--/#services-->









 
    
    
    
    
    
    
    
    
     
    