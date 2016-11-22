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
		
	var x = document.forms["add_invy"]["to"].value;
	
    if (x == null || x == "") {
        alert("Please fill the recipient.");
        return false;
    }/*else if(!x.match(numexp)){alert("Bill number should only be digits"); return false;}*/
	
	
	var a = document.forms["add_invy"]["order_no"].value;
    if (a == null || a == "") {
        alert("Please fill the order number.");
        return false;
    }/*else if(!a.match(numexp)){alert("Book number should only be digits"); return false;}*/
	
	var y = document.forms["add_invy"]["order_date"].value;
	 if (y == null || y == "") {
        alert("Please choose a Order date.");
        return false;
    }
	
	
	var z = document.forms["add_invy"]["gr_no"].value;
	 if (z == null || z == "") {
        alert("Please choose a GR number.");
        return false;
    }
	var p = document.forms["add_invy"]["gr_date"].value;
	 if (p == null || p == "") {
        alert("Please choose a GR date.");
        return false;
    }
	
	var b = document.forms["add_invy"]["sl_no"].value;
	 if (b == null || b == "") {
        alert("Please fill the Sl number");
        return false;
    }/*else if(!b.match(numexp)){alert("Sl number should only be digits"); return false;}*/
	
	var c = document.forms["add_invy"]["description"].value;
	 if (c == null || c == "") {
        alert("Please fill the description");
        return false;
    	}
	var d = document.forms["add_invy"]["part"].value;
	 if (d == null || d == "") {
        alert("Please fill the part number");
        return false;
    	}	
	var e = document.forms["add_invy"]["qty"].value;
	 if (e == null || e == "") {
        alert("Please fill the quantity.");
        return false;
    	}	
	var f = document.forms["add_invy"]["rate"].value;
	 if (f == null || f == "") {
        alert("Please fill the rate");
        return false;
    	}	
	var g = document.forms["add_invy"]["amount"].value;
	 if (g == null || g == "") {
        alert("Please fill the amount");
        return false;
    	}	
	var h = document.forms["add_invy"]["rupee"].value;
	 if (h == null || h == "") {
        alert("Please fill the Rupees in words");
        return false;
    	}	
	var i = document.forms["add_invy"]["total"].value;
	 if (i == null || i == "") {
        alert("Please fill the Grand total amount");
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

<form action="invy_sec_submit.php" method="post" enctype="multipart/form-data" name="add_invy">
<table width="800" border="1" align="center" bordercolor="#999999">
  <tr>
    <td>
    
    <table width="873" border="1"  bordercolor="#999999">
  <tr>
            <td>
                <table width="200" border="0">
                  <tr>
                    <td>PAN No :AAFCB2400H</td>
                  </tr>
                  <tr>
                    <td height="160"><img src="images/logo.png" /></td>
                  </tr>
            </table>
            
            </td>
    <td>
    
    
                        <table width="600" border="0">
                          <tr>
                            <td><div align="right">Service Tax No. AAFCB2400HSD001</div></td>
                          </tr>
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
                      
                    </table>
    
</td>
</tr>
</table>

    
 </td>
 </tr>
 <tr>
    <td>
    
    
           <table width="874" border="1"  bordercolor="#999999">
          <tr>
            <td width="376">
            <table width="370">
          <tr>
            <td height="46" valign="top" colspan="3">To,&nbsp;
              <textarea cols="45" rows="5" name="to"></textarea></td>
          </tr>
          
        </table>
            
            </td>
                <td width="482">
                
                <table width="467" border="0">
              <tr>
                    <td>
                    
                    <table width="461" border="0">
                  <tr>
                    <td width="227">Order No.&nbsp;
                      <INPUT TYPE="TEXT" NAME="order_no" SIZE="29"></td>
                    <td width="223">GR No.&nbsp;
                      <INPUT TYPE="TEXT" NAME="gr_no" SIZE="28"></td>
                  </tr>
                </table>
                    
                    </td>
              </tr>
                  <tr>
                    <td>
                    <table width="461" border="0">
                  <tr>
                    <td>Date&nbsp;<INPUT TYPE="TEXT" NAME="order_date" SIZE="29" class="datepker"></td>
                    <td>Date&nbsp;<INPUT TYPE="TEXT" NAME="gr_date" SIZE="28" class="datepker"></td>
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
<td>
    
 <table width="873" style="border:1px solid #ccc;">
 
 <tr height="40">
    <td style="border:1px solid #ccc;">SL.No.</td>
    <td width="380" align="center" style="border:1px solid #ccc;">Description of goods</td>
    <td width="120" align="center" style="border:1px solid #ccc;">Part No.</td>
    <td width="73" align="center" style="border:1px solid #ccc;">Qty.</td>
    <td width="62" align="center" style="border:1px solid #ccc;">Rate</td>
    <td width="170" align="center" style="border:1px solid #ccc;">Amount</td>
    <td width="60" align="center" style="border:1px solid #ccc;">P.</td>
  </tr>
 
 
  <tr>
    <td width="37" ><textarea cols="2" rows="30" name="sl_no"></textarea></td>
    <td width="350"> <textarea cols="40" rows="30" name="description"></textarea></td>
    <td width="105" ><textarea cols="10" rows="30" name="part"></textarea></td>
    <td width="65"><textarea cols="5" rows="30" name="qty"></textarea></td>
    <td width="50"><textarea cols="5" rows="30" name="rate"></textarea></td>
    <td width="154"><textarea cols="15" rows="30" name="amount"></textarea></td>
    <td width="66"><textarea cols="4" rows="30" name="p"></textarea></td>
  </tr>
</table>   
    
    
  </td>
  </tr>
  <tr>
    <td>
    
    <table width="873" border="0">
  <tr>
    <td width="43">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td width="332">Rupees<textarea cols="40" rows="2" name="rupee"></textarea></td>
    <td width="250">
    <table width="250" border="0"  bordercolor="#999999">
  <tr>
    <td><div align="right">Total:</div></td>
  </tr>
  
</table>
    </td>
    <td width="122"><textarea cols="13" rows="2" name="total" placeholder="Rupees"></textarea></td>
    <td width="35"><textarea cols="5" rows="2" name="paise" placeholder="Paise"></textarea></td>
  </tr>
</table>
 <div style="float:right; margin-top:1%; margin-bottom:.5%; background:#FF0000; padding:3px;">
  <input type="submit" name="submit" value="Add Invoice" style=" background:#66FF00; border:1px solid #000000; cursor:pointer;" onclick="return validateForm();" />
  </div>
    </td>
  </tr>
  <tr>
  
    <td>
    
    <table width="874" border="1"  bordercolor="#999999">
  <tr>
    <td>
    
    <table width="580" border="0">
  <tr>
    <td>Goods once sold shall not the exchanged or tacken back. </td>
  </tr>
  <tr>
    <td>Check all the goods at the time of delivery</td>
  </tr>
  <tr>
    <td>the breakage or damage in transit will not be entertained</td>
  </tr>
  <tr>
    <td>All desputes subjects to Delhi Jurisdiction</td>
  </tr>
  <tr>
    <td>Service to be given by Respective Company only</td>
  </tr>
</table>

    
    </td>
    <td>
    
    <table width="240" border="0">
  <tr>
    <td>BALKARA LOGISTICS PVT. LTD</td>
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
<?php }elseif($type=='edit'){
$id=$_GET['id'];
 $id = convert_uudecode(base64_decode($id));
//echo $id; die;

$result=mysql_query("SELECT * FROM `invoice_sec_table` JOIN `meta_table` ON (invoice_sec_table.sec_id = meta_table.invoice_item_id) WHERE invoice_sec_table.sec_id ='$id' && meta_table.meta_key='invoice-sec'") or die(mysql_error());
$row = mysql_fetch_array($result);
//print_r($row['s_no']);die;
 $sl_no=$row['sl_no'];
 $description=$row['description'];
 $part=$row['part'];
 $qty=$row['qty'];
 $rate=$row['rate'];
 $amount=$row['amount'];
 $p=$row['p'];
 $metavalue=unserialize($row['meta_value']);?>
 
 <form action="invy_sec_submit.php" method="post" enctype="multipart/form-data" name="add_invy">
<table width="800" border="1" align="center" bordercolor="#999999">
  <tr>
    <td>
    
    <table width="873" border="1"  bordercolor="#999999">
  <tr>
            <td>
                <table width="200" border="0">
                  <tr>
                    <td>PAN No :AAFCB2400H</td>
                  </tr>
                  <tr>
                    <td height="160"><img src="images/logo.png" /></td>
                  </tr>
            </table>
            
            </td>
    <td>
    
    
                        <table width="600" border="0">
                          <tr>
                            <td><div align="right">Service Tax No. AAFCB2400HSD001</div></td>
                          </tr>
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
                      
                    </table>
    
</td>
</tr>
</table>

    
 </td>
 </tr>
 <tr>
    <td>
    
    
           <table width="874" border="1"  bordercolor="#999999">
          <tr>
            <td width="376">
            <table width="370">
          <tr>
            <td height="46" valign="top" colspan="3">To,&nbsp;
              <textarea cols="45" rows="5" name="to"><?php echo $metavalue['to']; ?></textarea>
              <INPUT type="hidden" NAME="invoice_sec_id" value="<?php echo $row['sec_id']; ?>">
              </td>
          </tr>
          
        </table>
            
            </td>
                <td width="482">
                
                <table width="467" border="0">
              <tr>
                    <td>
                    
                    <table width="461" border="0">
                  <tr>
                    <td width="227">Order No.&nbsp;
                      <INPUT TYPE="TEXT" NAME="order_no" SIZE="29" value="<?php echo $metavalue['order_no']; ?>"></td>
                    <td width="223">GR No.&nbsp;
                      <INPUT TYPE="TEXT" NAME="gr_no" SIZE="28" value="<?php echo $metavalue['gr_no']; ?>"></td>
                  </tr>
                </table>
                    
                    </td>
              </tr>
                  <tr>
                    <td>
                    <table width="461" border="0">
                  <tr>
                    <td>Date&nbsp;<INPUT TYPE="TEXT" NAME="order_date" SIZE="29" class="datepker" value="<?php echo $metavalue['order_date']; ?>"></td>
                    <td>Date&nbsp;<INPUT TYPE="TEXT" NAME="gr_date" SIZE="28" class="datepker" value="<?php echo $metavalue['gr_date']; ?>"></td>
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
<td>
    
 <table width="873" style="border:1px solid #ccc;">
 
 <tr height="40">
    <td style="border:1px solid #ccc;">SL.No.</td>
    <td width="380" align="center" style="border:1px solid #ccc;">Description of goods</td>
    <td width="120" align="center" style="border:1px solid #ccc;">Part No.</td>
    <td width="73" align="center" style="border:1px solid #ccc;">Qty.</td>
    <td width="62" align="center" style="border:1px solid #ccc;">Rate</td>
    <td width="170" align="center" style="border:1px solid #ccc;">Amount</td>
    <td width="60" align="center" style="border:1px solid #ccc;">P.</td>
  </tr>
 
 
  <tr>
    <td width="37" ><textarea cols="2" rows="30" name="sl_no"><?php echo $sl_no; ?></textarea></td>
    <td width="350"> <textarea cols="40" rows="30" name="description"><?php echo $description; ?></textarea></td>
    <td width="105" ><textarea cols="10" rows="30" name="part"><?php echo $part; ?></textarea></td>
    <td width="65"><textarea cols="5" rows="30" name="qty"><?php echo $qty; ?></textarea></td>
    <td width="50"><textarea cols="5" rows="30" name="rate"><?php echo $rate; ?></textarea></td>
    <td width="154"><textarea cols="15" rows="30" name="amount"><?php echo $amount; ?></textarea></td>
    <td width="66"><textarea cols="4" rows="30" name="p"><?php echo $p; ?></textarea></td>
  </tr>
</table>   
    
    
  </td>
  </tr>
  <tr>
    <td>
    
    <table width="873" border="0">
  <tr>
    <td width="43">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td width="332">Rupees<textarea cols="40" rows="2" name="rupee"><?php echo $metavalue['rupee']; ?></textarea></td>
    <td width="250">
    <table width="250" border="0"  bordercolor="#999999">
  <tr>
    <td><div align="right">Total:</div></td>
  </tr>
  
</table>
    </td>
    <td width="122"><textarea cols="13" rows="2" name="total" placeholder="Rupees"><?php echo $metavalue['total']; ?></textarea></td>
    <td width="35"><textarea cols="5" rows="2" name="paise" placeholder="Paise"><?php echo $metavalue['paise']; ?></textarea></td>
  </tr>
</table>
 <div style="float:right; margin-top:1%; margin-bottom:.5%; background:#FF0000; padding:3px;">
  <input type="submit" name="edit" value="Update Invoice" style=" background:#66FF00; border:1px solid #000000; cursor:pointer;" onclick="return validateForm();" />
  </div>
    </td>
  </tr>
  <tr>
  
    <td>
    
    <table width="874" border="1"  bordercolor="#999999">
  <tr>
    <td>
    
    <table width="580" border="0">
  <tr>
    <td>Goods once sold shall not the exchanged or tacken back. </td>
  </tr>
  <tr>
    <td>Check all the goods at the time of delivery</td>
  </tr>
  <tr>
    <td>the breakage or damage in transit will not be entertained</td>
  </tr>
  <tr>
    <td>All desputes subjects to Delhi Jurisdiction</td>
  </tr>
  <tr>
    <td>Service to be given by Respective Company only</td>
  </tr>
</table>

    
    </td>
    <td>
    
    <table width="240" border="0">
  <tr>
    <td>BALKARA LOGISTICS PVT. LTD</td>
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
