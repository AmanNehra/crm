<?php include('header.php');
include('function.php');
$id=convert_uudecode(base64_decode($_REQUEST['id']));

if(isset($_POST['submit'])) {
//echo "<pre>"; print_r ($_REQUEST); die;
$rno=$_REQUEST['rno'];
$branch_city=strupp($_REQUEST['branch_city']);
$executive=strupp($_REQUEST['executive']);
$designation=strupp($_REQUEST['designation']);
$entry_date=strupp($_REQUEST['entry_date']);
$advance_bal=strupp($_REQUEST['advance_bal']);
$remarks=strupp($_REQUEST['remarks']);
$visited=strupp($_REQUEST['visited']);
$from=strupp($_REQUEST['from']);
$to=strupp($_REQUEST['to']);
$trans_mode=strupp($_REQUEST['trans_mode']);
$km=strupp($_REQUEST['km']);
$amount=strupp($_REQUEST['amount']);
$transport_all_details=$_REQUEST['transport_all_details'];
$da=strupp($_REQUEST['da']);
$bord=strupp($_REQUEST['bord']);
$food=strupp($_REQUEST['food']);
$a25=strupp($_REQUEST['a25']);
$a26=strupp($_REQUEST['a26']);
$tel=strupp($_REQUEST['tel']);
$sta=strupp($_REQUEST['sta']);
$xer=strupp($_REQUEST['xer']);
$cor=strupp($_REQUEST['cor']);
$int=strupp($_REQUEST['int']);
$paper=strupp($_REQUEST['paper']);
$leave=strupp($_REQUEST['leave']);
$other=strupp($_REQUEST['other']);
$leave=strupp($_REQUEST['leave']);
$buulty=strupp($_REQUEST['buulty']);


$a25=strupp($_REQUEST['a25']);
$a26=strupp($_REQUEST['a26']);
$food=strupp($_REQUEST['food']);
$executive_id=$executive;

$q=mysql_query("SELECT * FROM department_list where id='$executive'");
$d=mysql_fetch_array($q);
$executive=$d['name'];

$q=mysql_query("UPDATE expense SET  branch='$branch_city',executive_id='$executive_id',executive_name='$executive',designation='$designation',report_date='$entry_date',advance='$advance_bal',remarks='$remarks',town_visited='$visited',source='$from',destination='$to',mode='$trans_mode',km='$km',total_amount='$amount',transport_all_details='$transport_all_details',da='$da',boarding='$bord',fooding='$food',a25='$a25',a26='$a26',tel='$tel',stationary='$sta',xerox='$xer',courier='$cor',internet='$int',paper='$paper',leaves='$leave',others='$other',buulty='$buulty'  WHERE id='$id'") or die(mysql_error());
//echo "<pre>";
//print_r($_REQUEST);

  $a155=strupp($_REQUEST['a155']);
  $ttt=$a155-$amount;
 //exit;
 $sq=mysql_query("UPDATE tour SET advance='$ttt' where executive_id='$executive_id'"); 
 
 
if($q)
  header("location:expense_master_listing.php"); 
}
$grand_total=0;
$query=mysql_query("SELECT * FROM expense WHERE id='$id'");
$row=mysql_fetch_assoc($query);
//Code for grand Total

$date1 = date("Y-m-d",strtotime($row['date']));
$date2 = date("Y-m-d");
$diff = abs(strtotime($date2) - strtotime($date1));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
//if()
	
$grand_total+=$row['total_amount'];
$grand_total+=$row['da'];
$grand_total+=$row['boarding'];
$grand_total+=$row['fooding'];
$grand_total+=$row['a25'];
$grand_total+=$row['a26'];
$grand_total+=$row['tel'];
$grand_total+=$row['stationary'];
$grand_total+=$row['xerox'];
$grand_total+=$row['courier'];
$grand_total+=$row['internet'];
$grand_total+=$row['others'];
$grand_total+=$row['buulty'];

//End of Grand Total
//echo '<pre>'; print_r($row); die;

