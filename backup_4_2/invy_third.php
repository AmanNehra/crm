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
<title></title>

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




function validateForm()
 {
	var numexp = /^[0-9]+$/;	
		
	var x = document.forms["add_invy"]["company"].value;
	
    if (x == null || x == "") {
        alert("Please fill the company name.");
        return false;
    }/*else if(!x.match(numexp)){alert("Bill number should only be digits"); return false;}*/
	
	
	var a = document.forms["add_invy"]["truck_no"].value;
    if (a == null || a == "") {
        alert("Please fill the truck number.");
        return false;
    }/*else if(!a.match(numexp)){alert("Book number should only be digits"); return false;}*/
	
	var y = document.forms["add_invy"]["driv_desc"].value;
	 if (y == null || y == "") {
        alert("Please fill the driver's detail.");
        return false;
    }
	
	
	var z = document.forms["add_invy"]["owner_add"].value;
	 if (z == null || z == "") {
        alert("Please fill the owner's detail.");
        return false;
    }
	var p = document.forms["add_invy"]["delivery_add"].value;
	 if (p == null || p == "") {
        alert("Please fill the delivery address.");
        return false;
    }
	
	var b = document.forms["add_invy"]["gr_no"].value;
	 if (b == null || b == "") {
        alert("Please fill the G.R. number");
        return false;
    }/*else if(!b.match(numexp)){alert("Sl number should only be digits"); return false;}*/
	
	var c = document.forms["add_invy"]["from"].value;
	 if (c == null || c == "") {
        alert("Please fill the from box");
        return false;
    	}
	var d = document.forms["add_invy"]["cosignor"].value;
	 if (d == null || d == "") {
        alert("Please fill the Consignor's details");
        return false;
    	}	
	var e = document.forms["add_invy"]["cosignee"].value;
	 if (e == null || e == "") {
        alert("Please fill the Consignee's details.");
        return false;
    	}	
	var f = document.forms["add_invy"]["to"].value;
	 if (f == null || f == "") {
        alert("Please fill the To box");
        return false;
    	}	
	var g = document.forms["add_invy"]["value_goods"].value;
	 if (g == null || g == "") {
        alert("Please fill the value of goods");
        return false;
    	}	
	var h = document.forms["add_invy"]["no_of_pack"].value;
	 if (h == null || h == "") {
        alert("Please fill the Number of packages");
        return false;
    	}	
	var i = document.forms["add_invy"]["description"].value;
	 if (i == null || i == "") {
        alert("Please fill the Description");
        return false;
    	}	
	var j = document.forms["add_invy"]["to_pay"].value;
	 if (j == null || j == "") {
        alert("Please fill the To pay box");
        return false;
    	}
	var k = document.forms["add_invy"]["paid"].value;
	 if (k == null || k == "") {
        alert("Please fill the Paid box");
        return false;
    	}							

}
	</script>
    <style>textarea{resize:none;}</style>
</head>

<body>

