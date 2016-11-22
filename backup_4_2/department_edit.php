<?php $id = convert_uudecode(base64_decode($_GET['id']));
//echo'</pre>';print_r($id);die; 
include('header.php');
require_once('config.php'); 
require_once('function.php');
if(isset($_POST['submit'])) {
//echo "<pre>"; print_r ($_REQUEST); die;
 
//$agent_id=
$id = $_POST['id'];
$code=strupp($_REQUEST['code']);
$department=strupp($_REQUEST['department']);
$name=strupp($_REQUEST['name']);
$designation=strupp($_REQUEST['designation']);
$address=strupp($_REQUEST['address']);
$dob=strupp($_REQUEST['dob']);
$doj=strupp($_REQUEST['doj']);
$mstatus=strupp($_REQUEST['mstatus']);
$relation=strupp($_REQUEST['relation']);
$std=strupp($_REQUEST['std']);
$city=strupp($_REQUEST['city']);
$district=strupp($_REQUEST['district']);
$state=strupp($_REQUEST['state']);
$country=strupp($_REQUEST['country']);
$pin=strupp($_REQUEST['pin']); 
$rsaddress=strupp($_REQUEST['rsaddress']);
$phone1=strupp($_REQUEST['phone1']);
$email=strupp($_REQUEST['email']);
$mobile1=strupp($_REQUEST['mobile1']);
$mobile2=strupp($_REQUEST['mobile2']);
$user12=($_REQUEST['user12']);
$pass=($_REQUEST['pass']);
$subject[]=($_REQUEST['subject']);
$item[]=($_REQUEST['item']);
$class[]=($_REQUEST['class']); 

foreach($subject[0] as $s)
  $v2[]=$s;
$subject=serialize($v2);
foreach($class[0] as $s)
  $v1[]=$s;
$class=serialize($v1); 
foreach($item[0] as $i)
   {$query=mysql_query("SELECT item_name FROM item_master_list where id='$i'");
    $data=mysql_fetch_array($query);
   if($data['item_name']!="")
    $item1[]=$data['item_name'];
   }
$item=serialize($item1);

$query=mysql_query("SELECT city FROM location_maste_info_list where id='$city'");
			    $value=mysql_fetch_assoc($query);
			    $city=$value['city'];
								 
$sq=mysql_query("UPDATE department_list SET code='$code', department='$department', name='$name', designation='$designation', address='$address',dob='$dob', doj='$doj', mstatus='$mstatus',relation='$relation', std='$std',city='$city', district='$district', state='$state', country='$country', pin='$pin',rsaddress='$rsaddress', phone1='$phone1', email='$email',mobile1='$mobile1', mobile2='$mobile2',subject='$subject', item='$item', class='$class', user='$user12', pass='$pass' where id='$id'") or die(mysql_error());
//echo'</pre>';print_r($sq);die;
if($sq){
     header('location:department_listing.php');
    }
	else{ header('location:department_edit.php?id='.$id);}} 

$result=mysql_query("SELECT * FROM department_list WHERE id= '$id' ") or die(mysql_error());
$row = mysql_fetch_array($result);
 
?>



<!-- start content-outer -->
<script>
 function onchangeajax(pid)
 { 
 //alert ("sunil");
 xmlHttp=GetXmlHttpObject()
 if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request")
 return
 }
 
 var url="location_result.php",
 url=url+"?id="+pid
 url=url+"&sid="+Math.random()
 //alert (url);
 //document.getElementById("statediv").innerHTML='Please wait..<img border="0" src="images/ajax-loader.gif">'
 if(xmlHttp.onreadystatechange=stateChanged)
 {
 xmlHttp.open("GET",url,true)
 xmlHttp.send(null)
 $('#p_school_old1').hide();
  $('#p_school_old2').hide();
   $('#p_school_old').hide();
    $('#p_school_old4').hide();
 return true; 
	
 }
 else
 {
 xmlHttp.open("GET",url,true)
 xmlHttp.send(null)
 return false;
 }
 }
 
 function stateChanged()
 {
 if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 {
 document.getElementById("statediv").innerHTML=xmlHttp.responseText
 return true;
 }
 }
 
 function GetXmlHttpObject()
 {
 var objXMLHttp=null
 if (window.XMLHttpRequest)
 {
 objXMLHttp=new XMLHttpRequest()
 }
 else if (window.ActiveXObject)
 {
 objXMLHttp=new ActiveXObject("Microsoft.XMLHTTP")
 }
 return objXMLHttp;
 }
