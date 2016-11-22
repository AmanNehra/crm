<?php 
require_once('config.php');

$type=$_GET['type'];
if($type=='user'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from dan_users WHERE id='$id'") or die(mysql_error());
if($result){ header('location:index.php');}
}

else if($type=='master'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from master_list WHERE id='$id'") or die(mysql_error());
if($result){ header('location:master_listing.php');}
}

else if($type=='teacher_master'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from teacher_master_list WHERE id='$id'") or die(mysql_error());
if($result){ header('location:teacher_master_listing.php');}
}

else if($type=='department'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from department_list WHERE id='$id'") or die(mysql_error());
if($result){ header('location:department_listing.php');}
}

else if($type=='corporate'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from corporate_list WHERE id='$id'") or die(mysql_error());
if($result){ header('location:corporate_listing.php');}
}

else if($type=='chain_school'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from chain_school_list WHERE id='$id'") or die(mysql_error());
if($result){ header('location:chain_school_listing.php');}
}
else if($type=='member_chain'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from member_chain_school_list WHERE id='$id'") or die(mysql_error());
if($result){ header('location:member_chain_school_listing.php');}
}

else if($type=='school_info'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from school_info_list WHERE id='$id'") or die(mysql_error());
if($result){ header('location:school_info_listing.php');}
}

else if($type=='item_master'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from item_master_list WHERE id='$id'") or die(mysql_error());
if($result){ header('location:item_master_listing.php');}
}

else if($type=='subject'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from subject_master_list WHERE id='$id'") or die(mysql_error());
if($result){ header('location:subject_master_listing.php');}
}
else if($type=='series'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from series_master_list WHERE id='$id'") or die(mysql_error());
if($result){ header('location:series_master_listing.php');}
}
else if($type=='transport'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from transport_list WHERE id='$id'") or die(mysql_error());
if($result){ header('location:transport_details_listing.php');}
}

else if($type=='bank_details'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from bank_details_list WHERE id='$id'") or die(mysql_error());
if($result){ header('location:bank_detail_listing.php');}
}
else if($type=='discount'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from discount_grade_list WHERE id='$id'") or die(mysql_error());
if($result){ header('location:discount_grade_listing.php');}
}
else if($type=='other_designation'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from other_designation_list WHERE id='$id'") or die(mysql_error());
if($result){ header('location:other_designation_listing.php');}
}
else if($type=='bord_info'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from school_info_list WHERE id='$id'") or die(mysql_error());
if($result){ header('location:board_listing.php');}
}
else if($type=='category_info'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from school_info_list WHERE id='$id'") or die(mysql_error());
if($result){ header('location:category_listing.php');}
}
else if($type=='customer_category_info'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from school_info_list WHERE id='$id'") or die(mysql_error());
if($result){ header('location:customer_category_listing.php');}
}
else if($type=='root_info'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from school_info_list WHERE id='$id'") or die(mysql_error());
if($result){ header('location:route_no_listing.php');}
}
else if($type=='saturday_info'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from school_info_list WHERE id='$id'") or die(mysql_error());
if($result){ header('location:saturday_off_listing.php');}
}
else if($type=='ptm_info'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from school_info_list WHERE id='$id'") or die(mysql_error());
if($result){ header('location:ptm_listing.php');}
}
else if($type=='submission_info'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from school_info_list WHERE id='$id'") or die(mysql_error());
if($result){ header('location:submission_listing.php');}
}
else if($type=='finalised_info'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from school_info_list WHERE id='$id'") or die(mysql_error());
if($result){ header('location:finalised_listing.php');}
}
else if($type=='designation_info'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from school_info_list WHERE id='$id'") or die(mysql_error());
if($result){ header('location:designation_listing.php');}
}
else if($type=='relation_info'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from school_info_list WHERE id='$id'") or die(mysql_error());
if($result){ header('location:relation_listing.php');}
}
else if($type=='class_info'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from school_info_list WHERE id='$id'") or die(mysql_error());
if($result){ header('location:class_listing.php');}
}
else if($type=='specialisation_info'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from school_info_list WHERE id='$id'") or die(mysql_error());
if($result){ header('location:specialisation_listing.php');}
}
else if($type=='department_setting_info'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from school_info_list WHERE id='$id'") or die(mysql_error());
if($result){ header('location:department_setting_listing.php');}
}
else if($type=='session_master_info'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from school_info_list WHERE id='$id'") or die(mysql_error());
if($result){ header('location:session_master_listing.php');}
}
else if($type=='transportation_info'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from school_info_list WHERE id='$id'") or die(mysql_error());
if($result){ header('location:transportation_listing.php');}
}
else if($type=='location_info'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from location_maste_info_list WHERE id='$id'") or die(mysql_error());
if($result){ header('location:location_master_info_listing.php');}
}
elseif($type=='invy'){
$id = convert_uudecode(base64_decode($_GET['id']));

$result=mysql_query("DELETE from invoice_item_table WHERE item_id='$id'") or die(mysql_error());
if($result){ 
$meta_key='invoice-item';
$result2=mysql_query("DELETE from meta_table WHERE invoice_item_id='$id' && meta_key='$meta_key'") or die(mysql_error());
if($result2){header('location:customer.php?type=one');}
}

}elseif($type=='invy_sec_del'){

$id = convert_uudecode(base64_decode($_GET['id']));

$result=mysql_query("DELETE from invoice_sec_table WHERE sec_id='$id'") or die(mysql_error());
if($result){ 
$meta_key='invoice-sec';
$result2=mysql_query("DELETE from meta_table WHERE invoice_item_id='$id' && meta_key='$meta_key'") or die(mysql_error());
if($result2){header('location:customer.php?type=two');}

}
}elseif($type=='invy_third_del'){
$id = convert_uudecode(base64_decode($_GET['id']));

$result=mysql_query("DELETE from invoice_third_table WHERE third_id='$id'") or die(mysql_error());
if($result){ 
$meta_key='invoice-third';
$result2=mysql_query("DELETE from meta_table WHERE invoice_item_id='$id' && meta_key='$meta_key'") or die(mysql_error());
if($result2){header('location:customer.php?type=three');}

}

}elseif($type=='quote'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from quotes WHERE id='$id'") or die(mysql_error());
if($result){ 
header('location:quotes.php');
}

}elseif($type=='att'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from attendance WHERE id='$id'") or die(mysql_error());
if($result){ 
header('location:atten_list.php');
}
}
elseif($type=='quotation'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from quotations WHERE id='$id'") or die(mysql_error());
if($result){ 
$meta_key='quotation-item';
$result2=mysql_query("DELETE from meta_table WHERE invoice_item_id='$id' && meta_key='$meta_key'") or die(mysql_error());
if($result2){header('location:quotation.php');}
}
}

