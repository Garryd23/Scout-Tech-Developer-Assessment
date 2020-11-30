<?php
class user_model{
    var $db;

    function __construct(){
        $this->db = new database();
    }

    function new_user(){
        $basecommand = 'insert into users_dev 
                        (username,email,password,mobile,name,surname,job_title,bio) 
                        values (:username,
                                :email,
                                :password,
                                :mobile,
                                :name,
                                :surname,
                                :job_title,
                                :bio)';

        $params = array(':username'=>$_POST['username'],
                        ':email'=> $_POST['email'],
                        ':password'=>$_POST['password'],
                        ':mobile'=>$_POST['mobile'],
                        ':name'=>$_POST['name'],
                        ':surname'=>$_POST['surname'],
                        ':job_title' =>$_POST['job_title'],
                        ':bio'=>$_POST['bio']
                    );
        
        $this->db->update_db($basecommand, $params);
        
        $basecommand = 'select max(id) as new_user from users_dev';
        
        $lrid = $this->db->get_single_row($basecommand, null)->new_user;
        
        return $lrid;
    }

    function user_list(){
        $basecommand = 'Select * from users_dev';
        $params = array();

        return $this->db->get_data_set($basecommand, $params);
    }

    function get_single_user(){
        $basecommand = 'Select * from users_dev where id=:id';
        $params = array(':id'=>$_GET['us']);

        return $this->db->get_single_row($basecommand,$params);
    }

    function update_user(){
        
            $basecommand = 'update users_dev set 
                            username = :username,
                            name = :name,
                            surname  = :surname,
                            mobile  = :mobile,
                            job_title  = :job_title,
                            bio  = :bio
                            where id=:id';
            
            $params = array(':username'=>$_POST['username'],
                            ':name'=>$_POST['name'],
                            ':surname'=>$_POST['surname'],
                            ':mobile'=>$_POST['mobile'],
                            ':job_title'=>$_POST['jobTitle'],
                            ':bio'=>$_POST['bio'],
                            ':id'=>$_GET['us']
                            );
            
            return $this->db->update_db($basecommand, $params);
           
            
        
    }

    function validateEmail() {
        $basecommand = 'Select email as email from users_dev where email =:email';
        $params = array(':email'=>$_POST['email']);

        $query = $this->db->get_single_row($basecommand, $params);
        return $query;
    }

    function validateMobile() {
        $basecommand = 'Select mobile as mobile from users_dev where mobile =:mobile';
        $params = array(':mobile'=>$_POST['mobile']);

        $query = $this->db->get_single_row($basecommand, $params);
        return $query;
    }
}