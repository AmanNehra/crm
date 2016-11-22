<?php
session_start();
include('header.php');
include('function.php');

if(isset($_SESSION['tour_session']))
 {
  $uid=$_SESSION['tour_session'];   
  $que12=mysql_query("SELECT * FROM tour WHERE id='$uid'");
  $dat12=mysql_fetch_array($que12);
  //echo '<pre>'; print_r($dat12); die;
  $executive=$dat12['executive'];
  $designation=$dat12['designation'];
  $from_date=$dat12['from_date'];
  $to_date=$dat12['to_date'];
  $advance=$dat12['advance'];  
 }

if(isset($_POST['submit'])) {
//echo "<pre>"; print_r ($_REQUEST); die;
if(!isset($_SESSION['tour_session']))
  { 
$executive_id=$_REQUEST['salseman_id'];
$executive=strupp($_REQUEST['executive']);
$designation=strupp($_REQUEST['designation']);
$from_date=strupp($_REQUEST['from_date']);
$to_date=strupp($_REQUEST['to_date']);
$advance=strupp($_REQUEST['advance']);

 $sql=mysql_query("INSERT INTO tour (executive_id,executive, designation,from_date, to_date,advance,advance_balance) VALUES ('$executive_id','$executive', '$designation','$from_date', '$to_date','$advance','$advance')")or die(mysql_error());
      

$uid=mysql_insert_id();
$_SESSION['tour_session']=$uid;

}
for($i=1;$i<=7;$i++)
  {
   $date=$_REQUEST['date_'.$i];
   $station=$_REQUEST['station_'.$i];
   $purpose=$_REQUEST['purpose_'.$i];
   $remarks=$_REQUEST['remarks_'.$i];
   if($date!="" && $station!="" && $purpose!=""){
      
	  mysql_query("INSERT INTO tour_detail (uid,date,city,purpose,remarks) VALUES ('$uid','$date','$station','$purpose','$remarks')");
   
    }
  }
  
}

if(isset($_REQUEST['finish'])){
 
  unset($_SESSION['tour_session']);
  
  $uid="";  $executive=""; $designation=""; $from_date=""; $to_date=""; $advance="";
  header('location:tour_voucher_listing.php');
}
?>
<!-- start content-outer -->

 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<script>
$(function() {
$( "#1" ).datepicker({
dateFormat: 'yy-mm-dd',
changeMonth: true,
changeYear: true
});
$( "#2" ).datepicker({
dateFormat: 'yy-mm-dd',
changeMonth: true,
changeYear: true
});
$( "#3" ).datepicker({
dateFormat: 'yy-mm-dd',
changeMonth: true,
changeYear: true
});
$( "#4" ).datepicker({
dateFormat: 'yy-mm-dd',
changeMonth: true,
changeYear: true
});
$( "#5" ).datepicker({
dateFormat: 'yy-mm-dd',
changeMonth: true,
changeYear: true
});
$( "#6" ).datepicker({
dateFormat: 'yy-mm-dd',
changeMonth: true,
changeYear: true
});
$( "#7" ).datepicker({
dateFormat: 'yy-mm-dd',
changeMonth: true,
changeYear: true
});
});
</script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
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

