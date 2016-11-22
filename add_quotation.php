<?php 
ob_start();
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
session_start();
require_once('config.php');
$userid=$_SESSION['SESS_id'];

if(empty($userid)){header('location:login.php');}
 $var=$_SESSION['SESS_id'];
 $data=mysql_query("SELECT * FROM dan_users where id='$var'") or die(mysql_error);
 $r = mysql_fetch_array($data);
$user=$r['user_type'];

if(isset($_GET['log']) && ($_GET['log']=='out')){
        //if the user logged out, delete any SESSION variables
	session_destroy();
	
        //then redirect to login page
	header('location:login.php');
}?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Quotation</title>

<link href="css/css.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  
   <script type="text/javascript" src="jquery.timepicker.js"></script>
  <link rel="stylesheet" type="text/css" href="jquery.timepicker.css" />
 <script type="text/javascript" src="lib/site.js"></script>
  <link rel="stylesheet" type="text/css" href="lib/site.css" />
  
  <script type="text/javascript">
 $(function() {
    $( ".datepker" ).datepicker({ dateFormat: 'dd-mm-yy' });
  });

 $(function() {
                    $('#timers').timepicker({'step': 15});
                    $('#setTimeButton').on('click', function (){
                        $('#timers').timepicker('setTime', new Date());
                    });
                });


function validateForm()
 {
	var numexp = /^[0-9]+$/;	
		
	var x = document.forms["add_quotation"]["to"].value;
	
    if (x == null || x == "") {
        alert("Please fill the recipient's name.");
        return false;
    }
	
	var a = document.forms["add_quotation"]["phones"].value;
    if (a == null || a == "") {
        alert("Please fill the phone number.");
        return false;
    }else if(!a.match(numexp)){alert("Phone number should only be digits"); return false;}
	
	var y = document.forms["add_quotation"]["date_q"].value;
	 if (y == null || y == "") {
        alert("Please choose a quotation date.");
        return false;
    }
	
	var z = document.forms["add_quotation"]["source"].value;
	 if (z == null || z == "") {
        alert("Please fill the source");
        return false;
    }
	
	var b = document.forms["add_quotation"]["grand"].value;
	 if (b == null || b == "") {
        alert("Please fill the Grand total amount");
        return false;
    }else if(!b.match(numexp)){alert("Please enter the correct amount."); return false;}
	
	var c = document.forms["add_quotation"]["destin"].value;
	 if (c == null || c == "") {
        alert("Please fill the destination");
        return false;
    	}
	
	/*var d = document.forms["add_quotation"]["carier"].value;
	 if (d == null || d == "") {
        alert("Please fill the carrier");
        return false;
    	}	
	var e = document.forms["add_quotation"]["time"].value;
	 if (e == null || e == "") {
        alert("Please fill the time.");
        return false;
    	}	
	var f = document.forms["add_quotation"]["rr_gr_no"].value;
	 if (f == null || f == "") {
        alert("Please fill the R.R/G.R number");
        return false;
    	}	
	var g = document.forms["add_quotation"]["party_tin"].value;
	 if (g == null || g == "") {
        alert("Please fill the Party,s TIN/CST number");
        return false;
    	}	
	var h = document.forms["add_quotation"]["rupees"].value;
	 if (h == null || h == "") {
        alert("Please fill the Rupees in words");
        return false;
    	}	
	var i = document.forms["add_quotation"]["grand"].value;
	 if (i == null || i == "") {
        alert("Please fill the Grand total amount");
        return false;
    	}						
*/
}
	</script>
<style>.abcd tr td{border:1px solid;}</style>


</head>

<body>

<?php 
$type=$_GET['type'];

