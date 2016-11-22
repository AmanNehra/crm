<?php 
function checkbox($var,$val){
foreach($var as $v){
  if($v==$val)
    return 'checked="checked"';
 }
}

function checkbox1($var,$val){
foreach($var as $v){
  if($v==$val)
    return 'checked="checked"';
 }
}
function number() 
{
 if(!isset($_GET['page']) || $_GET['page']=="")
  $count=0;
 else
  $count=($_GET['page']-1)*10;
  return $count;
}

function number2() 
{
 if(!isset($_GET['page']) || $_GET['page']=="")
  $count=0;
 else
  $count=($_GET['page']-1)*20;
  return $count;
}

function strupp($str)
  {
   $str=trim(strtoupper($str));
   return $str;
  }
  
function salesman_name($id){
$query=mysql_query("SELECT name FROM department_list where (`id`='$id') ");
$value=mysql_fetch_array($query);
$salesman_name=$value['name'];
return $salesman_name;
} 				
?>




<?php
function select($col1,$col2,$table)
  {   
  
   $query=mysql_query("select $col1,$col2 from $table order by '$col1' ");
   while($data=mysql_fetch_array($query))
     {
   ?>
  <option value="<?php echo $data['name'];  ?>"><?php echo $data['name'];  ?></option>
  
 <?php }  
  }  
?>



<?php
function selected($col1,$col2,$table,$selected)
  { 
   $query=mysql_query("select $col1,$col2 from $table");
   while($data=mysql_fetch_array($query))
     {
   ?>
  <option <?php if($selected==$data['name']) echo 'selected="selected"'; ?> value="<?php echo $data['name'];  ?>"><?php echo $data['name'];  ?></option>
  
 <?php } 
  echo '</select>'; 
  }
  
  
function working_area($id)
	{
		//$query="SELECT wa.state , wa.district , wa.city FROM dan_users as du JOIN department_list AS dl ON du.id=dl.`user` JOIN working_area AS wa ON dl.id=wa.salesman_id where wa.salesman_id='$id' ";
		
		$query="SELECT wa.state , wa.district , wa.city FROM dan_users as du JOIN department_list AS dl ON du.id=dl.`user` JOIN working_area AS wa ON dl.`user`=wa.salesman_id where wa.salesman_id='$id' ";
		
		$data=mysql_query($query) or die(mysql_error());
		
		while($row=mysql_fetch_assoc($data) )
			{
				$state[]=$row['state'];
				$district[]=$row['district'];
				$city[]=unserialize($row['city']);				
			}
			
		$state=array_unique($state);
		$district=array_unique($district);
		$std="";
		$did="";
		$cid="";
		$queryresult="";
		foreach($state as $st)
		  $std .="'".$st."',";
		  $std=rtrim($std,",");
		foreach($district as $di)
		  $did .="'".$di."',";
		  $did=rtrim($did,",");
		$size=sizeof($city);
		for($i=0;$i<$size; $i++)
		  {
		   foreach($city[$i] as $ci)
			 $cid .="'".$ci."',";  
		  }
		$cid=rtrim($cid,",");
		  
		if($std!="")
		  $queryresult .=" AND state IN ($std) ";
		if($did!="")
		  $queryresult .=" AND district IN ($did) ";
		if($cid!="")
		  $queryresult .=" AND city IN ($cid) "; 
		
		if( $queryresult!="")
		  return $queryresult;
		else
		  return "AND status='00' ";
	
	}
	
function working_area_member_chain_school($id)
	{	
	 $query="SELECT wa.state , wa.district , wa.city FROM dan_users as du JOIN department_list AS dl ON du.id=dl.`user` JOIN working_area AS wa ON dl.`user`=wa.salesman_id where wa.salesman_id='$id' ";
		
		$data=mysql_query($query) or die(mysql_error());
		
		while($row=mysql_fetch_assoc($data) )
			{
				$state[]=$row['state'];
				$district[]=$row['district'];
				$city[]=unserialize($row['city']);				
			}
		$city=array_unique($city);	
		$state=array_unique($state);
		$district=array_unique($district);
		$std="";
		$did="";
		$cid="";
		$queryresult="";
		foreach($state as $st)
		  $std .="'".$st."',";
		  $std=rtrim($std,",");
		foreach($district as $di)
		  $did .="'".$di."',";
		  $did=rtrim($did,",");
		$size=sizeof($city);
		for($i=0;$i<$size; $i++)
		  {
		   foreach($city[$i] as $ci)
			 $cid .="'".$ci."',";  
		  }
		$cid=rtrim($cid,",");
		  
		if($std!="")
		  $queryresult .=" AND s.state IN ($std) ";
		if($did!="")
		  $queryresult .=" AND s.district IN ($did) ";
		if($cid!="")
		  $queryresult .=" AND s.city IN ($cid) "; 
		
		if( $queryresult!="")
		  return $queryresult;
		else
		  return "AND status='00' ";
	
	}
