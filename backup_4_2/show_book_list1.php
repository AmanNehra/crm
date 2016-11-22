<?php //echo "<pre>"; print_r($_REQUEST); die; 
include ('config.php');
$salseman_id=$_POST['id'];
$i=1;
$total_issue_book=0; 
$total_return_book=0;
$total_school_book_sampling=0;
$total_teacher_book_sampling=0;
$total_corporate_book_sampling=0;
$total_department_book_sampling=0;
$total_chain_book_sampling=0;
$total_member_chain_book_sampling=0;
$total_contact_person_book_sampling=0;
$exist=0;
//For know salesman name
$query=mysql_query("SELECT name FROM department_list where (`id`='$salseman_id')");
$value=mysql_fetch_array($query);

$name=$value['name'];
//End

$query12=mysql_query("SELECT id FROM item_master_list");//For select all item name from item table
while($val12=mysql_fetch_array($query12)){
 $main_book_id=$val12['id']; 

$query=mysql_query("SELECT * FROM all_voucher WHERE (salseman_id='$salseman_id') AND (book_id='$main_book_id') AND (relate='1')");
while($val=mysql_fetch_array($query)){    
    //for checking it is directly issue to salesman or for distribute
	$row_uid1=$val['uid'];
	
	$query14=mysql_query("SELECT * FROM `issue_voucher` WHERE (id='$row_uid1') AND (status='2')")or die(mysql_error());
	if(mysql_num_rows($query14)>0){
	$data14=mysql_fetch_array($query14);	
	if($data14['corporate_name']=="" && $data14['teachercopy']=="")
	  {
	    $exist=1;//For check tha item table book id exist or not in all_voucher table
	   $total_issue_book+= $val['qty'];
	  }	
	 } 
	 
	//End	
	  if($exist==1){
	        $book_id=$val['book_id'];
			$book_name=$val['book_name'];
			$class=$val['class'];			
			$price=$val['price'];
			}
	}
	//echo $total_issue_book; die;   
   $query1=mysql_query("SELECT * FROM all_voucher WHERE (salseman_id='$salseman_id') AND (book_id='$main_book_id') AND (relate='2')");
   while($val1=mysql_fetch_array($query1)){
     	 $row_uid1=$val1['uid'];
	
		$query14=mysql_query("SELECT * FROM `return_voucher` WHERE (id='$row_uid1') AND (status='2')")or die(mysql_error());
		if(mysql_num_rows($query14)>0){	
			   
         	$total_return_book+=$val1['return_qty']; 
		  }				
		}
		//FOR SHOW ALL SAMPLING
		$query1=mysql_query("SELECT * FROM book_sample_details WHERE (salseman_id='$salseman_id') AND (book_id='$main_book_id') AND (relate='SCHOOL')");
   while($val1=mysql_fetch_array($query1)){
         	$total_school_book_sampling+=$val1['qty'];     
				
					
		}
		
		$query1=mysql_query("SELECT * FROM book_sample_details WHERE (salseman_id='$salseman_id') AND (book_id='$main_book_id') AND (relate='TEACHER')");
   while($val1=mysql_fetch_array($query1)){
         	$total_teacher_book_sampling+=$val1['qty'];     
				
					
		}
		
		$query1=mysql_query("SELECT * FROM book_sample_details WHERE (salseman_id='$salseman_id') AND (book_id='$main_book_id') AND (relate='CORPORATE')");
   while($val1=mysql_fetch_array($query1)){
         	$total_corporate_book_sampling+=$val1['qty'];     
				
					
		}
		
		$query1=mysql_query("SELECT * FROM book_sample_details WHERE (salseman_id='$salseman_id') AND (book_id='$main_book_id') AND (relate='DEPARTMENT')");
   while($val1=mysql_fetch_array($query1)){
         	$total_department_book_sampling+=$val1['qty'];     
				
					
		}
		
		
		$query1=mysql_query("SELECT * FROM book_sample_details WHERE (salseman_id='$salseman_id') AND (book_id='$main_book_id') AND (relate='CHAIN')");
   while($val1=mysql_fetch_array($query1)){
         	$total_chain_book_sampling+=$val1['qty'];     
				
					
		}
		
		$query1=mysql_query("SELECT * FROM book_sample_details WHERE (salseman_id='$salseman_id') AND (book_id='$main_book_id') AND (relate='MEMBER')");
   while($val1=mysql_fetch_array($query1)){
         	$total_member_chain_book_sampling+=$val1['qty'];     
				
					
		}
		
		$query1=mysql_query("SELECT * FROM book_sample_details WHERE (salseman_id='$salseman_id') AND (book_id='$main_book_id') AND (relate='CONTACT_PERSON')");
   while($val1=mysql_fetch_array($query1)){
         	$total_contact_person_book_sampling+=$val1['qty'];     
				
					
		}
		//END
		
		
		$bal_qty=$total_issue_book-$total_return_book-$total_school_book_sampling-$total_teacher_book_sampling-$total_corporate_book_sampling-$total_department_book_sampling-$total_chain_book_sampling-$total_member_chain_book_sampling-$total_contact_person_book_sampling;//for balance quatity of book
		
       if($exist==1){
?>


<tr>
			<td ><input type="text" name="" value="<?php echo $i;?>"  class="textsmall" readonly=""/></td>
			<td ><input type="hidden" name="book_id_<?php echo $i; ?>" value="<?php echo $book_id?>"  class="textsmall"/></td>
			<td ><input type="text" name="book_name_<?php echo $i; ?>" value="<?php echo $book_name;?>" class="textbig" readonly=""/></td>
			<td  ><input type="text" name="class_<?php echo $i; ?>" value="<?php echo $class;?>" class="textsmall" readonly=""/></td>
			<td style="margin-left:20px;" ><input type="text" name="qty_<?php echo $i; ?>" value="<?php echo $bal_qty;?>" class="textsmall" readonly="" /></td><td style="margin-left:20px;" ><input  type="hidden" name="price_<?php echo $i; ?>" value="<?php echo $price ;?>" class="textsmall" readonly="" /></td>	
			<td  ><input type="text" name="return_<?php echo $i; ?>" value="" class="textsmall" /></td>	
							
 </tr>
 
 <?php 
 $i+=1;
    }
  
 $bal_qty=0;
 $total_issue_book=0;
 $total_return_book=0;
 $total_school_book_sampling=0;
 $total_teacher_book_sampling=0;
 $total_corporate_book_sampling=0;
 $total_department_book_sampling=0;
 $total_chain_book_sampling=0;
 $total_member_chain_book_sampling=0;
 $total_contact_person_book_sampling=0;
 $exist=0;
  } ?>
 
<input type="hidden" name="salseman_id" id="salseman_id" value="<?php echo $salseman_id; ?>" />
<input type="hidden" name="salseman" id="salseman" value="<?php echo $name; ?>" /> 
<input type="hidden" name="len" value="<?php echo $i; ?>"  />
<?php  die();?>