if ($type == "add") 
{ ?>
<form action="quotation_submit.php" method="post" enctype="multipart/form-data" name="add_quotation">
<table width="900px" border="1" align="center">
  <tr>
    <td>
    
    
    <table width="957" border="1">
  <tr>
    <td width="245"><img src="images/logo.png" /></td>
    <td width="470">
    
    <table width="501" border="0">
  <tr>
   <td width="491" valign="top" style="font-size:20px; font-weight:bold;">BALKARA LOGISTICS PVT. LTD.<input type="button" onclick="window.print();" value="print" style="cursor:pointer; background:#00FF00; margin-left:20%"></td>
  </tr>
  <tr>
    <td style="font-size:60px; font-weight:bold;">Truckwaale.com</td>
  </tr>
  <tr>
    <td>I-70, Gali No. 33,Rajapuri, Uttam Nagar, New Delhi-110049<br />
    Ph: +91-11-64641133, Mob: +91-11-9582555473<br />
    E-mail: info@truckwaale.com, Web: www.truckwaale.com
    
    </td>
  </tr>
</table>

    
    
    </td>
    <td width="250">
    
    <table width="191" border="0">
  <tr>
    <td align="right">PH: +91-11-64641133</td>
  </tr>
  <tr>
    <td align="right" height="35" valign="top">Mob: +91-11-9582555473</td>
  </tr>
  
</table>

    </td>
  </tr>
</table>
     
  </td>
  </tr>
  
  
  
  <tr>
    <td align="center" style="font-size:25px; font-weight:bold;">
    Quotation
    </td>
  </tr>
  
  
  
  
  <tr>
    <td>
    
    
    <table width="957" border="1">
  <tr>
    <td width="706">
    
    
    <table width="700" border="0">
  <tr>
    <td valign="top">To&nbsp;
      <textarea cols="80" rows="3" name="to" placeholder="Recipient's name..."></textarea></td>
  </tr>
  <tr>
    <td>
    
    <table width="700" border="0">
  <tr>
    <td width="407" ></td>
    <td width="277">Ph. No.&nbsp;
      <INPUT TYPE="TEXT" NAME="phones" SIZE="30" maxlength="11"></td>
  </tr>
</table>

    
    </td>
  </tr>
</table>

    
    
    </td>
    <td width="233">
    
    
    <table width="232" border="0">
  <tr>
    <td  height="40">Sr. No.&nbsp;
      <INPUT TYPE="TEXT" NAME="sr_no" SIZE="22"></td>
  </tr>
  <tr>
    <td height="40">Date.&nbsp;
      <INPUT TYPE="TEXT" NAME="date_q" SIZE="24" class="datepker"></td>
  </tr>
</table>

    
    
    
    
    
    </td>
  </tr>
</table>


    
    </td>
  </tr>
  <tr>
    <td>Dear Sir,</td>
  </tr>
  
  
  
  <tr>
    <td>
    
    <table width="956" border="0">
  <tr>
    <td width="507">
    We thank you for enquiry for the packing and moving of your belonging from    </td>
    <td width="197"><INPUT TYPE="TEXT" NAME="source" SIZE="26"></td>
    <td width="26">To</td>
    <td width="198"> <INPUT TYPE="TEXT" NAME="destin" SIZE="26"></td>
  </tr>
</table>

    
    
    
    </td>
  </tr>
  
  
  
  
  <tr>
    <td>
    
    <table width="956" border="1" class="abcd">
  <tr>
    <td width="63" align="center"><b>S. No.</b></td>
    <td width="637"><center><b>PARTICULARS</b></center></td>
    <td width="234"><center><b>CHARGES</b></center></td>
  </tr>
  <tr>
    <td align="center">1.</td>
    <td>Transportation Charges</td>
    <td><INPUT TYPE="TEXT" NAME="tc" SIZE="36" class="inputs"></td>
  </tr>
  <tr>
    <td align="center">2.</td>
    <td>Packing Charges</td>
    <td><INPUT TYPE="TEXT" NAME="pc" SIZE="36" class="inputs"></td>
  </tr>
  
  <tr>
    <td align="center">3.</td>
    <td>Loading Charges</td>
    <td><INPUT TYPE="TEXT" NAME="lc" SIZE="36" class="inputs"></td>
  </tr>
  
  
  
  <tr>
    <td align="center">4.</td>
    <td>Unloading Charges</td>
    <td><INPUT TYPE="TEXT" NAME="uc" SIZE="36"></td>
  </tr>
  <tr>
    <td align="center">5.</td>
    <td>Unpacking Charges</td>
    <td><INPUT TYPE="TEXT" NAME="un_c" SIZE="36"></td>
  </tr>
  <tr>

    <td align="center">6.</td>
    <td>Escort Charges</td>
    <td><INPUT TYPE="TEXT" NAME="ec" SIZE="36"></td>
  </tr>
  <tr>
    <td align="center">7.</td>
    <td>Car Transportaion Charges</td>
    <td><INPUT TYPE="TEXT" NAME="ctc" SIZE="36"></td>
  </tr>
  <tr>
    <td align="center">8.</td>
    <td>Statistical Charges</td>
    <td><INPUT TYPE="TEXT" NAME="sc" SIZE="36"></td>
  </tr>
  <tr>
    <td align="center">9.</td>
    <td align="right">TOTAL</td>
    <td><INPUT TYPE="TEXT" NAME="total" SIZE="36"></td>
  </tr>
  <tr>
    <td align="center">10.</td>
    <td>Octroi Charges (if applicable) as actual</td>
    <td><INPUT TYPE="TEXT" NAME="octroi" SIZE="36"></td>
  </tr>
  <tr>
    <td align="center">11.</td>
    <td>a) Transit Risk</td>
    <td><INPUT TYPE="TEXT" NAME="transit" SIZE="36"></td>
  </tr>
  <tr>
    <td></td>
    <td>b) Comprehensive Risk</td>
    <td><INPUT TYPE="TEXT" NAME="comprehensive" SIZE="36"></td>
  </tr>
  <tr>
    <td align="center">12.</td>
    <td>Service Charges</td>
    <td><INPUT TYPE="TEXT" NAME="service" SIZE="36"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">G. TOTAL</td>
    <td><INPUT TYPE="TEXT" NAME="grand" SIZE="36"></td>
  </tr>
