<?php

class Info extends Connection{

    const TABLE_NAME = "info";

    public $name, $email;
    private $db;

    public function __construct($db){
        $this->db = $db;
    }

    /**
     * Retrieve all data from table info
     * 
     * @return void;
     */
    public function get(){
        try{
            $query = "SELECT * FROM ".self::TABLE_NAME." ORDER BY id ASC";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
        }catch(PDOException $e){
            echo "Error while run query, with error : ".$e->getMessage();
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get detail data from table info
     *
     * @param integer $id : info id
     *
     * @return void;
     */
    public function first($id){
        try{
            $query = "SELECT * FROM ".self::TABLE_NAME." WHERE id=:id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
        }catch(PDOException $e){
            echo "Error while run query, with error : ".$e->getMessage();
        }

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Insert statement to table info
     * 
     * @return boolean
     */
    public function save(){

        try{
            $query = "INSERT INTO ".self::TABLE_NAME." (name, email) VALUES (:name, :email)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":email", $this->email);
            $stmt->execute();
        }catch(PDOException $e){
            echo "Error while run query, with error : ".$e->getMessage();
        }

        if($stmt){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Update record statement
     *
     * @param integer $id : info id
     *
     * @return boolean;
     */
    public function update($id){
        try{
            $query = "UPDATE ".self::TABLE_NAME." SET name=:name, email=:email WHERE id=:id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":id", $this->id);
            $stmt->execute();
        }catch(PDOException $e){
            echo "Error while run query, with error : ".$e->getMessage();
        }

        if($stmt){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Check, is email available or not
     *
     * @param string $email : email input
     *
     * @return boolean;
     */
    public function isEmailAvailable($email){
        try{
            $query = "SELECT email FROM ".self::TABLE_NAME." WHERE email=:email";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(":email", $email);
            $stmt->execute();
        }catch(PDOException $e){
            echo "Error while run query, with error : ".$e->getMessage();
        }

        if($stmt->rowCount() == 0){
            return true;
        }else{
            return false;
        }
    }
}