<?php 
$type=$_GET['type'];
if ($type == "add") 
{ ?>
<form action="invy_third_submit.php" method="post" enctype="multipart/form-data" name="add_invy">

<table width="900" border="1" align="center">
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
  <tr>
    <td align="right"><strong>PAN No: AAFCB2400H</strong></td>
  </tr>
  <tr>
    <td align="center" height="60"><strong>Service Tax No.<br />
    AAFCB2400HSD001</strong> </td>
  </tr>
</table>

    </td>
  </tr>
</table>

    </td>
  </tr>
  <tr>
<td>
    
    
  <table width="956" border="0">
  <tr>
    <td width="225">
    
    <table width="225" border="1" height="340">
  <tr>
    <td height="20"><div align="center">CAUTION</div></td>
  </tr>
  <tr>
    <td height="100"><div align="justify">This consignment will not be detained diverted re-routed or re-booked widthout Consignee banks written permission it will be delivered at tech destination.</div></td>
  </tr>
  <tr>
    <td height="20"><div align="center">CAUTION</div></td>
  </tr>
  <tr>
    <td height="150"><div align="justify">The consigment coverd bu this set of Special Lorry Receipt from shall be storted of the destination under the control of the transport operator and shall be delivered to or to the Consignee Bank whose name is mentioned in the Lorry Receipt.</div></td>
  </tr>
</table>

    
    </td>
    <td width="288">
    
    <table width="278" border="1" height="340">
  <tr>
    <td align="center">AT OWNER'S RISK</td>
  </tr>
  <tr>
    <td align="center">CONSIGNOR COPY</td>
  </tr>
  <tr>
    <td align="center">INSURANCE</td>
  </tr>
  <tr>
    <td>The Customer has stated that He has insured the consignment </td>
  </tr>
  <tr>
    <td height="28">OR</td>
  </tr>
  <tr>
    <td>he has not insured consigment</td>
  </tr>
  <tr>
    <td>Company:<INPUT TYPE="TEXT" NAME="company" SIZE="40"></td>
  </tr>
  <tr>
    <td>
    
    <table width="278" border="0" >
  <tr>
    <td>Policy No:
      <input type="text" name="policy" size="14" /></td>
    <td>Date:<INPUT TYPE="TEXT" NAME="policy_date" SIZE="14" class="datepker"></td>
  </tr>
</table>
    
    </td>
  </tr>
  <tr>
    <td>
    
    
   <table width="278" border="0">
  <tr>
    <td>Amount:
      <input type="text" name="amount" size="14" /></td>
    <td>Date:<INPUT TYPE="TEXT" NAME="amount_date" SIZE="14" class="datepker"></td>
  </tr>
</table> 

    
    </td>
  </tr>
 
</table>
    
    
    </td>
    <td width="225">
    
    <table width="225" border="1" height="340">
  <tr>
    <td>
    Truck No.:<INPUT TYPE="TEXT" NAME="truck_no" SIZE="31">
    
    
    </td>
  </tr>
  <tr>
    <td> Driver's Name & Lic. Name<textarea cols="24" rows="3" name="driv_desc"></textarea></td>
  </tr>
  <tr>
    <td>Owner's. Address<textarea cols="24" rows="3" name="owner_add"></textarea></td>
  </tr>
  <tr>
    <td height="25" align="center"><strong>Address of delivery office:</strong></td>
  </tr>
  <tr>
    <td><textarea cols="24" rows="3" name="delivery_add"></textarea></td>
  </tr>
  
</table>
    
    </td>
    <td>
    
    <table width="202" border="0" height="340">
  <tr>
    <td height="100">
    G.R No:<textarea cols="19" rows="5" name="gr_no"></textarea>
    
    
    </td>
  </tr>
  <tr>
    <td>Date:<input type="text" name="gr_date" width="80" class="datepker" /></td>
  </tr>
  <tr>
    <td> From:<textarea cols="19" rows="4" name="from"></textarea></td>
  </tr>
</table>
    
    </td>
  </tr>
</table>
    
    
  </td>
  </tr>
  <tr>
    <td>
    <table width="900" border="0">
  <tr>
    <td><table width="752" border="0">
  <tr>
    <td>Consignor Name & Address & C.S.T. Tin No./:<textarea cols="90" rows="3" name="cosignor"></textarea></td>
  </tr>
  <tr>
    <td>Consignee Name & Address & C.S.T. Tin No./:<textarea cols="90" rows="3" name="cosignee"></textarea></td>
  </tr>
</table>
</td>
    <td><table width="190" border="0">
  <tr>
    <td>To:<textarea cols="19" rows="3" name="to"></textarea></td>
  </tr>
  <tr>
    <td>Value of Goods:<textarea cols="19" rows="3" name="value_goods"></textarea></td>
  </tr>
</table>
</td>
  </tr>
</table>
    
    </td>
  </tr>
  <tr>
    <td>
    
    <table width="958" border="0">
  <tr>
    <td width="755">
    
    <table width="750" border="0">
  <tr>
    <td width="100">
    
    <table width="100" border="0" height="350">
  <tr>
    <td align="center">No. of<br />Packages
    
    </td>
  </tr>
  <tr>
    <td><textarea cols="8" rows="16" name="no_of_pack"></textarea></td>
  </tr>
</table>
    </td>
    <td width="200">
    
    <table width="200" border="0" height="350">
  <tr>
    <td align="center">DESCRIPTION<br />(Said to Contain)
    
    </td>
  </tr>
  <tr>
    <td><textarea cols="21" rows="12" name="description"></textarea></td>
  </tr>
  
  <tr>
    <td> Value<textarea cols="21" rows="1" name="value"></textarea></td>
  </tr>
  
  </table>
    
    
    </td>
    <td width="100">
    
   
    <table width="100" border="0" height="350">
  <tr>
    <td align="center">Actual<br />
    Weight</td>
  </tr>
  <tr>
    <td><textarea cols="8" rows="4" name="actual_weight"></textarea></td>
  </tr>
  <tr>
    <td align="center">Driver / Owners<br />Signature</td>
  </tr>
  <tr>
    <td><textarea cols="8" rows="4" name="driv_sign"></textarea></td>
  </tr>
</table>
    </td>
    <td width="100">
    
    
    <table width="100" border="0" height="365">
  <tr>
    <td height="40" align="right">RATE</td>
  </tr>
  <tr>
    <td align="right" height="20" valign="top">Freight</td>
  </tr>
  <tr>
    <td align="right" height="12" valign="top">Over Load</td>
  </tr>
  <tr>
    <td align="right" height="12">Labour Ch.</td>
  </tr>
  <tr>
    <td align="right" height="12">Kanta</td>
  </tr>
  <tr>
    <td align="right" height="12" style="padding-top:5x;">Service Tax</td>
  </tr>
  <tr>
    <td align="right" height="24">Border Ch</td>
  </tr>
  <tr>
    <td align="right" height="22">G.R.</td>
  </tr>
  <tr>
    <td align="right" height="12">Total</td>
  </tr>
  <tr>
    <td align="right" height="12">Advance</td>
  </tr>
  <tr>
    <td align="right" height="10" style="padding-top:5x;">Balance</td>
  </tr>
</table>
    </td>
    <td width="228">
    
    <table width="221" border="0" height="360">
  <tr>
    <td width="218">
    <table width="211" border="0">
  <tr>
    <td width="208" align="center" height="20">Amount</td>
  </tr>
  <tr>
    <td>
    <table width="203" border="0">
  <tr>
    <td width="139">Rs.</td>
    <td width="48">P.</td>
  </tr>
</table>
    
    </td>
  </tr>
</table>
    
    
    </td>
  </tr>
  <tr>
    <td>
    
    <table width="200" border="0">
  <tr>
    <td height="28" ><INPUT TYPE="TEXT" NAME="rate" SIZE="19"></td>
    <td><INPUT TYPE="TEXT" NAME="rate_p" SIZE="5"></td>
  </tr>
  <tr>
    <td height="28" ><INPUT TYPE="TEXT" NAME="freight" SIZE="19"></td>
    <td><INPUT TYPE="TEXT" NAME="freight_p" SIZE="5"></td>
  </tr>
  <tr>
   <td height="28" ><INPUT TYPE="TEXT" NAME="over_load" SIZE="19"></td>
    <td><INPUT TYPE="TEXT" NAME="over_load_p" SIZE="5"></td>
  </tr>
  <tr>
    <td height="28" ><INPUT TYPE="TEXT" NAME="labor_ch" SIZE="19"></td>
    <td><INPUT TYPE="TEXT" NAME="labor_ch_p" SIZE="5"></td>
  </tr>
  <tr>
    <td height="28" ><INPUT TYPE="TEXT" NAME="kanta" SIZE="19"></td>
    <td><INPUT TYPE="TEXT" NAME="kanta_p" SIZE="5"></td>
  </tr>
  <tr>
   <td  height="28"><INPUT TYPE="TEXT" NAME="servic_tax" SIZE="19"></td>
    <td><INPUT TYPE="TEXT" NAME="servic_tax_p" SIZE="5"></td>
  </tr>
  <tr>
    <td ><INPUT TYPE="TEXT" NAME="border_ch" SIZE="19"></td>
    <td><INPUT TYPE="TEXT" NAME="border_ch_p" SIZE="5"></td>
  </tr>
  <tr>
    <td height="28" ><INPUT TYPE="text" NAME="gr" SIZE="19"></td>
    <td><INPUT TYPE="TEXT" NAME="gr_p" SIZE="5"></td>
  </tr>
  <tr>
    <td ><INPUT TYPE="TEXT" NAME="total" SIZE="19"></td>
    <td><INPUT TYPE="TEXT" NAME="total_p" SIZE="5"></td>
  </tr>
  <tr>
   <td height="28" ><INPUT TYPE="text" NAME="advance" SIZE="19"></td>
    <td><INPUT TYPE="TEXT" NAME="advance_p" SIZE="5"></td>
  </tr>
</table>
    
    
    </td>
  </tr>
</table>

    
    </td>
  </tr>
</table>
    
    
    </td>
    <td width="193">
    
    
    <table width="180" border="0" height="360" >
  <tr>
    <td height="100">
    TO PAY:<textarea cols="18" rows="3" name="to_pay"></textarea>
    
    
    </td>
  </tr>
  <tr>
    <td>PAID:<textarea cols="18" rows="3" name="paid"></textarea></td>
  </tr>
  <tr>
    <td> To Be Billed At:<textarea cols="18" rows="3" name="to_be_billed"></textarea></td>
  </tr>
</table>
    
    
    </td>
  </tr>
</table>
    
    
    </td>
  </tr>
  <tr>
    <td>
    <table width="958" border="1">
  <tr>
    <td width="364">
    Consignor's Signature 
      <INPUT TYPE="TEXT" NAME="cosigner" SIZE="30">
    
    </td>
    <td width="364">Authorised Signature 
      <INPUT TYPE="TEXT" NAME="auth_sign" SIZE="30"></td>
       <td width="60"><input type="submit" name="submit" value="Add Invoice" style=" background:#66FF00; border:1px solid #000000; cursor:pointer;" onclick="return validateForm();"/></td>
    <td width="208">
    
    <table width="206" border="0">
  <tr>
    <td width="203"  style="font-size:15px; font-weight:bold;">BALKARA LOGISTICS PVT. LTD.</td>
  </tr>
  <tr>
    <td  style="font-size:30px; font-weight:bold;">Truckwaale.com</td>
  </tr>
</table>

    
    </td>
  </tr>
</table>

    
    </td>
  </tr>
</table>
</form><?php }elseif($type=='edit'){

$id=$_GET['id'];
//echo $id; die;
 $id = convert_uudecode(base64_decode($id));
 $result=mysql_query("SELECT * FROM `invoice_third_table` JOIN `meta_table` ON (invoice_third_table.third_id = meta_table.invoice_item_id) WHERE invoice_third_table.third_id ='$id' && meta_table.meta_key='invoice-third' ") or die(mysql_error());
$row = mysql_fetch_array($result);
$idss=$row['third_id'];
$no_of_pack=$row['no_of_pack'];
$description=$row['description'];
$value=$row['value'];
$actual_weight=$row['actual_weight'];
//$amount=$row['amount'];
$cosignator=$row['cosignator'];
$cosignee=$row['cosignee'];
 $other_exp=unserialize($row['amountss']);
$metavalue=unserialize($row['meta_value']);
//$other_exp=$row['amount'];
//print_r($other_exp);die;

?>

<form action="invy_third_submit.php" method="post" enctype="multipart/form-data" name="add_invy">

<table width="900" border="1" align="center">
  <tr>
    <td>
    
    <table width="957" border="1">
  <tr>
    <td width="245"><img src="images/logo.png" /></td>
    <td width="470">
    
    <table width="501" border="0">
  <tr>
   <td width="491" valign="top" style="font-size:20px; font-weight:bold;">BALKARA LOGISTICS PVT. LTD. <input type="button" onclick="window.print();" value="print" style="cursor:pointer; background:#00FF00; margin-left:20%"></td>
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
  <tr>
    <td align="right"><strong>PAN No: AAFCB2400H</strong></td>
  </tr>
  <tr>
    <td align="center" height="60"><strong>Service Tax No.<br />
    AAFCB2400HSD001</strong> </td>
  </tr>
</table>

    </td>
  </tr>
</table>

    </td>
  </tr>
  <tr>
<td>
    
    
  <table width="956" border="0">
  <tr>
    <td width="225">
    
    <table width="225" border="1" height="340">
  <tr>
    <td height="20"><div align="center">CAUTION</div></td>
  </tr>
  <tr>
    <td height="100"><div align="justify">This consignment will not be detained diverted re-routed or re-booked widthout Consignee banks written permission it will be delivered at tech destination.</div></td>
  </tr>
  <tr>
    <td height="20"><div align="center">CAUTION</div></td>
  </tr>
  <tr>
    <td height="150"><div align="justify">The consigment coverd bu this set of Special Lorry Receipt from shall be storted of the destination under the control of the transport operator and shall be delivered to or to the Consignee Bank whose name is mentioned in the Lorry Receipt.</div></td>
  </tr>
</table>

    
    </td>
    <td width="288">
    
    <table width="278" border="1" height="340">
  <tr>
    <td align="center">AT OWNER'S RISK</td>
  </tr>
  <tr>
    <td align="center">CONSIGNOR COPY</td>
  </tr>
  <tr>
    <td align="center">INSURANCE</td>
  </tr>
  <tr>
    <td>The Customer has stated that He has insured the consignment </td>
  </tr>
  <tr>
    <td height="28">OR</td>
  </tr>
  <tr>
    <td>he has not insured consigment</td>
  </tr>
  <tr>
    <td>Company:<INPUT TYPE="TEXT" NAME="company" SIZE="40" value="<?php echo $metavalue['company']; ?>">
    <INPUT type="hidden" NAME="thr_id" value="<?php echo $idss; ?>">
    </td>
  </tr>
  <tr>
    <td>
    
    <table width="278" border="0" >
  <tr>
    <td>Policy No:
      <input type="text" name="policy" size="14" value="<?php echo $metavalue['policy']; ?>" /></td>
    <td>Date:<INPUT TYPE="TEXT" NAME="policy_date" SIZE="14" class="datepker" value="<?php echo $metavalue['policy_date']; ?>"></td>
  </tr>
</table>
    
    </td>
  </tr>
  <tr>
    <td>
    
    
   <table width="278" border="0">
  <tr>
    <td>Amount:
      <input type="text" name="amount" size="14" value="<?php echo $metavalue['amount']; ?>" /></td>
    <td>Date:<INPUT TYPE="TEXT" NAME="amount_date" SIZE="14" class="datepker" value="<?php echo $metavalue['amount_date']; ?>"></td>
  </tr>
</table> 

    
    </td>
  </tr>
 
</table>
    
    
    </td>
    <td width="225">
    
    <table width="225" border="1" height="340">
  <tr>
    <td>
    Truck No.:<INPUT TYPE="TEXT" NAME="truck_no" SIZE="31" value="<?php echo $metavalue['truck_no']; ?>">
    
    
    </td>
  </tr>
  <tr>
    <td> Driver's Name & Lic. Name<textarea cols="24" rows="3" name="driv_desc"><?php echo $metavalue['driv_desc']; ?></textarea></td>
  </tr>
  <tr>
    <td>Owner's. Address<textarea cols="24" rows="3" name="owner_add"><?php echo $metavalue['owner_add']; ?></textarea></td>
  </tr>
  <tr>
    <td height="25" align="center"><strong>Address of delivery office:</strong></td>
  </tr>
  <tr>
    <td><textarea cols="24" rows="3" name="delivery_add"><?php echo $metavalue['delivery_add']; ?></textarea></td>
  </tr>
  
</table>
    
    </td>
    <td>
    
    <table width="202" border="0" height="340">
  <tr>
    <td height="100">
    G.R No:<textarea cols="19" rows="5" name="gr_no"><?php echo $metavalue['gr_no']; ?></textarea>
    
    
    </td>
  </tr>
  <tr>
    <td>Date:<input type="text" name="gr_date" width="80" class="datepker" value="<?php echo $metavalue['gr_date']; ?>" /></td>
  </tr>
  <tr>
    <td> From:<textarea cols="19" rows="4" name="from"><?php echo $metavalue['from']; ?></textarea></td>
  </tr>
</table>
    
    </td>
  </tr>
</table>
    
    
  </td>
  </tr>
  <tr>
    <td>
    <table width="900" border="0">
  <tr>
    <td><table width="752" border="0">
  <tr>
    <td>Consignor Name & Address & C.S.T. Tin No./:<textarea cols="90" rows="3" name="cosignor"><?php echo $cosignator; ?></textarea></td>
  </tr>
  <tr>
    <td>Consignee Name & Address & C.S.T. Tin No./:<textarea cols="90" rows="3" name="cosignee"><?php echo $cosignee; ?></textarea></td>
  </tr>
</table>
</td>
    <td><table width="190" border="0">
  <tr>
    <td>To:<textarea cols="19" rows="3" name="to"><?php echo $metavalue['to']; ?></textarea></td>
  </tr>
  <tr>
    <td>Value of Goods:<textarea cols="19" rows="3" name="value_goods"><?php echo $metavalue['value_goods']; ?></textarea></td>
  </tr>
</table>
</td>
  </tr>
</table>
    
    </td>
  </tr>
  <tr>
    <td>
    
    <table width="958" border="0">
  <tr>
    <td width="755">
    
    <table width="750" border="0">
  <tr>
    <td width="100">
    
    <table width="100" border="0" height="350">
  <tr>
    <td align="center">No. of<br />Packages
    
    </td>
  </tr>
  <tr>
    <td><textarea cols="8" rows="16" name="no_of_pack"><?php echo $no_of_pack; ?></textarea></td>
  </tr>
</table>
    </td>
    <td width="200">
    
    <table width="200" border="0" height="340">
  <tr>
    <td align="center">DESCRIPTION<br />(Said to Contain)
    
    </td>
  </tr>
  <tr>
    <td><textarea cols="21" rows="12" name="description"><?php echo $description; ?></textarea></td>
  </tr>
  
  <tr>
    <td> Value<textarea cols="21" rows="1" name="value"><?php echo $value; ?></textarea></td>
  </tr>
  
  </table>
    
    
    </td>
    <td width="100">
    
   
    <table width="100" border="0" height="350">
  <tr>
    <td align="center">Actual<br />
    Weight</td>
  </tr>
  <tr>
    <td><textarea cols="8" rows="4" name="actual_weight"><?php echo $actual_weight; ?></textarea></td>
  </tr>
  <tr>
    <td align="center">Driver / Owners<br />Signature</td>
  </tr>
  <tr>
    <td><textarea cols="8" rows="4" name="driv_sign"></textarea></td>
  </tr>
</table>
    </td>
    <td width="100">
    
    
    <table width="100" border="0" height="350">
  <tr>
    <td height="40" align="right">RATE</td>
  </tr>
  <tr>
    <td align="right" height="20" valign="top">Freight</td>
  </tr>
  <tr>
    <td align="right" height="12" valign="top">Over Load</td>
  </tr>
  <tr>
    <td align="right" height="12">Labour Ch.</td>
  </tr>
  <tr>
    <td align="right" height="12">Kanta</td>
  </tr>
  <tr>
    <td align="right" height="12" style="padding-top:5x;">Service Tax</td>
  </tr>
  <tr>
    <td align="right" height="24">Border Ch</td>
  </tr>
  <tr>
    <td align="right" height="22">G.R.</td>
  </tr>
  <tr>
    <td align="right" height="12">Total</td>
  </tr>
  <tr>
    <td align="right" height="12">Advance</td>
  </tr>
  <tr>
    <td align="right" height="10" style="padding-top:5x;">Balance</td>
  </tr>
</table>
    </td>
    <td width="228">
    
    <table width="221" border="0" height="360">
  <tr>
    <td width="218">
    <table width="211" border="0">
  <tr>
    <td width="208" align="center" height="20">Amount</td>
  </tr>
  <tr>
    <td>
    <table width="203" border="0">
  <tr>
    <td width="139">Rs.</td>
    <td width="48">P.</td>
  </tr>
</table>
    
    </td>
  </tr>
</table>
    
    
    </td>
  </tr>
  <tr>
    <td>
    
    <table width="200" border="0">
  <tr>
    <td height="28" ><INPUT TYPE="TEXT" NAME="rate" SIZE="19" value="<?php echo $other_exp['rate']; ?>"></td>
    <td><INPUT TYPE="TEXT" NAME="rate_p" SIZE="5" value="<?php echo $other_exp['rate_p']; ?>"></td>
  </tr>
  <tr>
    <td height="28" ><INPUT TYPE="TEXT" NAME="freight" SIZE="19" value="<?php echo $other_exp['freight']; ?>"></td>
    <td><INPUT TYPE="TEXT" NAME="freight_p" SIZE="5" value="<?php echo $other_exp['freight_p']; ?>"></td>
  </tr>
  <tr>
   <td height="28" ><INPUT TYPE="TEXT" NAME="over_load" SIZE="19" value="<?php echo $other_exp['over_load']; ?>"></td>
    <td><INPUT TYPE="TEXT" NAME="over_load_p" SIZE="5" value="<?php echo $other_exp['over_load']; ?>"></td>
  </tr>
  <tr>
    <td height="28" ><INPUT TYPE="TEXT" NAME="labor_ch" SIZE="19" value="<?php echo $other_exp['labor_ch']; ?>"></td>
    <td><INPUT TYPE="TEXT" NAME="labor_ch_p" SIZE="5" value="<?php echo $other_exp['labor_ch_p']; ?>"></td>
  </tr>
  <tr>
    <td height="28" ><INPUT TYPE="TEXT" NAME="kanta" SIZE="19" value="<?php echo $other_exp['kanta']; ?>"></td>
    <td><INPUT TYPE="TEXT" NAME="kanta_p" SIZE="5" value="<?php echo $other_exp['kanta_p']; ?>"></td>
  </tr>
  <tr>
   <td  height="28"><INPUT TYPE="TEXT" NAME="servic_tax" SIZE="19" value="<?php echo $other_exp['servic_tax']; ?>"></td>
    <td><INPUT TYPE="TEXT" NAME="servic_tax_p" SIZE="5" value="<?php echo $other_exp['servic_tax_p']; ?>"></td>
  </tr>
  <tr>
    <td ><INPUT TYPE="TEXT" NAME="border_ch" SIZE="19" value="<?php echo $other_exp['border_ch']; ?>"></td>
    <td><INPUT TYPE="TEXT" NAME="border_ch_p" SIZE="5" value="<?php echo $other_exp['border_ch_p']; ?>"></td>
  </tr>
  <tr>
    <td height="28" ><INPUT TYPE="text" NAME="gr" SIZE="19" value="<?php echo $other_exp['gr']; ?>"></td>
    <td><INPUT TYPE="TEXT" NAME="gr_p" SIZE="5" value="<?php echo $other_exp['gr_p']; ?>"></td>
  </tr>
  <tr>
    <td ><INPUT TYPE="TEXT" NAME="total" SIZE="19" value="<?php echo $other_exp['total']; ?>"></td>
    <td><INPUT TYPE="TEXT" NAME="total_p" SIZE="5" value="<?php echo $other_exp['total_p']; ?>"></td>
  </tr>
  <tr>
   <td height="28" ><INPUT TYPE="text" NAME="advance" SIZE="19" value="<?php echo $other_exp['advance']; ?>"></td>
    <td><INPUT TYPE="TEXT" NAME="advance_p" SIZE="5" value="<?php echo $other_exp['advance_p']; ?>"></td>
  </tr>
</table>
    
    
    </td>
  </tr>
</table>

    
    </td>
  </tr>
</table>
    
    
    </td>
    <td width="193">
    
    
    <table width="180" border="0" height="360" >
  <tr>
    <td height="100">
    TO PAY:<textarea cols="18" rows="3" name="to_pay"><?php echo $metavalue['to_pay']; ?></textarea>
    
    
    </td>
  </tr>
  <tr>
    <td>PAID:<textarea cols="18" rows="3" name="paid"><?php echo $metavalue['paid']; ?></textarea></td>
  </tr>
  <tr>
    <td> To Be Billed At:<textarea cols="18" rows="3" name="to_be_billed"><?php echo $metavalue['to_be_billed']; ?></textarea></td>
  </tr>
</table>
    
    
    </td>
  </tr>
</table>
    
    
    </td>
  </tr>
  <tr>
    <td>
    <table width="958" border="1">
  <tr>
    <td width="364">
    Consignor's Signature 
      <INPUT TYPE="TEXT" NAME="cosigner" SIZE="30">
    
    </td>
    <td width="364">Authorised Signature 
      <INPUT TYPE="TEXT" NAME="auth_sign" SIZE="30"></td>
       <td width="60"><input type="submit" name="edit" value="Update Invoice" style=" background:#66FF00; border:1px solid #000000; cursor:pointer;" onclick="return validateForm();" /></td>
    <td width="208">
    
    <table width="206" border="0">
  <tr>
    <td width="203"  style="font-size:15px; font-weight:bold;">BALKARA LOGISTICS PVT. LTD.</td>
  </tr>
  <tr>
    <td  style="font-size:30px; font-weight:bold;">Truckwaale.com</td>
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