</table>

  
    
    </td>
  </tr>
  
  
  
  
  
  <tr>
  <td>
    
    <table width="956" border="1">
  <tr>
    <td><strong>Note</strong> : Minimum 12 Itr. Petrol should available in the car<br />
(<strong>Note</strong>  : Transit Peried for Road Distance HHG 300 kms / Car 250 Kms. Ond day and so on, excluding day to loading/Delivery)</td>
  </tr>
  <tr>
    <td><strong>Terms & Conditions</strong></td>
  </tr>
  <tr>
    <td>a)&nbsp; Please be advised that the lorry transportation charges which quoted are based on the present prevailing rates and will be charged on actual at the time of transportation. Octroi charges, will be charges extra as per actual in advance.</td>
  </tr>
  <tr>
    <td>b)&nbsp; The carrier or their agent shall be exempted from any loss or damage through accident, pilferage, fire, rain collion, another road or river hazard, we therefore recomment that goods be insured under carriers, risk, no individual policy/receipt from insurance co. will be given. </td>
  </tr>
  <tr>
    <td>c)&nbsp; We would request your to pay us 80% of all the charges in advance alongwidth your order and the balance on completion of the work at Uploading point.</td>
  </tr>
  <tr>
    <td>d)&nbsp; Payment in favour of BALKARA LOGISTICS PVT. LTD.</td>
  </tr>
  <tr>
    <td>e)&nbsp; This offer is valid till <INPUT TYPE="TEXT" NAME="offer_v" SIZE="20" class="datepker"></td>
  </tr>
  <tr>
    <td>f)&nbsp; We do not hold any responsibility for any valuable item like Jewellery leash/document.</td>
  </tr>
  <tr>
    <td>g)&nbsp; We do not undertake responsibility for carriage of Gamlas/Plants.</td>
  </tr>
  <tr>
    <td>h)&nbsp; If there is any extra packing of any extra articles or changed articles other than the article list, we will charge extra accordingly.</td>
  </tr>
  <tr>
    <td>i)&nbsp; We will charge extra or any extra service other than above mentioned service.</td>
  </tr>
  <tr>
    <td>j)&nbsp; Thanking you and looking forward to vender our best service to you.</td>
  </tr>
  <tr>
    <td>k)&nbsp; We do not undertake electrical, earpentary & plumber job. We will provide on the base of availability and will becharged  extra.</td>
  </tr>
  