</script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
	
$(document).ready(function() {
	var countofsection=$("#countofsection").val();
    var countofsection_value = parseInt(countofsection);
    var max_fields      = 5; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
	
	
    var x = countofsection_value; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
    
		var countofsection=$("#countofsection").val();
		var countofsection_value = parseInt(countofsection);
		countofsection_value=countofsection_value+1;
		
		$("#countofsection").val(countofsection_value);
    if(x < max_fields){
		//max input box allowed
            x++; //text box increment
       //     $(wrapper).append('<div><input type="text" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
	   
	     $.ajax({
		  url:"teacher_master_addmore.php?section="+countofsection_value,
		  type: "GET",
		  success:function(result){
			$(wrapper).append(result);		   
		  }});

			 if(x >= max_fields){
				$(".add_field_button").hide();
			}
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
		
		var countofsection=$("#countofsection").val();
		var countofsection_value = parseInt(countofsection);
		if(countofsection_value<6)
		{
			$(".add_field_button").show();
		}
		if(countofsection_value>1)
		{
			countofsection_value=countofsection_value-1;
			$("#countofsection").val(countofsection_value);
		}
					
    })
});

</script>


<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<script>
  $(function() {
$( "#datepicker" ).datepicker({
changeMonth: true,
changeYear: true, yearRange: '-40:+10'
});
});

 $(function() {
$( "#datepicker1" ).datepicker({
changeMonth: true,
changeYear: true, yearRange: '-40:+10'
});
});

 $(function() {
$( "#datepicker2" ).datepicker({
changeMonth: true,
changeYear: true, yearRange: '-40:+10'
});
});

</script>

<div id="content-outer">
<!-- start content -->
<div id="content">
 
<div id="page-heading">
  <h1>Edit Department</h1>
</div>
<a href="javascript:goback()" style="color:#FFFFFF;"><div class="addin">
    	Back
    </div></a>