$(function() {
$( "#from_date" ).datepicker();
});
$(function() {
$( "#to_date" ).datepicker();
});
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
  <h1>Tour Voucher </h1>
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
			  			
						$rty=$value['id']
			  ?>			  
			     <option <?php if($value['user']==$_SESSION['SESS_id']){ $fd=$value['designation']; echo "selected"; } ?> value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
			  <?php 
			     }   
              ?>
  </select></td><input type="hidden" name="salseman_id" id="salseman_id" />
                <input type="hidden" name="executive" id="salseman" />
	     
         <th valign="top">Disignation:</th>
			<td><input type="text" class="inp-form" value="<?php echo $fd; ?>" name="designation" id="desig"  readonly=""/></td>   
	   </tr>
    <tr>
        <th valign="top">Plan date from :</th>
			<td><input type="text" class="inp-form" name="from_date" id="datepicker" value="<?php echo $from_date; ?>" /></td>
         <th valign="top">to:</th>
			<td><input type="text" class="inp-form" name="to_date" id="datepicker1" onclick="show()" value="<?php echo $to_date; ?>" /></td>   
	   </tr>
        <tr>
        <th valign="top">Tour Advance :</th>
			<td><input type="text" class="inp-form" name="advance"  value="<?php echo $advance; ?>" id="advance"/></td>
         <th valign="top">&nbsp;</th>
			<td>&nbsp;</td>
        </tr>
	   <tr>
	    <td colspan="4">
		 <table style="border:solid 2px #333333; width:100%; margin:10px; padding:10px;">
		  <tr>
		   <td>S.NO</td>
		   <td>Date</td>
		   <td>Name of Station </td>
		   <td>Purpose</td>
		   <td>Remarks</td>
		  </tr>
		  <?php for($i=1;$i<=7; $i++){  ?>
		  <tr>
		   <td><input type="text" class="inp-form" name="" id="" value="<?php echo $i; ?>"  style="width:80px"/></td>
		   <td><input type="text" class="inp-form" name="date_<?php echo $i; ?>" id="<?php echo $i; ?>" value="" style="width:150px"/></td>
		   <td><select name="station_<?php echo $i; ?>" id="city" class="inp-form-select" > 
			<option value="" selected="selected"> Plz Select</option>
      <?php			    
			    $query=mysql_query("SELECT city,district,state FROM location_maste_info_list order by city");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option  <?php if($row['city']==$value['city']) echo ' selected="selected"' ;?> value="<?php echo $value['city']; ?>"><?php echo $value['city']."&nbsp;&nbsp;&nbsp;&nbsp;".$value['district']."&nbsp;&nbsp;&nbsp;&nbsp;".$value['state']; ?></option>
			  <?php 
			     }
			  ?>
        </select>		   
		   </td>
		   <td><input type="text" class="inp-form" name="purpose_<?php echo $i; ?>" id="" value=""style="width:200px" /></td>
		   <td><input type="text" class="inp-form" name="remarks_<?php echo $i; ?>" id="" value="" style="width:200px" /></td>		  
		  </tr>
		 <?php  } ?>
		 </table>
		
		
		</td>
	   
	   </tr>
	<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input type="submit" value="" class="form-submit" name="submit" />
			<input type="reset" value="" class="form-reset" onClick="this.form.reset()"  />
		</td>
		<td></td>
		<td><input type="submit" value="Finish" class="form-finish" name="finish" style="float:right"/></td>
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
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.8/jquery.validate.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
$("#formoid").validate({
errorElement: 'div',
rules:{
    "city":{
    required: true,     
    },
"district":{
required:true,
},

    "state":{
    required: true,     
    },
    "country":{
    required: true,     
    },

    "pin":{
    required: true,   
        
    },

    "std":{
    required: true,     
    }

},
messages: {
    city:{
                 required: "Enter city name",                
    },
    district:{
                 required: "Enter district name",                
    },
    state:{
                 required: "Enter state name",                
    },
    country:{
                 required: "Enter country name",                
    },
    pin:{
                 required: "Enter pincode name",                            
    },

     std: {
                required: "Enter stdcode",
                
                }
    }
  });  
 });
 </script>

<!-- start content-outer -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<script>
$(function() {
$( "#datepicker_rv" ).datepicker();
});
$(function() {
$( "#ref_date" ).datepicker();
});
$(function() {
$( "#approval_date" ).datepicker();
});
$(function() {
$( "#commitment_date" ).datepicker();
});
</script>
<script>
function showprincipal(id){ 
$.ajax({
  url:"show_principal_data.php",
  type: "POST",
  data: "id="+id,
  success:function(result){ 
  var result=result.split("#"); 
   $("#principal").val(result[5]);
   var contact=result[1];
   if(result[2]!="")
     {
	  contact=contact+","+result[2];	 
	 }
   if(result[3]!="")
     {
	  contact=contact+","+result[2];
	 }	
   $("#address").val(result[0]);
   $("#contact").val(contact);    
  }}); 
  showgiven(id);
}
function showgiven(id){
$.ajax({
  url:"show_teacher_data.php",
  type: "POST",
  data: "id="+id,
  success:function(result){
  $("#teacherdiv").html(result);
   }});
}
</script>
<!--  end content-outer -->
<div class="clear">&nbsp;</div>
<script type="text/javascript">           
  $(document).ready(function() {

 //alert('hello');
 jQuery.validator.addMethod("lettersonly", function(value, element) {
  return this.optional(element) || /^[a-z]+$/i.test(value);
}, "Letters only please");

	$('#formoid').validate(
	{	
		//alert('hello');
		rules:
		{
			"user_name":
			{
				required:true,
				/*lettersonly:true,*/
				remote:'check.php',
			},
			
			"email12":
			{
				required:true,
				email:true,
				
			},
			"address":
			{
				required:true
			},
			"address":
			{
				required:true
			},
			
			
			"route":
			{
				required:true
				 
			},
						
		},
		messages:
		{
			"user_name":
			{
				required:'This field is required.',
				remote:'Username Already Exists.',
			},
			
			"email":
			{
				required:'This field is required.',
				email:'Please enter valid email.',
				
			},
			"password":
			{
				required:'This field is required.',
			},
			"address":
			{
				required:'This field is required.',
			},
			
			"phone":
			{
				required:'This field is required.',
				number:'Please enter a valid phone no.'
			},
			
			
		}
	});
	}); 
	</script>
<?php include('footer.php');?>