</table>

    
 
    </td>
  </tr>
  
  
  
  
  
  
  
  <tr>
    <td>
    
    
    <table width="956" border="0">
  <tr>
    <td style="width:230px;"><INPUT TYPE="TEXT" NAME="name" SIZE="32"><br />
    Signature of (Executive)
</td>
    <td style="font-size:20px; font-weight:bold;width: 290px; float:left;">BRANCHES ALL OVER INDIA</td>
    <td style="float:left;"><INPUT TYPE="TEXT" NAME="name" SIZE="32"><br />
Name Signature of customer
    
    </td>
    <td style="float:right;"><input type="submit" name="submit" value="Add Quotation" style=" background:#66FF00; border:1px solid #000000; cursor:pointer;" onclick="return validateForm();" /></td>
  </tr>
</table>
    
    </td>
  </tr>
  <tr>
    <td>
    
    <table width="956" border="1">

  <tr>
    <td>
    
    <table border="0">
  <tr>
    <td>
    
    <table border="0">
  <tr>
    <!--<td><input type="checkbox" name="vehicle" value="Bike"></td>-->
    <td>Ahmedabad</td>
  </tr>
</table>
    
    </td>
  </tr>
  <tr>
    <td><table border="0">
  <tr>
    <!--<td><input type="checkbox" name="vehicle" value="Bike"></td>-->
    <td>Delhi</td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td>
    
    <table border="0">
  <tr>
    <!--<td><input type="checkbox" name="vehicle" value="Bike"></td>-->
    <td>Mumbai</td>
  </tr>
</table>
    
    
    </td>
  </tr>
</table>
    
    
    
    
    </td>
    <td>
    <table border="0">
  <tr>
    <td>
    
    <table border="0">
  <tr>
   <!-- <td><input type="checkbox" name="vehicle" value="Bike"></td>-->
    <td>Bangalore</td>
  </tr>
</table>

    
    
    
    </td>
  </tr>
  <tr>
    <td><table border="0">
  <tr>
   <!-- <td><input type="checkbox" name="vehicle" value="Bike"></td>-->
    <td>Gurgaon</td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td>
    
    <table border="0">
  <tr>
   <!-- <td><input type="checkbox" name="vehicle" value="Bike"></td>-->
    <td>Nagpur</td>
  </tr>
</table>
    
    
    </td>
  </tr>
</table>

    </td>
    
    
    <td>
    
    
    
    <table border="0">
  <tr>
    <td>
    
    <table border="0">
  <tr>
    <!--<td><input type="checkbox" name="vehicle" value="Bike"></td>-->
    <td>Bhuvaneshwar</td>
  </tr>
</table>

    </td>
  </tr>
  <tr>
    <td><table border="0">
  <tr>
   <!-- <td><input type="checkbox" name="vehicle" value="Bike"></td>-->
    <td>Haldwani</td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td>
    
    <table border="0">
  <tr>
   <!-- <td><input type="checkbox" name="vehicle" value="Bike"></td>-->
    <td>Patna</td>
  </tr>
</table>
    
    
    </td>
  </tr>
</table>

    
    
    </td>
    <td>
    
    <table border="0">
  <tr>
    <td>
    
    <table border="0">
  <tr>
    <!--<td><input type="checkbox" name="vehicle" value="Bike"></td>-->
    <td>Chennai</td>
  </tr>
</table>


    </td>
  </tr>
  <tr>
    <td><table border="0">
  <tr>
   <!-- <td><input type="checkbox" name="vehicle" value="Bike"></td>-->
    <td>Hyderabad</td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td>
    
    <table border="0">
  <tr>
  <!--  <td><input type="checkbox" name="vehicle" value="Bike"></td>-->
    <td>Pune</td>
  </tr>
</table>
 
    </td>
  </tr>
</table>
    
    
    </td>
    <td>
    
    <table border="0">
  <tr>
    <td>
    
    <table border="0">
  <tr>
 <!--   <td><input type="checkbox" name="vehicle" value="Bike"></td>-->
    <td>Cochin</td>
  </tr>
</table>

    </td>
  </tr>
  <tr>
    <td><table border="0">
  <tr>
    <!--<td><input type="checkbox" name="vehicle" value="Bike"></td>-->
    <td>Jaipur</td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td>
    
    <table border="0">
  <tr>
  <!--  <td><input type="checkbox" name="vehicle" value="Bike"></td>-->
    <td>Ranchi</td>
  </tr>
