<?php include('header.php');
include('function.php');
//print_r($_SESSION);
if(isset($_POST['submit'])) 
{
//echo "<pre>"; print_r ($_REQUEST); die;
	  $q="select report_no from expense order by id desc LIMIT 1";
		   $r=mysql_query($q);
		   $row=mysql_fetch_row($r);
		   if($row!=0)
		   {
		   		 $old_num=$row[0];
				$a=substr($old_num, 5);
				$b=$a+1;
				$rno = "E0000".$b;
		   }
		   else{
		   	$rno = "E00001";
		   }

//$rno=$_REQUEST['rno'];
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
//$food=strupp($_REQUEST['food'])+$a25+$a26;
$executive_id=$executive;

$q=mysql_query("SELECT * FROM department_list where id='$executive'");
$d=mysql_fetch_array($q);
$executive=$d['name'];

 $sql=mysql_query("INSERT INTO expense (report_no,branch,executive_id,executive_name,designation,report_date,advance,remarks,town_visited,source, destination , mode,km,total_amount,transport_all_details,da,boarding,a25,a26,fooding,tel,stationary,xerox,courier,internet,paper,leaves,others,buulty) VALUES ('$rno', '$branch_city','$executive_id','$executive', '$designation','$entry_date', '$advance_bal','$remarks','$visited', '$from','$to','$trans_mode', '$km','$amount','$transport_all_details', '$da','$bord', '$a25','$a26', '$food','$tel', '$sta','$xer', '$cor','$int', '$paper','$leave','$other','$buulty')")or die(mysql_error());
 

 // $a15=strupp($_REQUEST['a15']);
  $a15=$advance_bal - ( $da+$bord+$food+$a25+$a26+$tel+$sta+$xer+$cor+$int+$other+$buulty);

  $ttt=$a15-$amount;
 //exit;
 //$sq=mysql_query("UPDATE tour SET advance='$ttt' where executive_id='$executive_id'"); 
 

     header('location:expense_master_listing.php'); 
 

}


