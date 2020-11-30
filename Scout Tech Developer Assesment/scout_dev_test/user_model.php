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

        $params = array(':username'=>strip_tags($_POST['username']),
                        ':email'=> strip_tags($_POST['email']),
                        ':password'=>strip_tags($_POST['password']),
                        ':mobile'=>strip_tags($_POST['mobile']),
                        ':name'=>strip_tags($_POST['name']),
                        ':surname'=>strip_tags($_POST['surname']),
                        ':job_title' =>strip_tags($_POST['job_title']),
                        ':bio'=>strip_tags($_POST['bio'])
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
            
            $params = array(':username'=>strip_tags($_POST['username']),
                            ':name'=>strip_tags($_POST['name']),
                            ':surname'=>strip_tags($_POST['surname']),
                            ':mobile'=>strip_tags($_POST['mobile']),
                            ':job_title'=>strip_tags($_POST['jobTitle']),
                            ':bio'=>strip_tags($_POST['bio']),
                            ':id'=>strip_tags($_GET['us'])
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