else if($type=='transportation11'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from transportation WHERE id='$id'") or die(mysql_error());
if($result){ header('location:transportation_listing.php');}
}

else if($type=='department11'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from department WHERE id='$id'") or die(mysql_error());
if($result){ header('location:department_setting_listing.php');}
}

else if($type=='class11'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from class WHERE id='$id'") or die(mysql_error());
if($result){ header('location:class_listing.php');}
}

else if($type=='relation11'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from relation WHERE id='$id'") or die(mysql_error());
if($result){ header('location:relation_listing.php');}
}

else if($type=='designation11'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from school_designation WHERE id='$id'") or die(mysql_error());
if($result){ header('location:designation_listing.php');}
}

else if($type=='finalised11'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from finalised WHERE id='$id'") or die(mysql_error());
if($result){ header('location:finalised_listing.php');}
}

else if($type=='submission11'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from submission WHERE id='$id'") or die(mysql_error());
if($result){ header('location:submission_listing.php');}
}


else if($type=='ptm11'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from ptm WHERE id='$id'") or die(mysql_error());
if($result){ header('location:ptm_listing.php');}
}

else if($type=='saturday_info'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from school_info_list WHERE id='$id'") or die(mysql_error());
if($result){ header('location:saturday_off_listing.php');}
}

else if($type=='root_info'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from school_info_list WHERE id='$id'") or die(mysql_error());
if($result){ header('location:route_no_listing.php');}
}

else if($type=='teacher1'){
$id=convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from teacher_master_list WHERE id='$id'") or die(mysql_error());
if($result){ header('location:teacher_master_listing.php');}
}
else if($type=='teacher2'){
$id=convert_uudecode(base64_decode($_GET['id']));
$sid = convert_uudecode(base64_decode($_GET['sid']));
$result=mysql_query("DELETE from teacher_master_list WHERE id='$id'") or die(mysql_error());
if($result){ header('location:teacher_master.php?sid='.base64_encode(convert_uuencode($sid)));}
}

else if($type=='book11'){
$sid = convert_uudecode(base64_decode($_GET['sid']));
$id=convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from book_master WHERE id='$id'") or die(mysql_error());
if($result){ header('location:book_master.php?sid='.base64_encode(convert_uuencode($sid)));}
}