</table>
    </td>
  </tr>
</table>
    
    </td>
    <td>
    <table border="0">
  <tr>
    <td>
    
    <table border="0">
  <tr>
   <!-- <td><input type="checkbox" name="vehicle" value="Bike"></td>-->
    <td>Dehradun</td>
  </tr>
</table>
    </td>
  </tr>
  <tr>
    <td><table border="0">
  <tr>
    <!--<td><input type="checkbox" name="vehicle" value="Bike"></td>-->
    <td>Kolkata</td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td>
    
    <table border="0">
  <tr>
   <!-- <td><input type="checkbox" name="vehicle" value="Bike"></td>-->
    <td>Rudrapur</td>
  </tr>
</table>
    
    </td>
  </tr>
</table>
    </td>
  </tr>
</table>

    </td>
  </tr>
</table>
</form>
<?php }
elseif($type == "edit")
 { 
 $id=$_GET['id'];
 $id = convert_uudecode(base64_decode($id));
 $result=mysql_query("SELECT * FROM `quotations` JOIN `meta_table` ON (quotations.id = meta_table.invoice_item_id) WHERE quotations.id ='$id' && meta_table.meta_key='quotation-item'") or die(mysql_error());
$row = mysql_fetch_array($result);
//print_r($row['s_no']);die;
 $tuu=$row['tuu'];
 $sr_no=$row['sr_no'];
 $phone=$row['phone'];
 $date_q=$row['date_q'];
 $sor=$row['sor'];
 $des=$row['des'];
  $gtotal=$row['gtotal'];
   $valid_till=$row['valid_till'];
 
 $metavalue=unserialize($row['meta_value']);
 
 
 ?>
<form action="quotation_submit.php" method="post" enctype="multipart/form-data" name="add_quotation">
<table width="900px" border="1" align="center">
  <tr>
    <td>
    <table width="957" border="1">
  <tr>
    <td width="245"><img src="images/logo.png" /></td>
    <td width="470">
    
    <table width="501" border="0">
  <tr>
   <td width="491" valign="top" style="font-size:20px; font-weight:bold;">BALKARA LOGISTICS PVT. LTD.<input type="button" onclick="window.print();" value="print" style="cursor:pointer; background:#00FF00; margin-left:20%"></td>
  </tr>
  <tr>
    <td style="font-size:60px; font-weight:bold;">Truckwaale.com</td>
  </tr>
  <tr>
    <td>I-70, Gali No. 33,Rajapuri, Uttam Nagar, New Delhi-110049<br />
    Ph: +91-11-64641133, Mob: +91-11-9582555473<br />
    E-mail: info@truckwaale.com, Web: www.truckwaale.com
    
    </td>
  </tr>
</table>
    
    </td>
    <td width="250">
    
    <table width="191" border="0">
  <tr>
    <td align="right">PH: +91-11-64641133</td>
  </tr>
  <tr>
    <td align="right" height="35" valign="top">Mob: +91-11-9582555473</td>
  </tr>
  
</table>

    </td>
  </tr>
</table>
     
  </td>
  </tr>
  
  <tr>
    <td align="center" style="font-size:25px; font-weight:bold;">
    Quotation
    </td>
  </tr>
  
  <tr>
    <td>
    
    
    <table width="957" border="1">
  <tr>
    <td width="706">
    
    
    <table width="700" border="0">
  <tr>
    <td valign="top">To&nbsp;
      <textarea cols="80" rows="3" name="to" placeholder="Recipient's name..."><?php echo $tuu; ?></textarea></td>
  </tr>
  <tr>
    <td>
    
    <table width="700" border="0">
  <tr>
    <td width="407" ></td>
    <td width="277">Ph. No.&nbsp;
      <INPUT TYPE="TEXT" NAME="phones" SIZE="30" value="<?php echo $phone ; ?>"></td>
  </tr>
</table>

    
    </td>
  </tr>
</table>
    
    </td>
    <td width="233">
    
    
    <table width="232" border="0">
  <tr>
    <td  height="40">Sr. No.&nbsp;
      <INPUT TYPE="TEXT" NAME="s_no" SIZE="22" value="<?php echo $sr_no ; ?>"></td>
  </tr>
  <tr>
    <td height="40">Date.&nbsp;
      <INPUT TYPE="TEXT" NAME="date_q" SIZE="24" value="<?php echo $date_q ; ?>" class="datepker"></td>
  </tr>
</table>
    
    </td>
  </tr>
</table>
    
    </td>
  </tr>
  <tr>
    <td>Dear Sir,</td>
  </tr>
  
  <tr>
    <td>
    
    <table width="956" border="0">
  <tr>
    <td width="507">
    We thank you for enquiry for the packing and moving of your belonging from    </td>
    <td width="197"><INPUT TYPE="TEXT" NAME="source" SIZE="26" value="<?php echo $sor ; ?>"></td>
    <td width="26">To</td>
    <td width="198"> <INPUT TYPE="TEXT" NAME="destin" SIZE="26" value="<?php echo $des ; ?>"></td>
  </tr>
</table>
    
    </td>
  </tr>
  
  <tr>
    <td>
    
    <table width="956" border="1" class="abcd">
  <tr>
    <td width="63" align="center"><b>S. No.</b></td>
    <td width="637"><center><b>PARTICULARS</b></center></td>
    <td width="234"><center><b>CHARGES</b></center></td>
  </tr>
  <tr>
    <td align="center">1.</td>
    <td>Transportation Charges</td>
    <td><INPUT TYPE="TEXT" NAME="tc" SIZE="36" value="<?php echo $metavalue['tc']; ?>"></td>
  </tr>
  <tr>
    <td align="center">2.</td>
    <td>Packing Charges</td>
    <td><INPUT TYPE="TEXT" NAME="pc" SIZE="36" value="<?php echo $metavalue['pc']; ?>"></td>
  </tr>
  
  <tr>
    <td align="center">3.</td>
    <td>Loading Charges</td>
    <td><INPUT TYPE="TEXT" NAME="lc" SIZE="36" value="<?php echo $metavalue['lc']; ?>"></td>
  </tr>
  <tr>
    <td align="center">4.</td>
    <td>Unloading Charges</td>
    <td><INPUT TYPE="TEXT" NAME="uc" SIZE="36" value="<?php echo $metavalue['uc']; ?>"></td>
  </tr>
  <tr>
    <td align="center">5.</td>
    <td>Unpaking Charges</td>
    <td><INPUT TYPE="TEXT" NAME="un_c" SIZE="36" value="<?php echo $metavalue['un_c']; ?>"></td>
  </tr>
  <tr>

    <td align="center">6.</td>
    <td>Escort Charges</td>
    <td><INPUT TYPE="TEXT" NAME="ec" SIZE="36" value="<?php echo $metavalue['ec']; ?>"></td>
  </tr>
  <tr>
    <td align="center">7.</td>
    <td>Car Transportaion Charges</td>
    <td><INPUT TYPE="TEXT" NAME="ctc" SIZE="36" value="<?php echo $metavalue['ctc']; ?>"></td>
  </tr>
  <tr>
    <td align="center">8.</td>
    <td>Statistical Charges</td>
    <td><INPUT TYPE="TEXT" NAME="sc" SIZE="36" value="<?php echo $metavalue['sc']; ?>"></td>
  </tr>
  <tr>
    <td align="center">9.</td>
    <td align="right">TOTAL</td>
    <td><INPUT TYPE="TEXT" NAME="total" SIZE="36" value="<?php echo $metavalue['total']; ?>"></td>
  </tr>
  <tr>
    <td align="center">10.</td>
    <td>Octroi Charges (if applicable) as actual</td>
    <td><INPUT TYPE="TEXT" NAME="octroi" SIZE="36" value="<?php echo $metavalue['octroi']; ?>"></td>
  </tr>
  <tr>
    <td align="center">11.</td>
    <td>a) Transit Risk</td>
    <td><INPUT TYPE="TEXT" NAME="transit" SIZE="36" value="<?php echo $metavalue['transit']; ?>"></td>
  </tr>
  <tr>
    <td></td>
    <td>b) Comprehensive Risk</td>
    <td><INPUT TYPE="TEXT" NAME="comprehensive" SIZE="36" value="<?php echo $metavalue['comprehensive']; ?>"></td>
  </tr>
  <tr>
    <td align="center">12.</td>
    <td>Service Charges</td>
    <td><INPUT TYPE="TEXT" NAME="service" SIZE="36" value="<?php echo $metavalue['service']; ?>"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">G. TOTAL</td>
    <td><INPUT TYPE="TEXT" NAME="grand" SIZE="36" value="<?php echo $gtotal; ?>"><INPUT TYPE="hidden" NAME="q_id" value="<?php echo $row['id']; ?>"></td>
  </tr>
