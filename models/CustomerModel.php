<?php

/**
 * @package     MVC4PHP // 2
 * @version     1.1.0
 * @link        http://www.mvc4php.com
 * @license     GPL/GNU 3.0 - http://mvc4php.com/license.txt
 * @author      Vedat Yildirim <info@vedatyildirim.com>
 */

/**
 * Class CustomerModel
 * This is for Database.
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 */
 class CustomerModel extends Model {

    // @var int $id Id
    private $id = "id";
    // @var string $firma Firma
    private $firma = "firma";
    // @var string $firstname Firstname
    private $firstname = "firstname";
    // @var string $lastname Lastname
    private $lastname = "lastname";
    // @var string $status Status
    private $status = "status";
    // @var string $contact Contact
    private $contact = "contact";

    /**
     * Get all Customer from Database
     * @param int $id Id
     * @param string $firma Firma
     * @param string $firstname Firstname
     * @param string $lastname Lastname
     * @param string $status Status
     * @param string $contact Contact
     */
    public function readData() {
        $sql = "SELECT {$this->id}, {$this->firma}, {$this->firstname}, {$this->lastname}, {$this->status}, {$this->contact} FROM Customer";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * Add a Customer in Database
     * @param int $id Id
     * @param string $firma Firma
     * @param string $firstname Firstname
     * @param string $lastname Lastname
     * @param string $status Status
     * @param string $contact Contact
     */
    public function addData($id, $firma, $firstname, $lastname, $status, $contact) {
        $sql = "INSERT INTO Customer ( {$this->id}, {$this->firma}, {$this->firstname}, {$this->lastname}, {$this->status}, {$this->contact} ) VALUES ( :id, :firma, :firstname, :lastname, :status, :contact )";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id, ':firma' => $firma, ':firstname' => $firstname, ':lastname' => $lastname, ':status' => $status, ':contact' => $contact);
        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]:' . Helper::debugPDO($sql, $parameters);  exit();
        $query->execute($parameters);
    }

    /**
     * Get a Customer from Database
     * @param int $id Id
     * @param string $firma Firma
     * @param string $firstname Firstname
     * @param string $lastname Lastname
     * @param string $status Status
     * @param string $contact Contact
     */
    public function editData($id) {
        $sql = "SELECT {$this->id}, {$this->firma}, {$this->firstname}, {$this->lastname}, {$this->status}, {$this->contact} FROM Customer WHERE {$this->id} = :id LIMIT 1";
        $query = $this->db->prepare($sql); 
        $parameters = array(':id' => $id);
        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]:' . Helper::debugPDO($sql, $parameters);  exit();
        $query->execute($parameters);
        // fetch() is the PDO method that get exactly one result
        return $query->fetch();
    }

    /**
     * Edit/Update a Customer in Database
     * @param int $id Id
     * @param string $firma Firma
     * @param string $firstname Firstname
     * @param string $lastname Lastname
     * @param string $status Status
     * @param string $contact Contact
     */
    public function updateData($id, $firma, $firstname, $lastname, $status, $contact) {
        $sql = "UPDATE Customer SET {$this->id} = :id, {$this->firma} = :firma, {$this->firstname} = :firstname, {$this->lastname} = :lastname, {$this->status} = :status, {$this->contact} = :contact WHERE {$this->id} = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id, ':firma' => $firma, ':firstname' => $firstname, ':lastname' => $lastname, ':status' => $status, ':contact' => $contact);
        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]:' . Helper::debugPDO($sql, $parameters);  exit();
        $query->execute($parameters);
    }

    /**
     * Delete a  Customer in Database
     */
    public function deleteData($id) {
        $sql = "DELETE FROM Customer WHERE {$this->id} = :id";
        $query = $this->db->prepare($sql); 
        $parameters = array(':id' => $id);
        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]:' . Helper::debugPDO($sql, $parameters);  exit();
        $query->execute($parameters);
    }

    /**
     * Search a  Customer in Database
     * @param string $lastname Lastname
     */
    public function searchData() {
        $sql = "SELECT * FROM Customer WHERE {$this->lastname} LIKE '%{$_POST["lastname"]}%'";
        $query = $this->db->prepare($sql); 

        $query->execute();
        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        return $query->fetchAll();
    }

    /**
     * Amount a  Customer from Database
     * @param amount_of_data $amount_of_data Amount of data
     */
    public function amountData() {
        $sql = "SELECT COUNT({$this->id}) AS amount_of_data FROM Customer";
        $query = $this->db->prepare($sql); 
        $query->execute();
        // fetch() is the PDO method that get exactly one result
        return $query->fetch()->amount_of_data;
    }

}