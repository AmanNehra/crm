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

 <!-- <script type="text/javascript" src="lib/bootstrap-datepicker.js"></script>-->
  <!--<link rel="stylesheet" type="text/css" href="lib/bootstrap-datepicker.css" />-->

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
		
	var x = document.forms["add_invy"]["bill_no"].value;
	
    if (x == null || x == "") {
        alert("Please fill the bill number.");
        return false;
    }else if(!x.match(numexp)){alert("Bill number should only be digits"); return false;}
	
	
	var a = document.forms["add_invy"]["book_no"].value;
    if (a == null || a == "") {
        alert("Please fill the book number.");
        return false;
    }else if(!a.match(numexp)){alert("Book number should only be digits"); return false;}
	
	var y = document.forms["add_invy"]["bill_date"].value;
	 if (y == null || y == "") {
        alert("Please choose a billing date.");
        return false;
    }
	
	var z = document.forms["add_invy"]["ms"].value;
	 if (z == null || z == "") {
        alert("Please fill the M/S box");
        return false;
    }
	
	var b = document.forms["add_invy"]["po_no"].value;
	 if (b == null || b == "") {
        alert("Please fill the P.O. number");
        return false;
    }else if(!b.match(numexp)){alert("P.O. number should only be digits"); return false;}
	
	var c = document.forms["add_invy"]["w_code"].value;
	 if (c == null || c == "") {
        alert("Please fill the W.Code");
        return false;
    	}
	var d = document.forms["add_invy"]["carier"].value;
	 if (d == null || d == "") {
        alert("Please fill the carrier");
        return false;
    	}	
	var e = document.forms["add_invy"]["time"].value;
	 if (e == null || e == "") {
        alert("Please fill the time.");
        return false;
    	}	
	var f = document.forms["add_invy"]["rr_gr_no"].value;
	 if (f == null || f == "") {
        alert("Please fill the R.R/G.R number");
        return false;
    	}	
	var g = document.forms["add_invy"]["party_tin"].value;
	 if (g == null || g == "") {
        alert("Please fill the Party,s TIN/CST number");
        return false;
    	}	
	var h = document.forms["add_invy"]["rupees"].value;
	 if (h == null || h == "") {
        alert("Please fill the Rupees in words");
        return false;
    	}	
	var i = document.forms["add_invy"]["grand_total"].value;
	 if (i == null || i == "") {
        alert("Please fill the Grand total amount");
        return false;
    	}						

}
	</script>
    <style>
   /* input[type='text']
 {
 text-align:center !important;
 }*/
    </style>
 
</head>

<body>
<?php 
$type=$_GET['type'];
//echo $type;
//$action = $_GET['action']; 