else if($type=='strength11'){
$sid = convert_uudecode(base64_decode($_GET['sid']));
$id=convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from strength WHERE id='$id'") or die(mysql_error());
if($result){ header('location:strength_master.php?sid='.base64_encode(convert_uuencode($sid)));}
}
else if($type=='corporate'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from corporate_list WHERE id='$id'") or die(mysql_error());
if($result){ header('location:corporate_listing.php');}
}

else if($type=='corporate2'){
$id = convert_uudecode(base64_decode($_GET['id']));
$sid = convert_uudecode(base64_decode($_GET['sid']));
$p=$_REQUEST['p'];
$result=mysql_query("DELETE from corporate_sub WHERE id='$id'") or die(mysql_error());
if($result){ 
	if($p==21)
	  header("location:corporate_person.php");
	else		
      header('location:corporate2.php?sid='.base64_encode(convert_uuencode($sid)));}
}

else if($type=='chain2'){
$id = convert_uudecode(base64_decode($_GET['id']));
$sid = convert_uudecode(base64_decode($_GET['sid']));
$result=mysql_query("DELETE from chain_school_sub WHERE id='$id'") or die(mysql_error());
if($result){ header('location:chain_school2.php?sid='.base64_encode(convert_uuencode($sid)));}
}

else if($type=='member'){
$id = convert_uudecode(base64_decode($_GET['id']));
$sid = convert_uudecode(base64_decode($_GET['sid']));
$result=mysql_query("DELETE from chain_school_sub WHERE id='$id'") or die(mysql_error());
if($result){ header("location:member_chain_school_listing.php");}
}

else if($type=='chain'){
$id = convert_uudecode(base64_decode($_GET['id']));
$sid = convert_uudecode(base64_decode($_GET['sid']));
$result=mysql_query("DELETE from chain_school_sub WHERE id='$id'") or die(mysql_error());
if($result){ header('location:chain_show.php?sid='.base64_encode(convert_uuencode($sid)));}
}

else if($type=='godwon'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from godwon_list WHERE id='$id'") or die(mysql_error());
if($result){ header('location:godwon_listing.php');}
}

else if($type=='expense'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from expense_list WHERE id='$id'") or die(mysql_error());
if($result){ header('location:expense_listing.php');}
}

else if($type=='expense_ent'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from expense_ent WHERE id='$id'") or die(mysql_error());
if($result){ header('location:expense_ent_listing.php');}
}

else if($type=='com_mis'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from misCompanyMaster WHERE id='$id'") or die(mysql_error());
if($result){ header('location:company_mis_listing.php');}
}

else if($type=='com_mis_sub'){
$id = convert_uudecode(base64_decode($_GET['id']));
$sid = convert_uudecode(base64_decode($_GET['sid']));
$result=mysql_query("DELETE from misCompanyMaster_sub WHERE id='$id'") or die(mysql_error());
if($result){ header('location:company_mis_sub.php?sid='.base64_encode(convert_uuencode($sid)));}
}

else if($type=='item_del'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from all_voucher WHERE id='$id'") or die(mysql_error());
if($result){ header('location:add_voucher.php');}
}

else if($type=='issue'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from issue_voucher WHERE id='$id'") or die(mysql_error());
$result1=mysql_query("DELETE from all_voucher WHERE (uid='$id') AND (relate=1)") or die(mysql_error());
if($result && result1){ header('location:issue_voucher_listing.php');}
}

else if($type=='return'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from return_voucher WHERE id='$id'") or die(mysql_error());
$result1=mysql_query("DELETE from all_voucher WHERE (uid='$id') AND (relate=2)") or die(mysql_error());
if($result && result1){ header('location:return_voucher_listing.php');}
}

else if($type=='expense_master'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from expense WHERE id='$id'") or die(mysql_error());
if($result){ header('location:expense_master_listing.php');} 
}

else if($type=='tour_voucher'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from tour WHERE id='$id'") or die(mysql_error());
$result1=mysql_query("DELETE from tour_detail WHERE (uid='$id')") or die(mysql_error());
if($result && result1){ header('location:tour_voucher_listing.php');}
}

else if($type=='workshop'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from workshop WHERE id='$id'") or die(mysql_error());
$result1=mysql_query("DELETE from workshopRent WHERE (uid='$id')") or die(mysql_error());
if($result && result1){ header('location:workshop_listing.php');}
}

else if($type=='commit'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from commitment_voucher WHERE id='$id'") or die(mysql_error());
if($result){ header('location:commitment_voucher_listing.php');}
}

else if($type=='working'){
$id = convert_uudecode(base64_decode($_GET['id']));
$result=mysql_query("DELETE from working_area WHERE id='$id'") or die(mysql_error());
if($result){ header('location:working_area_listring.php');}
}
?>