?>
<!-- start content-outer -->
<script>
function sum3(val)
    {
    	//alert(val);
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
		abc=a1+a2+a3+a4+a5+a6+a7+a8+a11+a12+a25+a26;
		//alert(abc); 
		a13=document.getElementById("advance_bal").value; 
		
		document.getElementById("a15").value=parseFloat(a13)-parseFloat(abc);
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

<script>
function validateForm()
{
	 if($("#designation").val()=="")
	   {
		alert("Please select Executive Name");
		$("#exe").focus();
		return false;
	  } 
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

<div id="page-heading">
  <h1>Add New Expense Master Information</h1>
  <h4 style="color:red" align="center"><?php echo $error;?></h4>

</div>
<a href="javascript:goback()" style="color:#FFFFFF;"><div class="addin">
    	Back
    </div></a>
<form action="" method="post" enctype="multipart/form-data" id="formoid" name="form" onsubmit="return validateForm();">
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
		<?php
		$q11=mysql_query("select id from expense order by id desc limit 1"); 
		$d11=mysql_fetch_array($q11);	

		
		
		 /*  $q="select report_no from expense order by id desc LIMIT 1";
		   $r=mysql_query($q);
		   $row=mysql_fetch_row($r);
		   if($row!=0)
		   {
		   		 $old_num=$row[0];
				$a=substr($old_num, 5);
				$b=$a+1;
				$new_num = "E0000".$b;
		   }
		   else{
		   	$new_num = "E00001";
		   }*/

		//$report_no=mt_rand(1,8).time();
		?>
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
        <th valign="top">Report NO:</th>
			<td> Auto Generate<!--<input type="text" class="inp-form" name="rno" value="<?php echo $new_num;//"E".$report_no; ?>" readonly="" />--></td>
	    <th valign="top">Branch Office:</th>
			<td>
			  <select name="branch_city" id="city" class="inp-form-select" > 
			<option value="" selected="selected"> Plz Select</option>
      <?php			    
			    $query=mysql_query("SELECT id,city,district,state FROM location_maste_info_list order by city");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option value="<?php echo $value['city']; ?>"><?php echo $value['city']."&nbsp;&nbsp;&nbsp;&nbsp;".$value['district']; ?></option>
			  <?php 
			     }			     
 
              ?>
  </select>
			<input type="hidden" class="inp-form" name="branch_dis" value="" id="district" readonly="readonly"/>         </td>          
	   </tr>
	   <tr>
	   	<?php //print_r($_SESSION); ?>
        <th valign="top">Executive Name:</th>
			<td>
			<select name="executive" id="exe" class="inp-form-select"  onchange="showdesignation(this.value),showtouradvance(this.value),showlocalda(this.value),showboardinglodging(this.value),showbreakfast(this.value),showlunch(this.value),showdinner(this.value),showtelephone(this.value),showstationery(this.value),showxerox(this.value),showcourier_charges(this.value),showinternet_charges(this.value),showothers(this.value),showtransport_buulty_charge(this.value)" > 
		    <option value="" selected="selected"> Plz Select</option>
        	<?php
				$user_type1=$_SESSION['user_type'];
				$rt=$_SESSION['SESS_id'];

				if($user_type1 != 8 )
				{
					$query=mysql_query("SELECT * FROM department_list");
				}
				else
				{
					$query=mysql_query("SELECT * FROM department_list where user=$rt");
				}			    
			    while($value=mysql_fetch_array($query))
			      {			  			
						$rty=$value['id'];
			  ?>			  
			     <option  value="<?php echo $value['id']; ?>" <?php if($value['user']==$_SESSION['SESS_id']){ $fd=$value['designation']; echo "selected"; } ?>><?php echo $value['name']; ?></option>
			  <?php 
			     }   
              ?>
        </select>			</td>

	    <th valign="top">Designation:</th>
			<td><input type="text" class="inp-form" name="designation" id="designation" readonly="readonly" value="<?php echo $fd; ?>"  /></td>          
	   </tr>
		<tr>
		<?php
          
          $query=mysql_query("SELECT * FROM department_list where user=$rt");
          $value=mysql_fetch_array($query);
		      			  			
          $rty=$value['id'];
          
          $da99=0;	
          $query99=mysql_query("SELECT * FROM tour WHERE (executive_id='$rty')");
          while($data99=mysql_fetch_array($query99))
            {            
                
                $da99+=$data99['advance'];
                
            }
            
          $grand_total=0;	
          $query99=mysql_query("SELECT * FROM expense WHERE (executive_id='$rty')");
          while($data99=mysql_fetch_array($query99))
            {                
			    //For Grand total of amount
			  
			 	$grand_total+=$data99['total_amount'];
				$grand_total+=$data99['da'];
				$grand_total+=$data99['boarding'];
				$grand_total+=$data99['a25'];
				$grand_total+=$data99['a26'];
				$grand_total+=$data99['fooding'];
				$grand_total+=$data99['tel'];
				$grand_total+=$data99['stationary'];
				$grand_total+=$data99['xerox'];
				$grand_total+=$data99['courier'];
				$grand_total+=$data99['internet'];
				$grand_total+=$data99['others'];
				$grand_total+=$data99['buulty'];             
                
            }
            $da99=$da99-$grand_total;
?>					
		 <th valign="top">Date:</th>
		  <td> <input type="text" class="inp-form" name="entry_date" id="datepicker" value="<?php echo date('Y-m-d');  ?>" onChange="show13(this.value)"/></td> 
        <th valign="top">Tour Advance  Bal Rs:</th>			
			<td> <input type="text" class="inp-form" name="advance_bal" id="advance_bal" value="<?php if($da99!='') echo $da99; else echo '0'; ?>" readonly="readonly"/></td>  
	   </tr>	   
	   <tr>
	    <th valign="top">Town Visited:</th>
			<td>
			<!--<select name="option" class="inp-form-select" id="ch" onchange="show12(this.value)" >
			  <option value="" selected="selected">Plz Select</option>
			  <option value="town">Town Visite</option>
			   <option value="mode">Mode Of Transport</option>
			  <option value="ta">Daily Allowance</option>			 
			  <option value="others">Others Expense</option>
			</select>	-->
			<input type="text" class="inp-form"  name="visited" /></td> 
		  </td>	
            <!--<th valign="top">Remaining advance :</th>-->
			<td><input type="hidden" class="inp-form" name="a15" id="a15"  value="0" readonly="readonly"/></td> 	 		
	   </tr>	  
	    <tr id="d12" >
        <th valign="top">From:</th>
			<td><input type="text" class="inp-form" name="from" id="t1"  /></td>
          <th valign="top">To:</th>
			<td><input type="text" class="inp-form" name="to" id="t2"  /></td> 
	   </tr>
       
      <tr id="d21" >
	    <th valign="top" id="trans">Mode Of Transport:</th>
			<td>			
			<select name="trans_mode" class="inp-form-select" id="tr11">
       
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
			<td><input type="text"  class="inp-form"  id="km" name="km" /></td>
	   </tr> 
       <tr>      
      <th valign="top">Start Meter:</th>
			<td><input type="text" class="inp-form" name="Start" id="Start" value="0" onChange="sum4(this.value),show14(this.value)" /></td>
          <th valign="top">End Meter:</th>
			<td><input type="text" class="inp-form" name="End" id="End" value="0" onChange="sum4(this.value),show14(this.value)" /></td> 
	   </tr>	  
	   	   
	  <tr id="d22">
	    <th valign="top">Amount:</th>
			<td><input type="text" class="inp-form" id="amount" /><span style="font-size:25px"><sub>&#8377;</sub></span></td>
			<th valign="top" align="center"><input type="button" value="Add" onclick="transportTotal();" class="form-finish" name="Add" /></th>
			<td><input type="text" class="inp-form" id="totalAmount" name="amount" /><span style="font-size:25px"><sub>&#8377;</sub><span style="font-size:8px"> Total Amount</span></span></td>
	   </tr>
	   <tr id="d23" >
	   <th valign="top" >All Used Transport Details:</th>
	   <td colspan="3">
	   <input type="text" readonly class="inp-form" name="transport_all_details" id="transport_all_details"style="width:91%; height:45px" />
	   
	   </td>
	   </tr>
	   <tr id="d31" >
	   
          <th valign="top">Local DA:</th>
			<td><input type="text" class="inp-form" name="da" id="a3"  value="0" onChange="sum3(this.value)" /></td>
			<th valign="top">Boarding / Lodging:</th>
			<td><input type="text" class="inp-form" name="bord" id="a4"  value="0" onChange="sum3(this.value)" /></td> 
	   </tr>
	   <tr id="d32" >
	   
          <th valign="top">Fooding:<b style="font-size: 9px;">(Breakfast/Lunch/Dinner)</b></th>
			<td><input type="text" class="inp-form" name="food" id="a5"  value="0" onChange="sum3(this.value)" /></td>
            <td><input type="text" class="inp-form" name="a25" id="a25"  value="0" onChange="sum3(this.value)" style="margin-right: 12px;
"/></td>
			<td><input type="text" class="inp-form" name="a26" id="a26"  value="0" onChange="sum3(this.value)"/></td> 
	   </tr>	   
	   <input type="hidden" name="am" id="am" value="" /> 
	   
      
	   <tr id="d41" >
	   
          <th valign="top">Telephone:</th>
			<td><input type="text" class="inp-form" name="tel" id="a6" value="0" onChange="sum3(this.value)" /></td>
           <th valign="top">Stationery:</th>
			<td><input type="text" class="inp-form" name="sta" id="a7" value="0" onChange="sum3(this.value)" /></td>
	   </tr>
	   
	   <tr id="d42" >
	   
          <th valign="top">Xerox:</th>
			<td><input type="text" class="inp-form" name="xer" id="a8" value="0" onChange="sum3(this.value)" /></td>
           <th valign="top">Courier Charges:</th>
			<td><input type="text" class="inp-form" name="cor" id="a9" value="0" onChange="sum3(this.value)" /></td>
	   </tr>
	   
	   <tr id="d43" >
	   
          <th valign="top">Internet Charges:</th>
			<td><input type="text" class="inp-form" name="int" id="a10" value="0" onChange="sum3(this.value)" /></td>
            <th valign="top">Others:</th>
			<td><input type="text" class="inp-form" name="other" id="a13" value="0" onChange="sum3(this.value)" /></td>
	   </tr>
	   
	   <tr id="d44">
	   
          <th valign="top">Leave:</th>
			<td><input type="text" class="inp-form" name="leave" id="a12"/></td>
           <th valign="top">Paper Work</th>
			<td><input type="text" class="inp-form" name="paper" id="a11"/></td>
	   </tr>
	  <tr id="d45" >
	   
          <th valign="top">TRANSPORT / BILTY CHARGE:</th>
			<td><input type="text" class="inp-form" name="buulty" id="a14" value="0" onChange="sum3(this.value)" /></td>

	   </tr>
       
        <tr id="d23" >
	   <th valign="top">Remarks:</th>
	   <td colspan="3">
	   <input type="text" class="inp-form" name="remarks" id="remarks"style="width:91%; height:45px" />
	   
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
show13(<?php echo date('Y-m-d');  ?>);
</script>