<form action="" method="post" enctype="multipart/form-data" id="formid" name="form">
<input type="hidden" name="id"  value="<?php echo $row['id']; ?>"/>
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
	
	<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
        <tr>
			<th valign="top">Code No:</th>
			<td><input type="text" class="inp-form" name="code" id="cod" value="<?php echo $row['code']; ?>" /></td>
			<th valign="top">Department: <?php $department = $row['department'] ;  ?></th>
			<td> <select name="department" class="inp-form-select"> 
			<option value="" selected="selected"> Plz Select</option>
              <?php
			    $query=mysql_query("SELECT department FROM department ORDER BY department");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option <?php if($row['department']==$value['department']) echo ' selected="selected"' ;?>  value="<?php echo $value['department']; ?>"><?php echo $value['department']; ?></option>
			  <?php 
			     }   
              ?>

    </select></td>
		</tr> 
    
		<tr>
			<th valign="top">Name:</th>
			<td><input type="text" class="inp-form" name="name" id="name" value="<?php echo $row['name']; ?>" /></td>
			<th valign="top">Designation:</th>
			<td><select name="designation" class="inp-form-select"> 
			<option value="" selected="selected"> Plz Select</option>
                 <?php
			    $query=mysql_query("SELECT * FROM other_designation_list ORDER BY designation");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option <?php if($value['designation']==$row['designation']) echo 'selected="selected"'; ?> value="<?php echo $value['designation']; ?>"><?php echo $value['designation']; ?></option>
			  <?php 
			     }   
              ?>

           
    </select>
			</td>
		</tr>
    
		<tr>
			<th valign="top">Adderss:</th>
			<td><input type="text" class="inp-form" name="address" id="address"  value="<?php echo $row['address']; ?>" /></td>
			<th valign="top">DOB:</th>
			<td><input type="text" class="inp-form" name="dob" id="datepicker"   value="<?php echo $row['dob']; ?>"/></td>
		</tr>
        
        <tr>
			<th valign="top">DOJ:</th>
			<td><input type="text" class="inp-form" name="doj" id="datepicker1"  value="<?php echo $row['doj']; ?>" /></td>
			<th valign="top">M Satus:</th>
			<td><input type="text" class="inp-form" name="mstatus" id="datepicker2" value="<?php echo $row['mstatus']; ?>" /></td>
		</tr>       
        <tr id="p_school_old4">
			<th valign="top">City:</th>
			<td><input type="text" name="city" id="city" onkeyup="return pridiction(this.value);" value="<?php echo $row['city']; ?>" autocomplete="off" class="inp-form" />
			    <div id="fill" class="fill" style="display:none;" >
				
				</div>		
			</td>
		<th valign="top">District:</th>
			<td><input type="text" class="inp-form" name="district" value="<?php echo $value['district']?>" id="district" readonly="readonly"/></td>
		</tr> 
        <tr id="p_school_old1">
			<th valign="top" >State:</th>
			<td><input type="text" class="inp-form" name="state" value="<?php echo $value['state']?>" id="state" readonly="readonly"/> </td>
			<th valign="top">Country:</th>
			<td><input type="text" class="inp-form" name="country"  id="country"value="<?php echo $value['country']?>"  readonly="readonly"/> </td>
		</tr>
        
         <tr id="p_school_old2">
			<th valign="top">Pin Code:</th>
			<td><input type="text" class="inp-form" name="pin" value="<?php echo $value['pin']?>"  id="pin" readonly="readonly"/> </td>
			<th valign="top">Std Code:</th>
			<td><input type="text" class="inp-form" name="std" value="<?php echo $value['std']?>" id="std"  readonly="readonly"/> </td>
               
		</tr>        

         <tr>
			<th valign="top">Relation:</th>
			<td><select name="relation" id="pid" class="inp-form-select"> 
			<option value="" selected="selected"> Plz Select</option>
      <?php $resultdesi=mysql_query("SELECT * FROM relation;") or die(mysql_error());
            while ($resultdeg = mysql_fetch_array($resultdesi))   { ?>
			  <option <?php if($resultdeg['name']==$row['relation']) echo 'selected="selected"';  ?> VALUE="<?php echo $resultdeg['name']; ?>"><?php echo $resultdeg['name']; ?></option> 
			<?php } ?>   </select></td>
			<th valign="top">Resi Adderss:</th>
			<td><input type="text" class="inp-form" name="rsaddress" id="rsaddress"  value="<?php echo $row['rsaddress']; ?>" /></td>
		</tr>
        
        
         <tr>
			
			<th valign="top">Phone1:</th>
			<td><input type="text" class="inp-form" name="phone1" id="phone1"  value="<?php echo $row['phone1']; ?>"/></td>
            <th valign="top">Email ID:</th>
			<td><input type="text" class="inp-form" name="email" id="email"  value="<?php echo $row['email']; ?>" /></td>
		</tr>
        
         <tr>
			
			<th valign="top">Mobile1:</th>
			<td><input type="text" class="inp-form" name="mobile1" id="mobile1"  value="<?php echo $row['mobile1']; ?>"/></td>
            <th valign="top">Mobile2:</th>
			<td><input type="text" class="inp-form" name="mobile2" id="mobile2"  value="<?php echo $row['mobile2']; ?>"/></td>
		</tr>
        
         <tr>
			
			
        <tr>	
			
            <th valign="top">User ID:</th>
			<td>
			<select name="user12" id="user12" class="inp-form-select" onchange="showpass(this.value)">
			   <option value="" selected="selected"> Plz Select</option> 
           <?php $resultdesi=mysql_query("SELECT * FROM dan_users ") or die(mysql_error());
            while ($resultdeg = mysql_fetch_array($resultdesi))   { ?>
			  <option <?php if($row['user']==$resultdeg['id']) echo 'selected="selected"'; ?> VALUE="<?php echo $resultdeg['id']; ?>"><?php echo $resultdeg['user_name']; ?></option> 
			<?php } ?>   </select>
			</td>			
			<th valign="top">Password:</th>			
			<td><input type="text" name="pass" id="pass" class="inp-form" value="<?php echo $row['pass']; ?>"  readonly/>
			</td>
			
		</tr>
		
		<?php 
         //For row wise show to  item, subject,class  
         
         function unserial($var)
			     {
			      $var=unserialize($var);
			      return $var;		      
			     
			     }
                  $itme=$row['item'];
                  $k=0;
				  $itme=unserial($itme);
				  $k=count($itme);
				  
     
                  $sub=$row['subject'];
				  $sub=unserial($sub);
				  
				  
                  $class=$row['class'];
				  $class=unserial($class);
				  
                  
         
         ?>
     
         <tr>
			<td colspan="4" align="right">   
				<input type="hidden" name="countofsection" id="countofsection" value="<?php  echo $k; ?>">
				<div class="input_fields_wrap" style="margin-bottom:10px">