function working_area_by_id($id)
	{
		global $user;
        if($user > 6)
          {
            /*$query="";
            $data="";
            $query="SELECT salesman_id FROM  working_area WHERE $queryresult ";		
    		$data=mysql_query($query) or die(mysql_error());
    		$user_ids="";
    		$row=mysql_fetch_assoc($data);
    			
    		$user_ids ="'".$row['salesman_id']."'";          
        
		    if( $user_ids!="")*/
		    
            return $id;           
            
          }
        else
          {        
            $query="SELECT wa.state , wa.district , wa.city FROM dan_users as du JOIN department_list AS dl ON du.id=dl.`user` JOIN working_area AS wa ON  wa.salesman_id='$id' ";
    		
    		$data=mysql_query($query) or die(mysql_error());
    		
    		while($row=mysql_fetch_assoc($data) )
    			{
    				$state[]=$row['state'];
    				$district[]=$row['district'];
    				$city[]=unserialize($row['city']);				
    			}
            $city=array_unique($city);		
    		$state=array_unique($state);
    		$district=array_unique($district);
    		$std="";
    		$did="";
    		$cid="";
    		$queryresult="";
    		foreach($state as $st)
    		  $std .=" state LIKE '%".$st."%' OR ";
    		  $std=rtrim($std,"OR ");
    		foreach($district as $di)
    		  $did .=" district LIKE '%".$di."%' OR ";
    		  $did=rtrim($did,"OR ");
    		$size=sizeof($city);
    		for($i=0;$i<$size; $i++)
    		  {
    		   foreach($city[$i] as $ci)
    			 $cid .=" city LIKE '%".$ci."%' OR ";  
    		  }
    		$cid=rtrim($cid,"OR ");
    		  
    		if($std!="")
    		  $queryresult .=" ($std) ";
    		if($did!="")
    		  $queryresult .=" AND ($did) ";
    		if($cid!="")
    		  $queryresult .=" AND ($cid) "; 
    		
            if($queryresult!="")
            {
                $query="";
                $data="";
                $query="SELECT salesman_id FROM  working_area WHERE $queryresult ";		
        		$data=mysql_query($query) or die(mysql_error());
        		$user_ids="";
        		while($row=mysql_fetch_assoc($data) )
        			{
        				$user_ids .="'".$row['salesman_id']."',";								
        			}
                $user_ids=rtrim($user_ids,",");
            }
    		if( $user_ids!="")
    		  return $user_ids;
    		else
    		  return "AND status='00' ";
          }
	
	}
function department_id($id)
	{
		global $user;
        
        if($user > 6)
          {
            $query="";
            $data="";
            $query="SELECT id FROM  department_list WHERE `user`= '$id' ";		
    		$data=mysql_query($query) or die(mysql_error());
    		$user_ids="";
    		$row=mysql_fetch_assoc($data);
    			
    		$user_ids ="'".$row['id']."'";          
        
		    if( $user_ids!="")		    
                return $user_ids;           
            
          }
        else
          {
            $query="SELECT wa.state , wa.district , wa.city FROM dan_users as du JOIN department_list AS dl ON du.id=dl.`user` JOIN working_area AS wa ON  wa.salesman_id='$id' ";
    		
    		$data=mysql_query($query) or die(mysql_error());
    		
    		while($row=mysql_fetch_assoc($data) )
    			{
    				$state[]=$row['state'];
    				$district[]=$row['district'];
    				$city[]=unserialize($row['city']);				
    			}
            $city=array_unique($city);		
    		$state=array_unique($state);
    		$district=array_unique($district);
    		$std="";
    		$did="";
    		$cid="";
    		$queryresult="";
    		foreach($state as $st)
    		  $std .=" state LIKE '%".$st."%' OR ";
    		  $std=rtrim($std,"OR ");
    		foreach($district as $di)
    		  $did .=" district LIKE '%".$di."%' OR ";
    		  $did=rtrim($did,"OR ");
    		$size=sizeof($city);
    		for($i=0;$i<$size; $i++)
    		  {
    		   foreach($city[$i] as $ci)
    			 $cid .=" city LIKE '%".$ci."%' OR ";  
    		  }
    		$cid=rtrim($cid,"OR ");
    		  
    		if($std!="")
    		  $queryresult .=" ($std) ";
    		if($did!="")
    		  $queryresult .=" AND ($did) ";
    		if($cid!="")
    		  $queryresult .=" AND ($cid) "; 
    		
            if($queryresult)
            {
                $query="";
                $data="";
                $query="SELECT salesman_id FROM  working_area WHERE $queryresult ";
        		//echo $query;exit;
        		$data=mysql_query($query) or die(mysql_error());
        		$user_ids="";
        		while($row=mysql_fetch_assoc($data) )
        			{
        				$user_ids .=$row['salesman_id'].",";								
        			}
                $user_ids=rtrim($user_ids,",");
            }
            
            if($user_ids)
            {
                $query="";
                $data="";
                $query="SELECT id FROM  department_list WHERE `user` IN( $user_ids ) ";
        		//echo $query;exit;
        		$data=mysql_query($query) or die(mysql_error());
        		$user_ids="";
        		while($row=mysql_fetch_assoc($data) )
        			{
        				$user_ids .=$row['id'].",";								
        			}
                $user_ids=rtrim($user_ids,",");
            }
            
    		if( $user_ids!="")
    		  return $user_ids;
    		else
    		  return "AND status='00' ";
          }
	
	} 
 
