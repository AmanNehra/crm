<?php include('header.php');
include('function.php');
if(isset($_POST['submit'])) {
//echo "<pre>"; print_r ($_REQUEST); die;
 
//Data of work table
$executive_id=$_REQUEST['salseman_id'];
$executive=($_REQUEST['executive']);
$designation=($_REQUEST['designation']);
$venue=($_REQUEST['venue']);
$school=($_REQUEST['school']);
$v_detail=strupp($_REQUEST['v_detail']);
$proposed_date=($_REQUEST['proposed_date']);
$proposed_time=($_REQUEST['proposed_time']);
$resource_person=strupp($_REQUEST['resource_person']);
$subject=($_REQUEST['subject']);
$board=($_REQUEST['board']);
$Schools_invited=strupp($_REQUEST['Schools_invited']);
$participate_teachers=($_REQUEST['participate_teachers']);
$tea=($_REQUEST['tea']);
$lunch=($_REQUEST['lunch']);
$estimated_cost=($_REQUEST['estimated_cost']);
$goal=strupp($_REQUEST['goal']);
$remarks=strupp($_REQUEST['remarks']);
//End of work table data    
   
//Data of rent table
$banners=($_REQUEST['banners']);
$banners_cost=($_REQUEST['banners_cost']);
$marker=($_REQUEST['marker']);
$marker_cost=($_REQUEST['marker_cost']);
$book=($_REQUEST['book']);
$book_cost=($_REQUEST['book_cost']);
$screen=($_REQUEST['screen']);
$screen_cost=($_REQUEST['screen_cost']);
$sound=($_REQUEST['sound']);
$sound_cost=($_REQUEST['sound_cost']);
$tent=($_REQUEST['tent']);
$tent_cost=($_REQUEST['tent_cost']);
$other=($_REQUEST['other']);
$other_cost=($_REQUEST['other_cost']);
$estimated_rent=($_REQUEST['estimated_rent']);
//End of rent table data.

mysql_query("START TRANSECTION");
 $q=mysql_query("INSERT INTO workshop (executive_id,executive, designation,venue, school,v_detail,proposed_date,proposed_time,resource_person,subject,board,Schools_invited,participate_teachers,tea,lunch,estimated_cost,goal,remarks) VALUES ('$executive_id','$executive', '$designation','$venue', '$school','$v_detail','$proposed_date', '$proposed_time','$resource_person','$subject', '$board','$Schools_invited','$participate_teachers', '$tea','$lunch','$estimated_cost', '$goal','$remarks')")or die(mysql_error());
 
 $uid=mysql_insert_id();
 
 $q1=mysql_query("INSERT INTO workshopRent (uid,banners ,banners_cost, marker, marker_cost, book, book_cost, screen, screen_cost, sound, sound_cost, tent, tent_cost, other, other_cost, estimated_rent) VALUES ('$uid','$banners','$banners_cost','$marker','$marker_cost','$book','$book_cost','$screen','$screen_cost','$sound','$sound_cost','$tent','$tent_cost','$other','$other_cost','$estimated_rent')")or die(mysql_error());
   
if($q && $q1) {
  mysql_query("COMMIT");
  header('location:workshop_listing.php');
 }
else
 mysql_query("ROLLBACK");  
}



?>
<!-- start content-outer -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<script>
$(function() {
$( "#proposed_date" ).datepicker();
});
</script>
<script>
function salseman_id_name(id){
	$.ajax({
	  url:"salseman_name.php",
	  type: "POST",
	  data: "id="+id+"&depart="+"SALES",
	  success:function(result){ 
	  var salseman=result.split("#");	 
	 $("#salseman_id").val(salseman[0]);
	 $("#salseman").val(salseman[1]);	
	 $("#desig").val(salseman[2]);
	  }});	
}

function showVenue(val){ 
if(val==""){
  $("#school").hide();
  $("#v_detail").hide();
 }
 
else if(val=="School"){ 
  $("#school").show();
  $("#v_detail").hide();
   $("#v_detail").val("");   
 }
 
else if(val=="Other"){
 $("#school").hide();
  $("#v_detail").show();
  $("#school").val("");
 }
}

function estimatedCost(){
 var tea=$("#tea").val();
 var lunch=$("#lunch").val();
 var cost=parseInt(tea) + parseInt(lunch);
 $("#estimated_cost").val(cost); 
 }
function rent() {  
 var r1=parseInt($("#r1").val());
 var r2=parseInt($("#r2").val());
 var r3=parseInt($("#r3").val());
 var r4=parseInt($("#r4").val());
 var r5=parseInt($("#r5").val());
 var r6=parseInt($("#r6").val());
 var r7=parseInt($("#r7").val());

 if(isNaN(r1)) r1=0; 
 if(isNaN(r2)) r2=0;
 if(isNaN(r3)) r3=0;
 if(isNaN(r4)) r4=0;
 if(isNaN(r5)) r5=0;
 if(isNaN(r6)) r6=0;
 if(isNaN(r7)) r7=0;
  
 var total=(r1+r2+r3+r4+r5+r6+r7);
 $("#estimated_rent").val(total);
 }
