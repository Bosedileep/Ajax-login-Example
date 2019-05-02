<?php
$rMsg = "";
    $sMsg = "";
require('conf.php');
     $email = $_GET["email"];
    $password= $_GET["password"];
 //run query checker on email
        $sql = $con->query("SELECT id, first_name, password, role_id, status FROM account WHERE LOWER(email)=LOWER('$email');");

        //if user found for email address
        if($sql->num_rows > 0){
                $data = $sql->fetch_array();

            //TASK 2: REPLACE IF STATEMENT CONDITION
            if($password == $data['password']){
                $_SESSION['username'] = $email;
                //header('Location: add_contact.html');
                $Result =  array(
                    'status' =>"success" , 
                    'msg' => 'found user',
                    'user_data'=> $data, //user data array       
                    );
                echo json_encode($Result);
            }else {
            //return email not found message
            //$sMsg = "Email not registered!";
                $Result =  array(
                    'status' =>"error" , 
                    'msg' => 'no user found',           
                    );
                echo json_encode($Result );
        			}
        } else {
            //return email not found message
            $sMsg = "Email not registered!";
       			 }
?>