function user_names($id)
	{
	    global $user;
        
        if($user > 6)
          {
            $query="";
            $data="";
            $query="SELECT user_name FROM  dan_users WHERE `id`='$id' ";		
    		$data=mysql_query($query) or die(mysql_error());
    		$user_ids="";
    		$row=mysql_fetch_assoc($data);
    			
    		$user_name ="'".$row['user_name']."'";          
        
		    if( $user_name!="")		    
                return $user_name;           
            
          }
        else
          {
    		$query="SELECT wa.state , wa.district , wa.city FROM dan_users as du JOIN department_list AS dl ON du.id=dl.`user` JOIN working_area AS wa ON  wa.salesman_id='$id' ";
    		
    		$data=mysql_query($query) or die(mysql_error());
    		
    		while($row=mysql_fetch_assoc($data) )
    			{
    				$state[]=$row['state'];
    				$district[]=$row['district'];
    				$city[]=unserialize($row['city']);				
    			}
            $city=array_unique($city);		
    		$state=array_unique($state);
    		$district=array_unique($district);
    		$std="";
    		$did="";
    		$cid="";
    		$queryresult="";
    		foreach($state as $st)
    		  $std .=" state LIKE '%".$st."%' OR ";
    		  $std=rtrim($std,"OR ");
    		foreach($district as $di)
    		  $did .=" district LIKE '%".$di."%' OR ";
    		  $did=rtrim($did,"OR ");
    		$size=sizeof($city);
    		for($i=0;$i<$size; $i++)
    		  {
    		   foreach($city[$i] as $ci)
    			 $cid .=" city LIKE '%".$ci."%' OR ";  
    		  }
    		$cid=rtrim($cid,"OR ");
    		  
    		if($std!="")
    		  $queryresult .=" ($std) ";
    		if($did!="")
    		  $queryresult .=" AND ($did) ";
    		if($cid!="")
    		  $queryresult .=" AND ($cid) "; 
    		
            if($queryresult)
            {
                $query="";
                $data="";
                $query="SELECT salesman_id FROM  working_area WHERE $queryresult ";
        		//echo $query;exit;
        		$data=mysql_query($query) or die(mysql_error());
        		$user_ids="";
        		while($row=mysql_fetch_assoc($data) )
        			{
        				$user_ids .=$row['salesman_id'].",";								
        			}
                $user_ids=rtrim($user_ids,",");
            }
            
            if($user_ids)
            {
                $query="";
                $data="";
                $query="SELECT user_name FROM  dan_users WHERE `id` IN( $user_ids ) ";
        		//echo $query;exit;
        		$data=mysql_query($query) or die(mysql_error());
        		$user_names="";
        		while($row=mysql_fetch_assoc($data) )
        			{
        				$user_names .="'".$row['user_name']."',";								
        			}
                $user_names=rtrim($user_names,",");
            }
            
    		if( $user_names!="")
    		  return $user_names;
    		else
    		  return "AND status='00' ";
          }
	
	}   
  
?>