?>
<script>
function sum3(val)
    {		
        var a1,a2,a3,a4,a5,a6,a7,a8,a9,a10,a11,a12,a25,a26;

        a1=parseFloat(document.getElementById("a3").value);
        a2=parseFloat(document.getElementById("a4").value);
        a3=parseFloat(document.getElementById("a5").value);
	    a4=parseFloat(document.getElementById("a6").value);
        a5=parseFloat(document.getElementById("a7").value);
        a6=parseFloat(document.getElementById("a8").value);
	    a7=parseFloat(document.getElementById("a9").value);
        a8=parseFloat(document.getElementById("a10").value);
        a11=parseFloat(document.getElementById("a13").value);
        a12=parseFloat(document.getElementById("a14").value);	
		a25=parseFloat(document.getElementById("a25").value);
        a26=parseFloat(document.getElementById("a26").value);	
		if(document.getElementById("a3").value == '')
		{
			a1=0;
		}
		if(document.getElementById("a4").value == '')
		{
			a2=0;
		}
		if(document.getElementById("a5").value == '')
		{
			a3=0;
		}
		if(document.getElementById("a6").value == '')
		{
			a4=0;
		}
		if(document.getElementById("a7").value == '')
		{
			a5=0;
		}
		if(document.getElementById("a8").value == '')
		{
			a6=0;
		}
		if(document.getElementById("a9").value == '')
		{
			a7=0;
		}
		if(document.getElementById("a10").value == '')
		{
			a8=0;
		}
		if(document.getElementById("a13").value == '')
		{
			a11=0;
		}
		if(document.getElementById("a14").value == '')
		{
			a12=0;
		}
		if(document.getElementById("a25").value == '')
		{
			a25=0;
		}
		if(document.getElementById("a26").value == '')
		{
			a26=0;
		}
		var abc,a13;			  
		abc=a1+a2+a3+a4+a5+a6+a7+a8+a11+a25+a12+a26;
		a13=document.getElementById("advance_bal").value;  		
		document.getElementById("a155").value=parseFloat(a13)-parseFloat(abc);
    }
	
	
	function sum4(val)
    {
        var a11,a22;
		//alert('hi');

        a11=parseFloat(document.getElementById("Start").value);
        a22=parseFloat(document.getElementById("End").value);
		
		if(document.getElementById("Start").value == '' || document.getElementById("End").value == '')
		{
			document.getElementById("km").value=0;
		}		
		else if(a11 > a22)
		{
			document.getElementById("km").value=0;
		}
		else
		{
			var abc;			  
			abc=a22-a11;
			document.getElementById("km").value=abc;
		}
    }
    </script>
<!-- start content-outer -->

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

<div id="page-heading">
  <h1>Edit Expense Master Information</h1>
  <h4 style="color:red" align="center"><?php echo $error;?></h4>

</div>
<a href="javascript:goback()" style="color:#FFFFFF;"><div class="addin">
    	Back
    </div></a>