if ($type == "add") 
{ ?>
<form action="invy_submit.php" method="post" enctype="multipart/form-data" name="add_invy">
<table width="800" border="1" align="center">
  <tr>
    <td colspan="5">
    
    
    <table width="874" border="1" height="auto">
  <tr>
    <td>
    
    <table style="width:280px;" border="0">
  <tr>
    <td valign="top">PAN No :AAFCB2400H</td>
  </tr>
  <tr>
    <td valign="top">Service Tax No. AAFCB2400HSD001</td>
  </tr>
  <tr>
    <td  valign="top"><img src="images/logo.png" /></td>
  </tr>
  <tr>
    <td height="70" valign="bottom">Bill No.&nbsp;<INPUT TYPE="TEXT" NAME="bill_no" SIZE="20"></td>
  </tr>
</table>
    
    </td>
    <td>
    
    <table width="520" border="0">
  <tr>
    <td style="font-size:20px; font-weight:bold;" valign="top">BALKARA LOGISTICS PVT. LTD. <input type="button" onclick="window.print();" value="print" style="cursor:pointer; background:#00FF00; margin-left:20%"></td>
    
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
  <tr>
    <td height="35" valign="bottom">
    <table width="545" border="0">
  <tr>
    <td>Book No.&nbsp;<INPUT TYPE="TEXT" NAME="book_no" SIZE="20"></td>
    <td align="right">Dated.&nbsp;
      <input type="TEXT" name="bill_date" size="22" class="datepker"/></td>
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
  <tr>
    <td colspan="5">
    
    <table width="874" border="1">
  <tr>
    <td width="376">
    <table width="370">
  <tr>
    <td height="46" valign="top" colspan="3">M/s&nbsp;
      <textarea cols="45" rows="5" name="ms"></textarea></td>
  </tr>
  
</table>

    
    </td>
    <td width="482">
    
    
    
    <table width="467" border="0">
  <tr>
    <td>
    
    <table width="460" border="0">
  <tr>
    <td>P.O. No&nbsp;<INPUT TYPE="TEXT" NAME="po_no" SIZE="29"></td>
    <td>Date&nbsp;<INPUT TYPE="TEXT" NAME="po_date" SIZE="28" class="datepker"></td>
  </tr>
</table>

    
    
    </td>
  </tr>
  <tr>
    <td>
    <table width="461" border="0">
  <tr>
    <td>W.Code&nbsp;<INPUT TYPE="TEXT" NAME="w_code" SIZE="29"></td>
    <td>Date&nbsp;<INPUT TYPE="TEXT" NAME="w_date" SIZE="28" class="datepker"></td>
  </tr>
</table>


</td>
  </tr>
  <tr>
    <td>
    <table width="461" border="0">
  <tr>
   <td width="40">Carrier&nbsp; <INPUT TYPE="TEXT" NAME="carier" SIZE="29"></td>
    <td width="40">
    
    Time&nbsp;
    <table width="220">
  <tr>
    <td><INPUT TYPE="TEXT" NAME="time" SIZE="15" id="timers"></td>
    <td><input style="cursor:pointer; background:#00FF00;" type="button" value="Current Time" id="setTimeButton" /></td>
  </tr>
</table>

    
    
    
    
    
    
    </td>
  </tr>
  
</table></td>
  </tr>
  
  
  <tr>
    <td>
    <table width="463" border="0">
  <tr>
   <td colspan="2">R.R/G.R No.&nbsp;<INPUT TYPE="TEXT" NAME="rr_gr_no" SIZE="53"></td>
    
  </tr>
  
</table></td>
  </tr>
  
</table>
    
    </td>
  </tr>
</table>

    
    </td>
    
  </tr>
  <tr>
    <td colspan="5">
    
                    <table width="873" border="1">
                  <tr>
                    <td width="37" align="center">S.No.</td>
                    <td width="341" align="center">PARTICULARS</td>
                    <td width="120" align="center">ITEM<br />
                      CODE</td>
                    <td width="73" align="center">QTY.</td>
                    <td width="62" align="center">RATE</td>
                    <td width="180" align="center">AMOUNT</td>
                  </tr>
                  <tr>
                    <td><INPUT TYPE="TEXT" NAME="s_no1" SIZE="5"></td>
                    <td><INPUT TYPE="TEXT" NAME="particular1" SIZE="50"></td>
                    <td><INPUT TYPE="TEXT" NAME="item1" SIZE="15"></td>
                    <td><INPUT TYPE="TEXT" NAME="qty1" SIZE="10"></td>
                    <td><INPUT TYPE="TEXT" NAME="rate1" SIZE="10"></td>
                    <td><INPUT TYPE="TEXT" NAME="amount1" SIZE="15"></td>
                  </tr>
                  <tr>
                    <td><INPUT TYPE="TEXT" NAME="s_no2" SIZE="5"></td>
                    <td><INPUT TYPE="TEXT" NAME="particular2" SIZE="50"></td>
                    <td><INPUT TYPE="TEXT" NAME="item2" SIZE="15"></td>
                    <td><INPUT TYPE="TEXT" NAME="qty2" SIZE="10"></td>
                    <td><INPUT TYPE="TEXT" NAME="rate2" SIZE="10"></td>
                    <td><INPUT TYPE="TEXT" NAME="amount2" SIZE="15"></td>
                  </tr>
                  <tr>
                     <td><INPUT TYPE="TEXT" NAME="s_no3" SIZE="5"></td>
                    <td><INPUT TYPE="TEXT" NAME="particular3" SIZE="50"></td>
                    <td><INPUT TYPE="TEXT" NAME="item3" SIZE="15"></td>
                    <td><INPUT TYPE="TEXT" NAME="qty3" SIZE="10"></td>
                    <td><INPUT TYPE="TEXT" NAME="rate3" SIZE="10"></td>
                    <td><INPUT TYPE="TEXT" NAME="amount3" SIZE="15"></td>
                  </tr>
                  <tr>
                    <td><INPUT TYPE="TEXT" NAME="s_no4" SIZE="5"></td>
                    <td><INPUT TYPE="TEXT" NAME="particular4" SIZE="50"></td>
                    <td><INPUT TYPE="TEXT" NAME="item4" SIZE="15"></td>
                    <td><INPUT TYPE="TEXT" NAME="qty4" SIZE="10"></td>
                    <td><INPUT TYPE="TEXT" NAME="rate4" SIZE="10"></td>
                    <td><INPUT TYPE="TEXT" NAME="amount4" SIZE="15"></td>
                  </tr>
                  <tr>
                    <td><INPUT TYPE="TEXT" NAME="s_no5" SIZE="5"></td>
                    <td><INPUT TYPE="TEXT" NAME="particular5" SIZE="50"></td>
                    <td><INPUT TYPE="TEXT" NAME="item5" SIZE="15"></td>
                    <td><INPUT TYPE="TEXT" NAME="qty5" SIZE="10"></td>
                    <td><INPUT TYPE="TEXT" NAME="rate5" SIZE="10"></td>
                    <td><INPUT TYPE="TEXT" NAME="amount5" SIZE="15"></td>
                  </tr>
                  <tr>
                     <td><INPUT TYPE="TEXT" NAME="s_no6" SIZE="5"></td>
                    <td><INPUT TYPE="TEXT" NAME="particular6" SIZE="50"></td>
                    <td><INPUT TYPE="TEXT" NAME="item6" SIZE="15"></td>
                    <td><INPUT TYPE="TEXT" NAME="qty6" SIZE="10"></td>
                    <td><INPUT TYPE="TEXT" NAME="rate6" SIZE="10"></td>
                    <td><INPUT TYPE="TEXT" NAME="amount6" SIZE="15"></td>
                  </tr>
                  <tr>
                     <td><INPUT TYPE="TEXT" NAME="s_no7" SIZE="5"></td>
                    <td><INPUT TYPE="TEXT" NAME="particular7" SIZE="50"></td>
                    <td><INPUT TYPE="TEXT" NAME="item7" SIZE="15"></td>
                    <td><INPUT TYPE="TEXT" NAME="qty7" SIZE="10"></td>
                    <td><INPUT TYPE="TEXT" NAME="rate7" SIZE="10"></td>
                    <td><INPUT TYPE="TEXT" NAME="amount7" SIZE="15"></td>
                  </tr>
                  <tr>
                     <td><INPUT TYPE="TEXT" NAME="s_no8" SIZE="5"></td>
                    <td><INPUT TYPE="TEXT" NAME="particular8" SIZE="50"></td>
                    <td><INPUT TYPE="TEXT" NAME="item8" SIZE="15"></td>
                    <td><INPUT TYPE="TEXT" NAME="qty8" SIZE="10"></td>
                    <td><INPUT TYPE="TEXT" NAME="rate8" SIZE="10"></td>
                    <td><INPUT TYPE="TEXT" NAME="amount8" SIZE="15"></td>
                  </tr>
                  <tr>
                     <td><INPUT TYPE="TEXT" NAME="s_no9" SIZE="5"></td>
                    <td><INPUT TYPE="TEXT" NAME="particular9" SIZE="50"></td>
                    <td><INPUT TYPE="TEXT" NAME="item9" SIZE="15"></td>
                    <td><INPUT TYPE="TEXT" NAME="qty9" SIZE="10"></td>
                    <td><INPUT TYPE="TEXT" NAME="rate9" SIZE="10"></td>
                    <td><INPUT TYPE="TEXT" NAME="amount9" SIZE="15"></td>
                  </tr>
                  <tr>
                    <td><INPUT TYPE="TEXT" NAME="s_no10" SIZE="5"></td>
                    <td><INPUT TYPE="TEXT" NAME="particular10" SIZE="50"></td>
                    <td><INPUT TYPE="TEXT" NAME="item10" SIZE="15"></td>
                    <td><INPUT TYPE="TEXT" NAME="qty10" SIZE="10"></td>
                    <td><INPUT TYPE="TEXT" NAME="rate10" SIZE="10"></td>
                    <td><INPUT TYPE="TEXT" NAME="amount10" SIZE="15"></td>
                  </tr>
                  <tr>
                    <td><INPUT TYPE="TEXT" NAME="s_no11" SIZE="5"></td>
                    <td><INPUT TYPE="TEXT" NAME="particular11" SIZE="50"></td>
                    <td><INPUT TYPE="TEXT" NAME="item11" SIZE="15"></td>
                    <td><INPUT TYPE="TEXT" NAME="qty11" SIZE="10"></td>
                    <td><INPUT TYPE="TEXT" NAME="rate11" SIZE="10"></td>
                    <td><INPUT TYPE="TEXT" NAME="amount11" SIZE="15"></td>
                  </tr>
                  <tr>
                    <td><INPUT TYPE="TEXT" NAME="s_no12" SIZE="5"></td>
                    <td><INPUT TYPE="TEXT" NAME="particular12" SIZE="50"></td>
                    <td><INPUT TYPE="TEXT" NAME="item12" SIZE="15"></td>
                    <td><INPUT TYPE="TEXT" NAME="qty12" SIZE="10"></td>
                    <td><INPUT TYPE="TEXT" NAME="rate12" SIZE="10"></td>
                    <td><INPUT TYPE="TEXT" NAME="amount12" SIZE="15"></td>
                  </tr>
                  <tr>
                     <td><INPUT TYPE="TEXT" NAME="s_no13" SIZE="5"></td>
                    <td><INPUT TYPE="TEXT" NAME="particular13" SIZE="50"></td>
                    <td><INPUT TYPE="TEXT" NAME="item13" SIZE="15"></td>
                    <td><INPUT TYPE="TEXT" NAME="qty13" SIZE="10"></td>
                    <td><INPUT TYPE="TEXT" NAME="rate13" SIZE="10"></td>
                    <td><INPUT TYPE="TEXT" NAME="amount13" SIZE="15"></td>
                  </tr>
                   <tr>
                     <td><INPUT TYPE="TEXT" NAME="s_no14" SIZE="5"></td>
                    <td><INPUT TYPE="TEXT" NAME="particular14" SIZE="50"></td>
                    <td><INPUT TYPE="TEXT" NAME="item14" SIZE="15"></td>
                    <td><INPUT TYPE="TEXT" NAME="qty14" SIZE="10"></td>
                    <td><INPUT TYPE="TEXT" NAME="rate14" SIZE="10"></td>
                    <td><INPUT TYPE="TEXT" NAME="amount14" SIZE="15"></td>
                  </tr>
                  <tr>
                    <td><INPUT TYPE="TEXT" NAME="s_no15" SIZE="5"></td>
                    <td align="center">Sale Against Central Farm C/H/F/</td>
                   <td><INPUT TYPE="TEXT" NAME="item15" SIZE="15"></td>
                    <td><INPUT TYPE="TEXT" NAME="qty15" SIZE="10"></td>
                    <td><INPUT TYPE="TEXT" NAME="rate15" SIZE="10"></td>
                    <td><INPUT TYPE="TEXT" NAME="amount15" SIZE="15"></td>
                  </tr>
                </table>

    
    
    
    </td>
    
  </tr>
  <tr>
    <td colspan="5">
    
    
                    <table width="873" border="1">
                  <tr>
                    <td style="padding:0px;">
                    
                    
                    <table width="510" border="0">
                  <tr>
                    <td width="510">
                   
                   <table width="510" border="0">
                  <tr height="25">
                    <td >Party,s TIN/CST No &nbsp; <INPUT TYPE="TEXT" NAME="party_tin" SIZE="21"></td>
                    <td>Dated &nbsp;
                      <INPUT TYPE="TEXT" NAME="party_tin_date" SIZE="18" class="datepker"></td>
                  </tr>
                </table>
                
                   
                   
                    
                    </td>
                  </tr>
                  <tr>
                    <td height="100" align="left" valign="top">Rupees:
                      <textarea cols="52" rows="5" name="rupees"></textarea></td>
                  </tr>
                </table>
                
                    
                    </td>
                    <td>
                    
                    <table width="340" border="0">
                  <tr height="30">
                    <td width="100">TOTAL</td>
                    <td width="158"> <INPUT TYPE="TEXT" NAME="total" SIZE="35"></td>
                  </tr>
                  <tr>
                    <td height="30">Service Tax</td>
                    <td> <INPUT TYPE="TEXT" NAME="service_tax" SIZE="35"></td>
                  </tr>
                  <tr>
                    <td height="30">CARTAGE</td>
                    <td> <INPUT TYPE="TEXT" NAME="cartage" SIZE="35"></td>
                  </tr>
                  <tr>
                    <td height="30">G. TOTAL</td>
                    <td> <INPUT TYPE="TEXT" NAME="grand_total" SIZE="35"></td>
                  </tr>
                </table>
                
                    </td>
                  </tr>
                </table>
  <div style="float:right; margin-top:1%; margin-bottom:.5%; background:#FF0000; padding:3px;">
  <input type="submit" name="submit" value="Add Invoice" style=" background:#66FF00; border:1px solid #000000; cursor:pointer;" onclick="return validateForm();" />
  </div>
    
    </td>
    
   
    
  </tr>
 		 <tr>
   			 <td colspan="5">
    
    
                                <table width="874" border="1">
                              <tr>
                                <td>
                                
                                <table width="580" border="0">
                              <tr>
                                <td><strong>E.&.O.E.</strong> </td>
                              </tr>
                              <tr>
                                <td><strong>Term & Conditions.</strong></td>
                              </tr>
                              <tr>
                                <td>1. Goods once sold will not be taken back</td>
                              </tr>
                              <tr>
                                <td>2. Internet 18% p.a. will be charged if bill not paid within 15 days. </td>
                              </tr>
                              <tr>
                                <td>3. Subjact to Delhi Jurisdiction only.</td>
                              </tr>
                            </table>
                            
                                
                                </td>
                                <td>
                                
                                <table width="240" border="0">
                              <tr>
                                <td>BALXARA LOGISTICS PVT. LTD</td>
                              </tr>
                              <tr>
                                <td height="50" valign="top" style="font-size:25px;">Truckwaale.com</td>
                              </tr>
                              <tr>
                                <td>Authorised Signatory</td>
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
//echo $id; die;

$result=mysql_query("SELECT * FROM `invoice_item_table` JOIN `meta_table` ON (invoice_item_table.item_id = meta_table.invoice_item_id) WHERE invoice_item_table.item_id ='$id' && meta_table.meta_key='invoice-item'") or die(mysql_error());
$row = mysql_fetch_array($result);
//print_r($row['s_no']);die;
 $sno=unserialize($row['s_no']);
 $partic=unserialize($row['particular']);
 $itmcod=unserialize($row['itemcode']);
 $qtyy=unserialize($row['qty']);
 $rates=unserialize($row['rate']);
 $amounts=unserialize($row['amount']);
 
 $metavalue=unserialize($row['meta_value']);
 
 
?>

<form action="invy_submit.php" method="post" enctype="multipart/form-data" name="add_invy">
<table width="800" border="1" align="center">
  <tr>
    <td colspan="5">
    
    
    <table width="874" border="1" height="auto">
  <tr>
    <td>
    
    <table style="width:280px;" border="0">
  <tr>
    <td valign="top">PAN No :AAFCB2400H</td>
  </tr>
  <tr>
    <td valign="top">Service Tax No. AAFCB2400HSD001</td>
  </tr>
  <tr>
    <td  valign="top"><img src="images/logo.png" /></td>
  </tr>
  <tr><INPUT type="hidden" NAME="invoice_itm_id" value="<?php echo $row['invoice_item_id']; ?>">
    <td height="70" valign="bottom">Bill No.&nbsp;<INPUT TYPE="TEXT" NAME="bill_no" SIZE="20" value="<?php echo $metavalue['bill_no']; ?>"></td>
  </tr>
</table>
    
    </td>
    <td>
    
            <table width="520" border="0">
                  <tr>
                    <td style="font-size:20px; font-weight:bold;" valign="top">BALKARA LOGISTICS PVT. LTD. <input type="button" onclick="window.print();" value="print" style="cursor:pointer; background:#00FF00; margin-left:20%"></td>
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
                  <tr>
                    <td height="35" valign="bottom">
                    <table width="545" border="0">
                  <tr>
                    <td>Book No.&nbsp;<INPUT TYPE="TEXT" NAME="book_no" SIZE="20" value="<?php echo $metavalue['book_no']; ?>"></td>
                    <td align="right">Dated.&nbsp;
                      <input type="TEXT" name="bill_date" size="22" class="datepker"/ value="<?php echo $metavalue['bill_date']; ?>"></td>
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
          <tr>
            <td colspan="5">
            
            <table width="874" border="1">
          <tr>
            <td width="376">
            <table width="370">
          <tr>
            <td height="46" valign="top" colspan="3">M/s&nbsp;
              <textarea cols="45" rows="5" name="ms"><?php echo $metavalue['ms']; ?></textarea></td>
          </tr>
          
        </table>
            
            </td>
            <td width="482">
            
                    <table width="467" border="0">
                      <tr>
                        <td>
                        
                        <table width="460" border="0">
                      <tr>
                        <td>P.O. No&nbsp;<INPUT TYPE="TEXT" NAME="po_no" SIZE="29" value="<?php echo $metavalue['po_no']; ?>"></td>
                        <td>Date&nbsp;<INPUT TYPE="TEXT" NAME="po_date" SIZE="28" class="datepker" value="<?php echo $metavalue['po_date']; ?>"></td>
                      </tr>
                    </table>
                        
                        </td>
                      </tr>
                  <tr>
                    <td>
                    <table width="461" border="0">
                  <tr>
                    <td>W.Code&nbsp;<INPUT TYPE="TEXT" NAME="w_code" SIZE="29" value="<?php echo $metavalue['w_code']; ?>"></td>
                    <td>Date&nbsp;<INPUT TYPE="TEXT" NAME="w_date" SIZE="28" class="datepker" value="<?php echo $metavalue['w_date']; ?>"></td>
                  </tr>
                </table>
                
                
                </td>
                  </tr>
                  <tr>
                    <td>
                    <table width="461" border="0">
                  <tr>
                   <td width="40">Carrier&nbsp; <INPUT TYPE="TEXT" NAME="carier" SIZE="29" value="<?php echo $metavalue['carier']; ?>"></td>
                    <td width="40">
                    
                    Time&nbsp;
                    <table width="220">
                  <tr>
                    <td><INPUT TYPE="TEXT" NAME="time" SIZE="15" id="timers" value="<?php echo $metavalue['time']; ?>"></td>
                    <td><input style="cursor:pointer; background:#00FF00;" type="button" value="Current Time" id="setTimeButton" /></td>
                  </tr>
                </table>
                    
                    </td>
                  </tr>
                  
                </table>
                </td>
                  </tr>
                  
                  <tr>
                    <td>
                    <table width="463" border="0">
                  <tr>
                   <td colspan="2">R.R/G.R No.&nbsp;<INPUT TYPE="TEXT" NAME="rr_gr_no" SIZE="53" value="<?php echo $metavalue['rr_gr_no']; ?>"></td>
                    
                  </tr>
                </table></td>
                  </tr>
                  
                </table>
            
            </td>
          </tr>
        </table>
            
            </td>
            
          </tr>
  <tr>
    <td colspan="5">
    
                    <table width="873" border="1">
                  <tr>
                    <td width="37" align="center">S.No.</td>
                    <td width="341" align="center">PARTICULARS</td>
                    <td width="120" align="center">ITEM<br />
                      CODE</td>
                    <td width="73" align="center">QTY.</td>
                    <td width="62" align="center">RATE</td>
                    <td width="180" align="center">AMOUNT</td>
                  </tr>
                  <tr>
                    <td><INPUT TYPE="TEXT" NAME="s_no1" SIZE="5" value="<?php echo $sno['s_no1']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="particular1" SIZE="50" value="<?php echo $partic['particular1']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="item1" SIZE="15" value="<?php echo $itmcod['item1']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="qty1" SIZE="10" value="<?php echo $qtyy['qty1']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="rate1" SIZE="10" value="<?php echo $rates['rate1']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="amount1" SIZE="15" value="<?php echo $amounts['amount1']; ?>"></td>
                  </tr>
                  <tr>
                    <td><INPUT TYPE="TEXT" NAME="s_no2" SIZE="5" value="<?php echo $sno['s_no2']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="particular2" SIZE="50" value="<?php echo $partic['particular2']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="item2" SIZE="15" value="<?php echo $itmcod['item2']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="qty2" SIZE="10" value="<?php echo $qtyy['qty2']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="rate2" SIZE="10" value="<?php echo $rates['rate2']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="amount2" SIZE="15" value="<?php echo $amounts['amount2']; ?>"></td>
                  </tr>
                  <tr>
                     <td><INPUT TYPE="TEXT" NAME="s_no3" SIZE="5" value="<?php echo $sno['s_no3']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="particular3" SIZE="50" value="<?php echo $partic['particular3']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="item3" SIZE="15" value="<?php echo $itmcod['item3']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="qty3" SIZE="10" value="<?php echo $qtyy['qty3']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="rate3" SIZE="10" value="<?php echo $rates['rate3']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="amount3" SIZE="15" value="<?php echo $amounts['amount3']; ?>"></td>
                  </tr>
                  <tr>
                    <td><INPUT TYPE="TEXT" NAME="s_no4" SIZE="5" value="<?php echo $sno['s_no4']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="particular4" SIZE="50" value="<?php echo $partic['particular4']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="item4" SIZE="15" value="<?php echo $itmcod['item4']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="qty4" SIZE="10" value="<?php echo $qtyy['qty4']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="rate4" SIZE="10" value="<?php echo $rates['rate4']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="amount4" SIZE="15" value="<?php echo $amounts['amount4']; ?>"></td>
                  </tr>
                  <tr>
                    <td><INPUT TYPE="TEXT" NAME="s_no5" SIZE="5" value="<?php echo $sno['s_no5']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="particular5" SIZE="50" value="<?php echo $partic['particular5']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="item5" SIZE="15" value="<?php echo $itmcod['item5']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="qty5" SIZE="10" value="<?php echo $qtyy['qty5']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="rate5" SIZE="10" value="<?php echo $rates['rate5']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="amount5" SIZE="15" value="<?php echo $amounts['amount5']; ?>"></td>
                  </tr>
                  <tr>
                     <td><INPUT TYPE="TEXT" NAME="s_no6" SIZE="5" value="<?php echo $sno['s_no6']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="particular6" SIZE="50" value="<?php echo $partic['particular6']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="item6" SIZE="15" value="<?php echo $itmcod['item6']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="qty6" SIZE="10" value="<?php echo $qtyy['qty6']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="rate6" SIZE="10" value="<?php echo $rates['rate6']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="amount6" SIZE="15" value="<?php echo $amounts['amount6']; ?>"></td>
                  </tr>
                  <tr>
                     <td><INPUT TYPE="TEXT" NAME="s_no7" SIZE="5" value="<?php echo $sno['s_no7']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="particular7" SIZE="50" value="<?php echo $partic['particular7']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="item7" SIZE="15" value="<?php echo $itmcod['item7']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="qty7" SIZE="10" value="<?php echo $qtyy['qty7']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="rate7" SIZE="10" value="<?php echo $rates['rate7']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="amount7" SIZE="15" value="<?php echo $amounts['amount7']; ?>"></td>
                  </tr>
                  <tr>
                     <td><INPUT TYPE="TEXT" NAME="s_no8" SIZE="5" value="<?php echo $sno['s_no8']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="particular8" SIZE="50" value="<?php echo $partic['particular8']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="item8" SIZE="15" value="<?php echo $itmcod['item8']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="qty8" SIZE="10" value="<?php echo $qtyy['qty8']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="rate8" SIZE="10" value="<?php echo $rates['rate8']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="amount8" SIZE="15" value="<?php echo $amounts['amount8']; ?>"></td>
                  </tr>
                  <tr>
                     <td><INPUT TYPE="TEXT" NAME="s_no9" SIZE="5" value="<?php echo $sno['s_no9']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="particular9" SIZE="50" value="<?php echo $partic['particular9']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="item9" SIZE="15" value="<?php echo $itmcod['item9']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="qty9" SIZE="10" value="<?php echo $qtyy['qty9']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="rate9" SIZE="10" value="<?php echo $rates['rate9']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="amount9" SIZE="15" value="<?php echo $amounts['amount9']; ?>"></td>
                  </tr>
                  <tr>
                    <td><INPUT TYPE="TEXT" NAME="s_no10" SIZE="5" value="<?php echo $sno['s_no10']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="particular10" SIZE="50" value="<?php echo $partic['particular10']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="item10" SIZE="15" value="<?php echo $itmcod['item10']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="qty10" SIZE="10" value="<?php echo $qtyy['qty10']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="rate10" SIZE="10" value="<?php echo $rates['rate10']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="amount10" SIZE="15" value="<?php echo $amounts['amount10']; ?>"></td>
                  </tr>
                  <tr>
                    <td><INPUT TYPE="TEXT" NAME="s_no11" SIZE="5" value="<?php echo $sno['s_no11']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="particular11" SIZE="50" value="<?php echo $partic['particular11']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="item11" SIZE="15" value="<?php echo $itmcod['item11']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="qty11" SIZE="10" value="<?php echo $qtyy['qty11']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="rate11" SIZE="10" value="<?php echo $rates['rate11']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="amount11" SIZE="15" value="<?php echo $amounts['amount11']; ?>"></td>
                  </tr>
                  <tr>
                    <td><INPUT TYPE="TEXT" NAME="s_no12" SIZE="5" value="<?php echo $sno['s_no12']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="particular12" SIZE="50" value="<?php echo $partic['particular12']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="item12" SIZE="15" value="<?php echo $itmcod['item12']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="qty12" SIZE="10" value="<?php echo $qtyy['qty12']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="rate12" SIZE="10" value="<?php echo $rates['rate12']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="amount12" SIZE="15" value="<?php echo $amounts['amount12']; ?>"></td>
                  </tr>
                  <tr>
                     <td><INPUT TYPE="TEXT" NAME="s_no13" SIZE="5" value="<?php echo $sno['s_no13']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="particular13" SIZE="50" value="<?php echo $partic['particular13']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="item13" SIZE="15" value="<?php echo $itmcod['item13']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="qty13" SIZE="10" value="<?php echo $qtyy['qty13']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="rate13" SIZE="10" value="<?php echo $rates['rate13']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="amount13" SIZE="15" value="<?php echo $amounts['amount13']; ?>"></td>
                  </tr>
                   <tr>
                     <td><INPUT TYPE="TEXT" NAME="s_no14" SIZE="5" value="<?php echo $sno['s_no14']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="particular14" SIZE="50" value="<?php echo $partic['particular14']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="item14" SIZE="15" value="<?php echo $itmcod['item14']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="qty14" SIZE="10" value="<?php echo $qtyy['qty14']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="rate14" SIZE="10" value="<?php echo $rates['rate14']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="amount14" SIZE="15" value="<?php echo $amounts['amount14']; ?>"></td>
                  </tr>
                  <tr>
                    <td><INPUT TYPE="TEXT" NAME="s_no15" SIZE="5" value="<?php echo $sno['s_no15']; ?>"></td>
                    <td align="center">Sale Against Central Farm C/H/F/</td>
                   <td><INPUT TYPE="TEXT" NAME="item15" SIZE="15" value="<?php echo $itmcod['item15']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="qty15" SIZE="10" value="<?php echo $qtyy['qty15']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="rate15" SIZE="10" value="<?php echo $rates['rate15']; ?>"></td>
                    <td><INPUT TYPE="TEXT" NAME="amount15" SIZE="15" value="<?php echo $amounts['amount15']; ?>"></td>
                  </tr>
                </table>
    
    </td>
    
  </tr>
  <tr>
    <td colspan="5">
                    <table width="873" border="1">
                  <tr>
                    <td>
                    
                    
                    <table width="510" border="0">
                  <tr>
                    <td width="510">
                   
                   <table width="510" border="0">
                  <tr height="25">
                    <td >Party,s TIN/CST No &nbsp; <INPUT TYPE="TEXT" NAME="party_tin" SIZE="21" value="<?php echo $metavalue['party_tin']; ?>"></td>
                    <td>Dated &nbsp;
                      <INPUT TYPE="TEXT" NAME="party_tin_date" SIZE="18" class="datepker" value="<?php echo $metavalue['party_tin_date']; ?>"></td>
                  </tr>
                </table>
                    
                    </td>
                  </tr>
                  <tr>
                    <td height="100" align="left" valign="top">Rupees:
                      <textarea cols="52" rows="5" name="rupees"><?php echo $metavalue['rupees']; ?></textarea></td>
                  </tr>
                </table>
                    </td>
                    <td>
                    
                    <table width="340" border="0">
                  <tr height="30">
                    <td width="100">TOTAL</td>
                    <td width="158"> <INPUT TYPE="TEXT" NAME="total" SIZE="35" value="<?php echo $metavalue['total']; ?>"></td>
                  </tr>
                  <tr>
                    <td height="30">Service Tax</td>
                    <td> <INPUT TYPE="TEXT" NAME="service_tax" SIZE="35" value="<?php echo $metavalue['service_tax']; ?>"></td>
                  </tr>
                  <tr>
                    <td height="30">CARTAGE</td>
                    <td> <INPUT TYPE="TEXT" NAME="cartage" SIZE="35" value="<?php echo $metavalue['cartage']; ?>"></td>
                  </tr>
                  <tr>
                    <td height="30">G. TOTAL</td>
                    <td> <INPUT TYPE="TEXT" NAME="grand_total" SIZE="35" value="<?php echo $metavalue['grand_total']; ?>"></td>
                  </tr>
                </table>
                
                    </td>
                  </tr>
                </table>
  <div style="float:right; margin-top:1%; margin-bottom:.5%; background:#FF0000; padding:3px;">
  <input type="submit" name="edit" value="Update Invoice" style=" background:#66FF00; border:1px solid #000000; cursor:pointer;" onclick="return validateForm();" />
  </div>
    
    </td>
    
  </tr>
 		 <tr>
   			 <td colspan="5">
    
                                <table width="874" border="1">
                              <tr>
                                <td>
                                
                                <table width="580" border="0">
                              <tr>
                                <td><strong>E.&.O.E.</strong> </td>
                              </tr>
                              <tr>
                                <td><strong>Term & Conditions.</strong></td>
                              </tr>
                              <tr>
                                <td>1. Goods once sold will not be taken back</td>
                              </tr>
                              <tr>
                                <td>2. Internet 18% p.a. will be charged if bill not paid within 15 days. </td>
                              </tr>
                              <tr>
                                <td>3. Subjact to Delhi Jurisdiction only.</td>
                              </tr>
                            </table>
                            
                                
                                </td>
                                <td>
                                
                                <table width="240" border="0">
                              <tr>
                                <td>BALXARA LOGISTICS PVT. LTD</td>
                              </tr>
                              <tr>
                                <td height="50" valign="top" style="font-size:25px;">Truckwaale.com</td>
                              </tr>
                              <tr>
                                <td>Authorised Signatory</td>
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
