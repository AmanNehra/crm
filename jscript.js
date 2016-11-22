/*This file created for add all javascript function*/
function show_state(country){
 $.ajax({
		  url:"show_location.php",
		  type: "POST",
		  data: "country="+country+"&val="+1,		  
		  success:function(result){	 
		  $("#state").html(result);
		  }});
}
function show_district(state){
 $.ajax({
		  url:"show_location.php",
		  type: "POST",
		  data: "state="+state+"&val="+2,		  
		  success:function(result){	 
		  $("#district").html(result);
		  }});
}

function show_city2(district){
 $.ajax({
		  url:"show_location.php",
		  type: "POST",
		  data: "district="+district+"&val="+3,		  
		  success:function(result){	 
		  $("#city").html(result);
		  }});
}
function show_city(district){ 
 var state=$("#state").val();
 $.ajax({
		  url:"show_city.php",
		  type: "POST",
		  data: "district="+district+"&state="+state,		  
		  success:function(result){		  
		  $("#fill").show();
		  $("#fill").html(result);
		  }});
}

function check_option(id){
 if($("#2").is(":checked")){
	$("#21").show("slow");	 
 }   
  else {
	  $("#21").hide("slow");  
  }
  
  if($("#3").is(":checked")){
	$("#31").show("slow");	 
 }   
  else {
	  $("#31").hide("slow");  
  }
  
  if($("#4").is(":checked")){
	$("#41").show("slow");	 
 }   
  else {
	  $("#41").hide("slow");  
  }
  
  if($("#5").is(":checked")){
	$("#51").show("slow");	 
 }   
  else {
	  $("#51").hide("slow");  
  }
  
  if($("#6").is(":checked")){
	$("#61").show("slow");	 
 }   
  else {
	  $("#61").hide("slow");  
  }
}

function printout(){
window.print();
}
function discountOnGross(discount){
	var gross=$("#gross").val();
	var net=gross-( (gross*discount)/100);
	$("#net").val(net);	
	
}
function onchangedepartment(did)
 {
  $.ajax({
  url:"department_result2.php",
  type: "POST",
  data: "department="+did,
  success:function(result){
   $("#departmentdiv").html(result);    
    //alert (result);
  }}); 
 }

function onchangedepartment_workingarea(did)
 {
  $.ajax({
  url:"department_result3.php",
  type: "POST",
  data: "department="+did,
  success:function(result){
   $("#departmentdiv").html(result);    
    //alert (result);
  }}); 
 }


function discountOnGift(gift){
 var gross=$("#gross").val();	
 var net=$("#net").val();

 var gift_pad=$("#gift_pad").val();
 
  if(gift_pad=="Gross")
	  var amount=((gross*gift)/100);
  else if(gift_pad=="Net") 
     var amount=((net*gift)/100);
  else
     var amount=0;
	 
  $("#total_discount").val(amount);
	
}
function pridiction(val){
if(val=="")
  $("#fill").hide();
else{
	$.ajax({
		  url:"pridiction_city.php",
		  type: "POST",
		  data: "val="+val,
		  success:function(result){	
		  $("#fill").show();
		  $("#fill").html(result);
		  }});	
   }
}

function calculate(){
var gift_pad=$("#gift_pad").val();
var gift_percent=$("#gift_percent").val();
var net_amount=$("#net_amount").val();
var gross_amount=$("#gross_amount").val();

 if(gift_pad=="Net"){	
	var total_discount=(net_amount*gift_percent)/100 ;
	$("#total_discount").val(total_discount);
	 
 }
 else if(gift_pad=="Gross"){	
	var total_discount=(gross_amount*gift_percent)/100 ;
	$("#total_discount").val(total_discount);
	 
 }
}
function show_teacher_list12(code,num){
 $.ajax({
	  url:"show_teacher_list1.php",
	  type: "POST",
	  data: "code="+code+"&num="+num,
	  success:function(result){
		  if(num==1)
	       { $("#teacherlist1").show().html(result);  }
		  if(num==2)
		    $("#teacherlist2").show().html(result);
	  }});
}
function TeacherList(sid){
 $.ajax({
	  url:"show_teacher_list.php",
	  type: "POST",
	  data: "sid="+sid,
	  success:function(result){	
	  $("#tr2").show();
	  $("#booklist1").html(result);
	  }});
 
}

function schoolChainList(sid){
 $.ajax({
	  url:"show_chain_list.php",
	  type: "POST",
	  data: "sid="+sid,
	  success:function(result){	
	  $("#tr2").show();
	  $("#booklist1").html(result);
	  }});
 
}

function corporateList(sid){
 $.ajax({
	  url:"show_corporate_list.php",
	  type: "POST",
	  data: "sid="+sid,
	  success:function(result){	
	  $("#tr2").show();
	  $("#booklist1").html(result);
	  }});
 
}

