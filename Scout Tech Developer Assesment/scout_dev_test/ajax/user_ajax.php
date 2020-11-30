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
    $um = new user_model();
    echo json_encode(array('newUser'=>$um->new_user()));

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
       
    echo json_encode(array('validateData'=>$um->validateEmail(),'validateMobile'=>$um->validateMobile()));
    
    
}