</table>

  
    
    </td>
  </tr>
  
  
  
  
  
  <tr>
  <td>
    
    <table width="956" border="1">
  <tr>
    <td><strong>Note</strong> : Minimum 12 Itr. Petrol should available in the car<br />
(<strong>Note</strong>  : Transit Peried for Road Distance HHG 300 kms / Car 250 Kms. Ond day and so on, excluding day to loading/Delivery)</td>
  </tr>
  <tr>
    <td><strong>Terms & Conditions</strong></td>
  </tr>
  <tr>
    <td>a)&nbsp; Please be advised that the lorry transportation charges which quoted are based on the present prevailing rates and will be charged on actual at the time of transportation. Octroi charges, will be charges extra as per actual in advance.</td>
  </tr>
  <tr>
    <td>b)&nbsp; The carrier or their agent shall be exempted from any loss or damage through accident, pilferage, fire, rain collion, another road or river hazard, we therefore recomment that goods be insured under carriers, risk, no individual policy/receipt from insurance co. will be given. </td>
  </tr>
  <tr>
    <td>c)&nbsp; We would request your to pay us 80% of all the charges in advance alongwidth your order and the balance on completion of the work at Uploading point.</td>
  </tr>
  <tr>
    <td>d)&nbsp; Payment in favour of BALKARA LOGISTICS PVT. LTD.</td>
  </tr>
  <tr>
    <td>e)&nbsp; This offer is valid till <INPUT TYPE="TEXT" NAME="offer_v" SIZE="20" value="<?php echo $valid_till;?>" class="datepker"></td>
  </tr>
  <tr>
    <td>f)&nbsp; We do not hold any responsibility for any valuable item like Jewellery leash/document.</td>
  </tr>
  <tr>
    <td>g)&nbsp; We do not undertake responsibility for carriage of Gamlas/Plants.</td>
  </tr>
  <tr>
    <td>h)&nbsp; If there is any extra packing of any extra articles or changed articles other than the article list, we will charge extra accordingly.</td>
  </tr>
  <tr>
    <td>i)&nbsp; We will charge extra or any extra service other than above mentioned service.</td>
  </tr>
  <tr>
    <td>j)&nbsp; Thanking you and looking forward to vender our best service to you.</td>
  </tr>
  <tr>
    <td>k)&nbsp; We do not undertake electrical, earpentary & plumber job. We will provide on the base of availability and will becharged  extra.</td>
  </tr>
  