<form action="" method="post" enctype="multipart/form-data" id="formoid" name="form">
<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
<tr>
	<th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
	<th class="topleft" style="height: 34px"></th>
	<td id="tbl-border-top" style="height: 34px"></td>
	<th class="topright" style="height: 34px"></th>
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
        <th valign="top">Report NO:</th>
			<td><input type="text" class="inp-form" name="rno" value="<?php echo $row['report_no']; ?>" readonly="" /></td>
	    <th valign="top">Branch Office:</th>
			<td>
			  <select name="branch_city" id="city" class="inp-form-select" > 
			<option value="" selected="selected"> Plz Select</option>
      <?php			    
			    $query=mysql_query("SELECT id,city,district,state FROM location_maste_info_list order by city");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option <?php if($row['branch']==$value['city']) echo 'selected="selected"';  ?> value="<?php echo $value['city']; ?>"><?php echo $value['city']."&nbsp;&nbsp;&nbsp;&nbsp;".$value['district']; ?></option>
			  <?php 
			     }			     
 
              ?>
  </select>
			<input type="hidden" class="inp-form" name="branch_dis" value="" id="district" readonly="readonly"/>         </td>          
	   </tr>
	   <tr>
        <th valign="top">Executive Name:</th>
			<td>
			<select name="executive" id="exe" class="inp-form-select"  onchange="showdesignation(this.value)" > 
		   <!--  <option value="" selected="selected"> Plz Select</option> -->
        <?php
			    $query=mysql_query("SELECT * FROM department_list");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option <?php if($row['executive_name']==$value['name']) echo 'selected="selected"'; else echo 'style="display:none"';  ?> value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
			  <?php 
			     }   
              ?>
        </select>			</td>
	    <th valign="top">Designation:</th>
			<td><input type="text" class="inp-form" name="designation" id="designation" value="<?php echo $row['designation']; ?>" readonly="" /></td>          
	   </tr>
		<tr>
						
		 <th valign="top">Date:</th>
		  <td> <input type="text" class="inp-form" id="datepicker" name="entry_date" value="<?php echo $row['report_date'];  ?>" onChange="show13(this.value)"/></td> 
        <th valign="top">Tour Advance  Bal Rs:</th>			
			<td> <input type="text" class="inp-form" name="advance_bal" id="advance_bal" value="<?php echo $row['advance']; ?>" readonly="readonly"/></td>  
	   </tr>	   
	  
	    <tr id="d11" >
		  <th valign="top">Town Visited:</th>
			<td><input type="text" class="inp-form"  value=" <?php echo $row['town_visited']; ?>" name="visited" /></td>
	            <!--<th valign="top">Remaining advance :</th>-->
			<td><input type="hidden" class="inp-form" name="a155" id="a155"  value="0" readonly="readonly"/></td> 
		</tr>	   	
        <tr id="d12" >
        <th valign="top">From:</th>
			<td><input type="text" class="inp-form" name="from" value="<?php echo $row['source']; ?>"  /></td>
          <th valign="top">To:</th>
			<td><input type="text" class="inp-form" name="to" value="<?php echo $row['destination']; ?>"  /></td> 
	   </tr>	  
	   
	   <tr id="d21" >
	    <th valign="top" id="trans">Mode Of Transport:</th>
			<td>			
			<select name="trans_mode" class="inp-form-select" id="tr11" >
       
		    <option value="" selected="selected"> Plz Select</option>
        <?php
			    $query=mysql_query("SELECT * FROM expense_list WHERE parent='MODE OF TRANSPORT'");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option  value="<?php echo $value['head']; ?>"><?php echo $value['head']; ?></option>
			  <?php 
			     }   
              ?>
  </select>
					</td>	
        <th valign="top" id="unit" >KM:</th>
			<td><input type="text" class="inp-form"  id="km" name="km"/></td>
	   </tr>
              <tr>      
      <th valign="top">Start Meter:</th>
			<td><input type="text" class="inp-form" name="Start" id="Start" value="0" onChange="sum4(this.value),show14(this.value)" /></td>
          <th valign="top">End Meter:</th>
			<td><input type="text" class="inp-form" name="End" id="End" value="0" onChange="sum4(this.value),show14(this.value)" /></td> 
	   </tr>
	  <tr id="d22" >
	    <th valign="top">Amount:</th>
			<td><input type="text" readonly class="inp-form" id="amount" /><span style="font-size:25px"><sub>&#8377;</sub></span></td>
			<th valign="top" align="center">
			<input type="button" value="Add" onclick=" transportTotal();" class="form-finish" name="Add" />
			</th>
			<td><input type="text" readonly class="inp-form" id="totalAmount" name="amount" value="<?php echo $row['total_amount']; ?>" /><span style="font-size:25px"><sub>&#8377;</sub><span style="font-size:8px"> Total Amount</span></span></td>
	   </tr>
	   <tr id="d23" >
	   <th valign="top" >All Used Transport Details:</th>
	   <td colspan="3">
	   <input type="text"  class="inp-form" name="transport_all_details" id="transport_all_details"  value="<?php echo $row['transport_all_details']; ?>"style="width:91%; height:45px" />
	   
	   </td>
	   </tr>
 
	   <tr id="d31">
	   
          <th valign="top">Local DA:</th>
			<td><input type="text" class="inp-form" name="da" id="a3" value="<?php echo $row['da']; ?>"  onChange="sum3(this.value)" /></td>
			<th valign="top">Boarding / Lodging:</th>
			<td><input type="text" class="inp-form" name="bord" id="a4" value="<?php echo $row['boarding']; ?>" onChange="sum3(this.value)"  /></td> 
	   </tr>
	   <tr id="d32" >
	   
          <th valign="top">Fooding:<b style="font-size: 9px;">(Breakfast/Lunch/Dinner)</b></th>
			<td><input type="text" class="inp-form" name="food" value="<?php echo $row['fooding']; ?>" id="a5" onChange="sum3(this.value)" /></td>
            <td><input type="text" class="inp-form" name="a25" id="a25"  value="<?php echo $row['a25']; ?>"  style="margin-right: 12px;