</script>
<div id="content-outer">
<!-- start content -->
<div id="content">

<?php if(@($_GET['error'])){?>
<div id="message-red">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="red-left">Error:- <?php echo $_GET['error'];?></td>
					
					<td class="red-right"><a class="close-red"><img src="images/table/icon_close_red.gif"   alt="" /></a></td>
				</tr>
				</table>
	</div><?php } //echo ('<meta http-equiv="refresh" content="0;url=/crm/admin/add_user.php">');?>
				<a href="javascript:goback()" style="color:#FFFFFF;">
				<div id="page-heading">
  <h1>Workshop Voucher </h1>
</div>
				<div class="addin">
    	Back
    </div></a>
<form action="" method="post" enctype="multipart/form-data" id="formid" name="form">
<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
<tr>
	<th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
	<th class="topleft"></th>
	<td id="tbl-border-top">&nbsp;</td>
	<th class="topright"></th>
	<th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
</tr>
<tr>
	<td id="tbl-border-left"></td>
	<td>
	<!--  start content-table-inner -->
	<div id="content-table-inner">
	
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr valign="top">
	<td>
	
	
	
		<!-- start id-form -->
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form"> 
        <tr>
        <th valign="top">Executive Name :</th>
			<td><select  class="inp-form-select" onchange="return salseman_id_name(this.value);" > 
		    
        <?php
		        $user_type1=$_SESSION['user_type'];
				$rt=$_SESSION['SESS_id'];
				if($user_type1==1 || $user_type1==2)
				{
					echo "<option value='' selected='selected'> Plz Select</option>";
			    	$query=mysql_query("SELECT * FROM department_list where `department`='SALES'");
				}
				else
				{
			    	$query=mysql_query("SELECT * FROM department_list where `department`='SALES' and user=$rt");					
				}
			    while($value=mysql_fetch_array($query))
			      {
			  		    
						 $rty=$value['id'];
                                                 $rty1=$value['name'];
			  ?>			  
			     <option <?php if($value['user']==$_SESSION['SESS_id']){ $fd=$value['designation']; echo "selected"; } ?> value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
			  <?php 
			     }   
              ?>
  </select></td><input type="hidden" name="salseman_id" id="salseman_id" value="<?php echo $rty ; ?>" />
                <input type="hidden" name="executive" id="salseman" value="<?php echo $rty1 ; ?>"  />
	     
         <th valign="top">Designation:</th>
			<td><input type="text" class="inp-form" name="designation" id="desig" value="<?php echo $fd; ?>"  readonly=""/></td>   
	   </tr>
	   <tr>
	      <th valign="top">Select Venue:</th>
		  <td><select name="venue" id="venue" onchange="return showVenue(this.value);" class="inp-form-select">
		    <option value="" selected="selected"> Plz Select</option>
			<option value="School" > School</option>
			<option value="Other" > Other</option>
		  </select>
		  </td>
		  <th valign="top">Vanue Detail:</th>
		  <td>
		  <select class="inp-form-select" name="school" id="school" style="display:none">
			<option value="" selected="selected"> Plz Select</option>
			 <?php
			    $query=mysql_query("SELECT name FROM  master_list ORDER BY name ");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option  <?php if($row['school']==$value['name']) echo ' selected="selected"' ;?> value="<?php echo $value['name']; ?>" ><?php echo $value['name']; ?></option>
			  <?php 
			     }   
              ?>
			   </select>
		  <input type="text" class="inp-form" name="v_detail" id="v_detail" style="display:none" />
		  </td>
		 
		 </tr>	
		 
		 <tr>
	      <th valign="top">Proposed Date:</th>
		  <td><input type="text" name="proposed_date" id="datepicker" class="inp-form"/>		   
		  </td>
		  <th valign="top">Proposed Time:</th>
		  <td><input type="text" class="inp-form" name="proposed_time" id="proposed_time" />
		  </td>		 
		 </tr>	
		 
		 <tr>
	      <th valign="top">Resource Person:</th>
		  <td><select class="inp-form-select" name="resource_person" id="resource_person" >
			<option value="" selected="selected"> Plz Select</option>
			 <?php
			    $query=mysql_query("SELECT name FROM  department_list WHERE department = 'AUTHOR' ORDER BY name ");
			    while($value=mysql_fetch_array($query))
			      {			  
			  ?>			  
			     <option  value="<?php echo $value['name']; ?>" ><?php echo $value['name']; ?></option>
			  <?php 
			     }   
              ?>
			   </select>	   
		  </td>
		  <th valign="top">Subject:</th>
		  <td><select class="inp-form-select" name="subject" id="subject" >
			<option value="" selected="selected"> Plz Select</option>
			 <?php
			    $query=mysql_query("SELECT subject FROM subject_master_list ORDER BY subject ");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option  <?php if($row['subject']==$value['subject']) echo ' selected="selected"' ;?> value="<?php echo $value['subject']; ?>" ><?php echo $value['subject']; ?></option>
			  <?php 
			     }   
              ?>
			   </select>
		  </td>		 
		 </tr>	
		 
		  <tr>
	     
		  <th valign="top">Board:</th>
		  <td><select class="inp-form-select" name="board" id="board" >
			<option value="" selected="selected"> Plz Select</option>
			 <?php
			    $query=mysql_query("SELECT name FROM  school_info_list WHERE category = 'BOARD' ORDER BY name ");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option  <?php if($row['board']==$value['name']) echo ' selected="selected"' ;?> value="<?php echo $value['name']; ?>" ><?php echo $value['name']; ?></option>
			  <?php 
			     }   
              ?>
			   </select>
		  </td>
		  <th valign="top">Schools_Invited :</th>	
		  <td>
		    <input type="text" class="inp-form" name="Schools_invited" id="Schools_invited" value="" />
		  </td>	 
		 </tr>
		 <tr>
		 <th valign="top">Participate Teachers :</th>
		 <td><input type="text" class="inp-form" name="participate_teachers" id="participate_teachers" value="" /></td>
		 <th valign="top">Tea :</th>
		 <td><input type="text" class="inp-form" name="tea" id="tea" value="" /></td>
		 
		 </tr>	
    <tr>
        <th valign="top">Lunch/Dinner :</th>
			<td><input type="text" class="inp-form" name="lunch" id="lunch" value="" /></td>
         <th valign="top">Estimated Cost(click to fill):</th>
			<td><input type="text" class="inp-form" name="estimated_cost" placeholder="Click to fill Cost." id="estimated_cost" value="" readonly="" onclick="estimatedCost();" /></td>   
	   </tr>
        <tr>
         <td colspan="4">
		  <table style="width: 100%;margin: 10px 35px 10px 35px;">
		  <tr>
		    <td>Item</td>
			<td>Unit</td>
			<td>Rent</td>
			<td>Item</td>
			<td>Unit</td>
			<td>Rent</td>
		   </tr>
		   
		   <tr>
		    <td>Banners</td>
			<td><input type="text" name="banners" /></td>
			<td> <input type="text" name="banners_cost" id="r1"  /></td>
			<td>Marker</td>
			<td><input type="text" name="marker" /></td>
			<td> <input type="text" name="marker_cost" id="r2"  /></td>
		   </tr>
		   
		   <tr>
		    <td>Display Books</td>
			<td><input type="text" name="book" /></td>
			<td> <input type="text" name="book_cost" id="r3"  /></td>
			<td>Screen</td>
			<td><input type="text" name="screen" /></td>
			<td> <input type="text" name="screen_cost" id="r4"  /></td>
		   </tr>
		   
		   <tr>
		    <td>Sound System</td>
			<td><input type="text" name="sound" /></td>
			<td> <input type="text" name="sound_cost" id="r5"  /></td>
			<td>Tent</td>
			<td><input type="text" name="tent" /></td>
			<td> <input type="text" name="tent_cost" id="r6"  /></td>
		   </tr>
		   
		   <tr>
		    <td>Other</td>
			<td><input type="text" name="other" /></td>
			<td> <input type="text" name="other_cost" id="r7"  /></td>		
		   </tr>
		  </table>		 
		 </td>
        </tr>
	 <tr>
	   <th valign="top">Estimated Rent<br />(Click for fill):</th>
		 <td><input type="text" class="inp-form" name="estimated_rent" id="estimated_rent"  onclick="rent();"value="" placeholder="Click for fill Estimated Rent." readonly="" /></td>
		 <th valign="top">Business Goal/ Expectation /Achieved:</th>
		 <td><input type="text" class="inp-form" name="goal" id="" value="" /></td>
	 </tr>
	 <tr>
	  <tr>

    <th valign="top">   Remarks </th>
    <td colspan="3">
        <textarea class="inp-form" name="remarks" style="height:40px; width:99%"></textarea>
    </td>

   </tr>	
	<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input type="submit" value="" class="form-submit" name="submit" />
			<input type="reset" value="" class="form-reset" onClick="this.form.reset()"  />
		</td>
		<td></td>
	</tr>
	</table>
	<!-- end id-form  -->

	</td>
	<td>

	

</td>
</tr>
<tr>
<td><img src="images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
<td></td>
</tr>
</table>
 
<div class="clear"></div>
 

</div>
<!--  end content-table-inner  -->
</td>
<td id="tbl-border-right"></td>
</tr>
<tr>
	<th class="sized bottomleft"></th>
	<td id="tbl-border-bottom">&nbsp;</td>
	<th class="sized bottomright"></th>
</tr>
</table>
</form>

<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer -->

 

<div class="clear">&nbsp;</div>
<!-- jQuery Form Validation code -->
<?php include('footer.php');?>