</table>
 
    </td>
  </tr>
  
  <tr>
    <td>
    
    
    <table width="956" border="0">
  <tr>
    <td style="width:230px;"><INPUT TYPE="TEXT" NAME="name" SIZE="32"><br />
    Signature of (Executive)
</td>
    <td style="font-size:20px; font-weight:bold;width: 290px; float:left;">BRANCHES ALL OVER INDIA</td>
    <td style="float:left;"><INPUT TYPE="TEXT" NAME="name" SIZE="32"><br />
Name Signature of customer
    
    </td>
    <td style="float:right;"><input type="submit" name="edit" value="Update Quotation" style=" background:#66FF00; border:1px solid #000000; cursor:pointer;" onclick="return validateForm();" /></td>
  </tr>
</table>
    </td>
  </tr>
  <tr>
    <td>
    
    <table width="956" border="1">

  <tr>
    <td>
    
    <table border="0">
  <tr>
    <td>
    
    <table border="0">
  <tr>
   <!-- <td><input type="checkbox" name="vehicle" value="Bike"></td>-->
    <td>Ahmedabad</td>
  </tr>
</table>
    
    </td>
  </tr>
  <tr>
    <td><table border="0">
  <tr>
    <!--<td><input type="checkbox" name="vehicle" value="Bike"></td>-->
    <td>Delhi</td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td>
    
    <table border="0">
  <tr>
   <!-- <td><input type="checkbox" name="vehicle" value="Bike"></td>-->
    <td>Mumbai</td>
  </tr>