"/></td>
			<td><input type="text" class="inp-form" name="a26" id="a26"  value="<?php echo $row['a26']; ?>" /></td>
	   </tr>	                 
	   <input type="hidden" name="am" id="am" value="" /> 
	   
      
	   <tr id="d41" >
	   
          <th valign="top">Telephone:</th>
			<td><input type="text" class="inp-form" name="tel" id="a6" value="<?php echo $row['tel']; ?>" onChange="sum3(this.value)" /></td>
           <th valign="top">Stationery:</th>
			<td><input type="text" class="inp-form" name="sta" id="a7"  value="<?php echo $row['stationary']; ?>" onChange="sum3(this.value)" /></td>
	   </tr>
	   
	   <tr id="d42" >
	   
          <th valign="top">Xerox:</th>
			<td><input type="text" class="inp-form" name="xer" id="a8" value="<?php echo $row['xerox']; ?>" onChange="sum3(this.value)" /></td>
           <th valign="top">Courier Charges:</th>
			<td><input type="text" class="inp-form" name="cor" id="a9" value="<?php echo $row['courier']; ?>" onChange="sum3(this.value)" /></td>
	   </tr>
	   
	   <tr id="d43">
	   
          <th valign="top">Internet Charges:</th>
			<td><input type="text" class="inp-form" name="int" id="a10" value="<?php echo $row['internet']; ?>" onChange="sum3(this.value)" /></td>
          <th valign="top">Others:</th>
			<td><input type="text" class="inp-form" name="other" id="a13" value="<?php echo $row['others']; ?>" onChange="sum3(this.value)" /></td>
	   </tr>
	   
	   <tr id="d44">
	   
          <th valign="top">Leave:</th>
			<td><input type="text" class="inp-form" name="leave" id="a12" value="<?php echo $row['leaves']; ?>" /></td>
           <th valign="top">Paper Work</th>
			<td><input type="text" class="inp-form" name="paper" id="a11" value="<?php echo $row['paper']; ?>" /></td>
	   </tr>
	  <tr id="d45" >
	   
          <th valign="top">TRANSPORT / BUULTY CHARGE:</th>
			<td><input type="text" class="inp-form" name="buulty" id="a14"  value="<?php echo $row['buulty']; ?>" onChange="sum3(this.value)" /></td>
		  <th valign="top">Grand Total:</th>
			<td><input type="text" class="inp-form" id="grand" value="<?php echo $grand_total; ?>" name="grand_total" /></td>
           
	   </tr>
 
         <tr id="d23" >
	   <th valign="top">Remarks:</th>
	   <td colspan="3">
	   <input type="text" class="inp-form" name="remarks" id="remarks"style="width:91%; height:45px" value="<?php echo $row['remarks']; ?>"/>
	   
	   </td>
	   </tr>
       <!--<tr>      
        
			<th valign="top">Specification:</th>
			<td><input type="text" class="inp-form" name="specification" id="specification" value=""   /></td>         
	   </tr> -->
	<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input type="submit" value="" class="form-submit" name="submit" />
			<input type="reset" value="" class="form-reset" onClick="this.form.reset()"  />		</td>
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
				 :true,
				/*lettersonly:true,*/
				remote:'check.php',
			},
			
			"email12":
			{
				 :true,
				email:true,
				
			},
			"address":
			{
				 :true
			},
			"address":
			{
				 :true
			},
			
			
			"route":
			{
				 :true
				 
			},
						
		},
		messages:
		{
			"user_name":
			{
				 :'This field is  .',
				remote:'Username Already Exists.',
			},
			
			"email":
			{
				 :'This field is  .',
				email:'Please enter valid email.',
				
			},
			"password":
			{
				 :'This field is  .',
			},
			"address":
			{
				 :'This field is  .',
			},
			
			"phone":
			{
				 :'This field is  .',
				number:'Please enter a valid phone no.'
			},
			
			
		}
	});
	}); 
	</script>
<?php include('footer.php');?>
<script>
sum3(0);
</script>