<?php 
if($k)
{
for($m=0;$m<$k;$m++)
{
	?>
	<div>		
	 <table id="my_table">
		<tr>
			<th valign="top" style="height: 30px">Item Name:</th>
			<td style="height: 30px">
				<select name="item[]" id="item<?php echo $m+1; ?>" class="inp-form2" onchange="showsubject<?php echo $m+1; ?>(this.value)">
					<option value="" selected="selected">Plz Select</option>
				  <?php
				   $query=mysql_query("SELECT id,item_name,class FROM item_master_list order by item_name");
			    while($value=mysql_fetch_array($query))
			      {			  
			  ?>			  
			     <option <?php if($itme[$m]==$value['item_name'])  echo 'selected="selected"';?>   value="<?php echo $value['id']; ?>"><?php echo $value['item_name']; ?></option>
			  <?php 
			     }
                $query=mysql_query("SELECT subject,class FROM item_master_list order by item_name");
                $data=mysql_fetch_array($query);
				  
			   ?>
				</select>			
				</td>
				<th valign="top" style="width: 66px; height: 30px;">Subject:</th>
				<td style="height: 30px"><input type="text" class="inp-form2" name="subject[]" id="subject<?php echo $m+1; ?>" value="<?php echo $sub[$m]; ?>" /></td>
				<th valign="top" style="width: 66px; height: 30px;">Class:</th>
				<td style="height: 30px">
				<select class="inp-form2" name="class[]" id="class<?php echo $m+1; ?>" >
				<option value="" selected="selected">Plz select</option>
			 <?php
			    $query=mysql_query("SELECT class FROM class ORDER BY class ");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option  <?php if($class[$m]==$value['class']) echo ' selected="selected"' ;?> value="<?php echo $value['class']; ?>" ><?php echo $value['class']; ?></option>
			  <?php 
			     }   
              ?>
			   </select>				
				</td>  				
             </tr>
           </table>	
		<?php if($m>=1)
		{
			?>
			<input style="background-color:#407B69; color: rgb(255, 255, 255); font-size: 11px; font-weight: bold; padding: 3px 8px; border: medium none;" value="Remove" type="button" class="remove_field"  >	
			<?php
		}
		?>	   
	</div>		   
	<?php
}}


?>		   
				
				</div>
			</td>
        </tr>
		<tr > <td colspan="4" align="right"> <input style="background-color:#407B69; color: rgb(255, 255, 255); font-size: 11px; font-weight: bold; padding: 3px 8px; border: medium none; <?php  if($k<=4){ }else{ echo "display:none";} ?>" class="add_field_button"  value="Add more" type="button" ></td>
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
	$('#formid').validate(
	{	
		//alert('hello');
		rules:
		{
			"userid":
			{
				required:true
			},
			"gender":
			{
				required:true
			},
			"user_name":
			{
				required:true
			},
			
			"email":
			{
				required:true,
				email:true,
				/*remote:ajax_url+'/Home/check_email',*/
			},
			"password":
			{
				required:true
			},
			"address":
			{
				required:true
			},
			
			"phone":
			{
				required:true,
				number:true
			},
			"user_type":
			{
				required:true,
				number:true
			},
			
			
		},
		messages:
		{
			"userid":
			{
				required:'This field is required.',
			},
			"gender":
			{
				required:'This field is required.',
			},
			
			"user_name":
			{
				required:'This field is required.',
			},
			
			"email":
			{
				required:'This field is required.',
				email:'Please enter valid email.',
				//remote:'This email already exist'
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
			"user_type":
			{
				required:'This field is required.',
				number:'Please enter a valid User type in digits.'
			},
			
			
		}
	});
	}); 
	</script>
<?php include('footer.php');?>

