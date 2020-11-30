<?php
$host = 'localhost';
$dbname = 'scout_tech_test';
$username = 'root';
$password = '';


class database {
    var $db;

    
    function __construct() {
        $host = 'localhost';
        $dbname = 'scout_tech_test';
        $username = 'root';
        $password = '';
        $this->db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    }
        
    function get_single_row($basecommand,$params) {
        $stmt = $this->db->prepare($basecommand);
        $stmt->execute($params);
        
        return $stmt->fetchObject();
        
    }
    
    function get_data_set($basecommand,$params) {
        $stmt = $this->db->prepare($basecommand);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    function update_db($basecommand,$params) {
        try {
            $stmt = $this->db->prepare($basecommand);
            $result = $stmt->execute($params);
            return $result;
        }catch (PDOException $err) {
            echo $err->getMessage();
            return false;    
        }
    }

    function __destruct() {
        $this->db = null;
    }
    
    
}
?>