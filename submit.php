<?php //ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
    //Start session
    session_start();
    //Include database connection details
    require_once('config.php');
 
    //Array to store validation errors
    $errmsg_arr = array();
 
    //Validation error flag
    $errflag = false;
 
    //Connect to mysql server
   
   
 
    //Select database

 
    //Function to sanitize values received from the form. Prevents SQL injection
   /* function clean($str) {
        $str = @trim($str);
        if(get_magic_quotes_gpc()) {
            $str = stripslashes($str);
        }
        return mysql_real_escape_string($str);
    }*/
 
    //Sanitize the POST values
    $u_id = $_POST['user_name'];
    $pwd = md5($_POST['password']);
	
	
	
// echo'</pre>';print_r($pwd);die;
    //Input Validations
    if($u_id == '') {
        $errmsg_arr[] = 'Login ID missing';
        $errflag = true;
    }
    if($pwd == '') {
        $errmsg_arr[] = 'Password missing';
        $errflag = true;
    }
 
    //If there are input validations, redirect back to the login form
    if($errflag) {
        $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
       // session_write_close();
        header("location: login.php");
        exit();
    }
	
	
	//$u_id = ltrim($u_id, 'GF');
	//$u_id = ltrim($u_id, '0');
	
	//echo'</pre>';print_r($u_id);die;
	//echo'</br>';
//print_r($pwd);die;
    //Create query
    //$result=mysql_query("SELECT * FROM dan_users WHERE user_email='$user_email' AND user_pass='$pwd' AND user_type='1' ") or die(mysql_error());
	 
	// echo "SELECT * FROM dan_users WHERE user_name='$u_id' AND user_pass='$pwd'"; die;
	 $result=mysql_query("SELECT * FROM dan_users WHERE user_name='$u_id' AND user_pass='$pwd'") or die(mysql_error());
	 

	 
  //$users = mysql_fetch_assoc($result);
   //echo'</pre>';print_r($users);die;
   
    //Check whether the query was successful or not
    if(!empty($result)) {
	//echo'</pre>';print_r(mysql_num_rows($result));die;
	$row=mysql_num_rows($result);
        if($row==1) {
		//echo 'heelllo';
          
            //session_regenerate_id();
            $users = mysql_fetch_assoc($result);
			 //echo'</pre>';print_r($users);die;
            $_SESSION['SESS_id'] = $users['id'];
            $_SESSION['SESS_fname'] = $users['user_name'];
            //echo $_SESSION['SESS_id']; die;
            //session_write_close();
			//header("location: index.php");
			echo '<script>window.location.href="index.php";</script>';
            //exit();
        }else {
            //Login failed
                echo '<script>window.location.href="login.php";</script>';
            exit();
        }
    }else {
        die("Query failed");
    }
?>