function showbooklist(){
 var group=$("#group").val();
 var series=$("#series").val(); 



 if(( group=="") &&(series=="")){
	alert("Please select group or series");				
					}
  else if(( group!="") &&(series!="")){
	 alert("Please select only group or series");	 
  }
  else {
 
 var quantity=$("#quantity").val();
 $.ajax({
	  url:"show_book_list.php",
	  type: "POST",
	  data: "group="+group+"&series="+series+"&quantity="+quantity+"&type="+1,
	  success:function(result){	
	  $("#booklist").html(result);
	  }});
  }
}
function showbooklist4(){
 var group=$("#group").val();
 var series=$("#series").val();
 var discount=$("#discount").val();
 if(( group=="") &&(series=="")){
	alert("Please select group or series");				
					}
  else if(( group!="") &&(series!="")){
	 alert("Please select only group or series");	 
  }
  else {
 
 var quantity=$("#quantity").val();
 $.ajax({
	  url:"showlist_data.php",
	  type: "POST",
	  data: "group="+group+"&series="+series+"&quantity="+quantity+"&discount="+discount,
	  success:function(result){	
	  $("#showlist").html(result);
	  }});
  }
}


function showreturnlist(){	
 var salseman=$("#salsemanname").val(); 
 alert(salseman);
 $.ajax({
	  url:"show_book_list.php",
	  type: "POST",
	  data: "salseman="+salseman+"&type="+2,
	  success:function(result){		 
	  $("#booklist").html(result);
	  }});
 
}

function sampleBookList(){
 var salesman_id=$("#sal_id").val(); 
 var group=$("#group").val();
 var series=$("#series").val(); 
 
  if(( group=="") &&(series=="")){
	alert("Please select group or series");				
					}
  else if(( group!="") &&(series!="")){
	 alert("Please select only group or series");	 
  }
  else {
 $.ajax({
	  url:"show_book_list.php",
	  type: "POST",
	  data: "group="+group+"&series="+series+"&salesman_id="+salesman_id+"&type="+3,
	  success:function(result){		 
	  $("#booklist").html(result);
	  }});
  }
}

function showaddres(str){
	
	var tbl=$("#tbl1").val();	
	$.ajax({
	  url:"show_address.php",
	  type: "POST",
	  data: "tbl="+tbl+"&id="+str,
	  success:function(result){  
	  var address=result.split("#");	 
	 $("#address0").val(address[0]);
	 $("#city0").val(address[1]);
	 $("#district0").val(address[2]);
	 $("#state0").val(address[3]);
	 $("#country0").val(address[4]);
	 $("#corporate_person").val(address[5]);	
	  }});
}


function salseman_id_name(id){
	
var depart=$("#depart").val();
	$.ajax({
	  url:"salseman_name.php",
	  type: "POST",
	  data: "id="+id+"&depart="+depart,
	  success:function(result){ 
	  var salseman=result.split("#");	 
	 $("#salseman_id").val(salseman[0]);
	 $("#salseman_name").val(salseman[1]);	
	 $("#desig").val(salseman[2]);
	  }});	
}

function salseman_id_name2(id){
	
var depart=$("#depart").val();
	$.ajax({
	  url:"salseman_name.php",
	  type: "POST",
	  data: "id="+id+"&depart="+depart,
	  success:function(result){ 
	  var salseman=result.split("#");	 
	 $("#salseman_id").val(salseman[0]);
	 $("#salseman").val(salseman[1]);	
	 $("#desig").val(salseman[2]);
	  }});	
}


function department1(depart){
	$.ajax({
  url:"department_result1.php",
  type: "POST",
  data: "department="+depart,
  success:function(result){
   $("#departmentdiv").html(result);    
    //alert (result);
  }}); 

}
function show_book(id){	
	$.ajax({
  url:"show_book_list1.php",
  type: "POST",
  data: "id="+id,
  success:function(result){ 
   $("#booklist").html(result);    
    //alert (result);
  }}); 
	
}
function transportTotal(val){
	transport=$("#transport_all_details").val();
	var mode=$("#tr11").val();
	var km=$("#km").val();
	var amount1=$("#amount").val();	
	var numbers = /^[.+]?[0-9]+$/;  
	if(mode=="")
	{		
		alert("Please selet Mode Of Transport.");
		return false;
	}
	else
	{
		if(mode=="CAR" || mode=="TWO WHEELER") 
		{
			if(km=="") 
			{	
            	km=0;
				alert("Please fill the KM.");
				return false;
			}
			else if( !km.match(numbers)) 
			{  	
            	km=0;	
				alert('Please fill valid KM.');  
				return false;
    		}
				
		}
		if(mode!="CAR" || mode!="TWO WHEELER" || mode!="") 
		{
			if(amount1=='')
			{
				alert('Please fill Amount.');  
				return false;
			}
		}
        var km=$("#km").val();
		var amount=Number($("#amount").val());
		var totalAmount=Number($("#totalAmount").val());
		if(transport==""){
		  var transport=mode +" / " +km +"(KM) / " +amount+"(INR)";
		}
		else {
		var transport=transport+" , "+ mode +" / " +km +"(KM)/" +amount+"(INR)";
		}
		$("#transport_all_details").val(transport);
		totalAmount=Number(totalAmount)+Number(amount);
		$("#totalAmount").val(totalAmount);
		
		$('#tr11 option').removeAttr('selected');
		$("#amount").val("");
		$("#km").val("");
		$("#Start").val("");
		$("#End").val("");
		return true;
	}
	
}