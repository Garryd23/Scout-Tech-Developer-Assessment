<?php
header('Content-Type: application/json');
require_once '../core/core.php';
require_once '../user_model.php';

switch($_POST['action']){
    case 'newUser':
    echo newUser();
    break;

    case 'getUsers':
        echo getUsers();
        break;

    case 'validateData':
        echo validateData();
        break;
}

function newUser() {

    $hasErrors =null;
    $errorString = '';
   
    
    if ( isset( $_POST['name'] ) && empty( trim( $_POST['name'] ) ) ) {
        $errorString .= '<br>- Name cannot be blank';
        $hasErrors = true;
       } 

    
       if ( isset( $_POST['surname'] ) && empty( trim( $_POST['surname'] ) ) ) {
        $errorString .= '<br>- Surname cannot be blank';
        $hasErrors = true;
       } 
    
    
       if ( isset( $_POST['username'] ) && empty( trim( $_POST['username'] ) ) ) {
        $errorString .= '<br>- Username cannot be blank';
        $hasErrors = true;
       }
    
       if ( isset( $_POST['password'] ) && empty( trim( $_POST['password'] ) ) ) {
        $errorString .= '<br>- Password cannot be blank';
        $hasErrors = true;
       }

   $email_regex = '^[\w\.=-]+@[\w\.-]+\.[\w]{2,3}$^';
				if ( isset( $_POST['email'] ) && empty( trim( $_POST['email'] ) ) ) {
				  $errorString .= '- Email cannot be blank';
                  $hasErrors = true;
				} else if( isset( $_POST['email'] ) && ! preg_match( $email_regex, $_POST['email'] ) ) {
					$errorString .= '- Email is not valid';
                    $hasErrors = true;
                } 
                
    $phone_regex = '^[0-9]{10}+$^';
    if ( isset( $_POST['mobile'] ) && empty( trim( $_POST['mobile'] ) ) ) {
         $errorString .= '- Mobile cannot be blank';
        $hasErrors = true;
       } else if( isset( $_POST['mobile'] ) && ! preg_match( $phone_regex, $_POST['mobile'] ) ) {
            $errorString .= '- Mobile number is not valid';
        $hasErrors = true;
       } 

if(!$hasErrors){
    $um = new user_model();
    echo json_encode(array('newUser'=>$um->new_user()));
} else{
    echo json_encode(array('hasError'=>true,'errors'=>$errorString));
}

}

function getUsers() {
    $um = new user_model();
   $rowNum = 0;
   $outstring = '';
   foreach ($um->user_list() as $row) {
       $rowNum++;
       $outstring .= '<tr>
                        <th scope="row">'.$rowNum.'</th>
                        <td>'.$row->name.' '.$row->surname.'</td>
                        <td>'.$row->email.'</td>
                        <td>'.$row->mobile.'</td>
                        <td><button class="btn btn-outline-primary" id="user" onclick="location.href = \'edit_user.php?us='.$row->id.'\';">Edit User</button></td>
                        </tr>';    
   }
   
   return json_encode(array('users'=>$outstring));
}

function validateData() {
   
    
    //Check that email and mobile do not already exist

    $um = new user_model();
    $emailDuplicate = $um->validateEmail();
    $mobileDuplicate = $um->validateMobile();
    if($emailDuplicate){
        $emailExists = true;
    }  else {
        $emailExists = false;
    }

    if($mobileDuplicate){
        $mobileExists = true;
    }  else {
        $mobileExists = false;
    }
    echo json_encode(array('validateData'=>$emailExists,'validateMobile'=>$mobileExists));
    
    
}