</table>
    
    
    </td>
  </tr>
</table>
    </td>
    <td>
    <table border="0">
  <tr>
    <td>
    
    <table border="0">
  <tr>
   <!-- <td><input type="checkbox" name="vehicle" value="Bike"></td>-->
    <td>Bangalore</td>
  </tr>
</table>
    
    </td>
  </tr>
  <tr>
    <td><table border="0">
  <tr>
   <!-- <td><input type="checkbox" name="vehicle" value="Bike"></td>-->
    <td>Gurgaon</td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td>
    
    <table border="0">
  <tr>
    <!--<td><input type="checkbox" name="vehicle" value="Bike"></td>-->
    <td>Nagpur</td>
  </tr>
</table>
    
    
    </td>
  </tr>
</table>

    </td>
    <td>
    <table border="0">
  <tr>
    <td>
    
    <table border="0">
  <tr>
   <!-- <td><input type="checkbox" name="vehicle" value="Bike"></td>-->
    <td>Bhuvaneshwar</td>
  </tr>
</table>

    </td>
  </tr>
  <tr>
    <td><table border="0">
  <tr>
  <!--  <td><input type="checkbox" name="vehicle" value="Bike"></td>-->
    <td>Haldwani</td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td>
    
    <table border="0">
  <tr>
   <!-- <td><input type="checkbox" name="vehicle" value="Bike"></td>-->
    <td>Patna</td>
  </tr>
</table>
    
    
    </td>
  </tr>
</table>
    
    </td>
    <td>
    
    <table border="0">
  <tr>
    <td>
    
    <table border="0">
  <tr>
   <!-- <td><input type="checkbox" name="vehicle" value="Bike"></td>-->
    <td>Chennai</td>
  </tr>
</table>

    </td>
  </tr>
  <tr>
    <td><table border="0">
  <tr>
   <!-- <td><input type="checkbox" name="vehicle" value="Bike"></td>-->
    <td>Hyderabad</td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td>
    
    <table border="0">
  <tr>
   <!-- <td><input type="checkbox" name="vehicle" value="Bike"></td>-->
    <td>Pune</td>
  </tr>
</table>
 
    </td>
  </tr>
</table>
    
    </td>
    <td>
    
    <table border="0">
  <tr>
    <td>
    
    <table border="0">
  <tr>
  <!--  <td><input type="checkbox" name="vehicle" value="Bike"></td>-->
    <td>Cochin</td>
  </tr>
</table>

 
    </td>
  </tr>
  <tr>
    <td><table border="0">
  <tr>
   <!-- <td><input type="checkbox" name="vehicle" value="Bike"></td>-->
    <td>Jaipur</td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td>
    
    <table border="0">
  <tr>
   <!-- <td><input type="checkbox" name="vehicle" value="Bike"></td>-->
    <td>Ranchi</td>
  </tr>
</table>
    
    
    </td>
  </tr>
</table>
    
    </td>
    <td>
   
    <table border="0">
  <tr>
    <td>
    
    <table border="0">
  <tr>
   <!-- <td><input type="checkbox" name="vehicle" value="Bike"></td>-->
    <td>Dehradun</td>
  </tr>
</table>


    </td>
  </tr>
  <tr>
    <td><table border="0">
  <tr>
   <!-- <td><input type="checkbox" name="vehicle" value="Bike"></td>-->
    <td>Kolkata</td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td>
    
    <table border="0">
  <tr>
 <!--   <td><input type="checkbox" name="vehicle" value="Bike"></td>-->
    <td>Rudrapur</td>
  </tr>
</table>
    
    </td>
  </tr>
</table>
    </td>
  </tr>
</table>

    </td>
  </tr>
</table>
</form>
<?php }?>
</body>
</html>
