<?php

/**
 * @package     MVC4PHP // 2
 * @version     1.1.0
 * @link        http://www.mvc4php.com
 * @license     GPL/GNU 3.0 - http://mvc4php.com/license.txt
 * @author      Vedat Yildirim <info@vedatyildirim.com>
 */

/**
 * Class CustomerController
 * This is for Customer
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 */
class CustomerController extends Controller {
    

    // @var $customerModel and for Class Model Aggregation
    private $customerModel = null;
    // @var $customers is all Data from Model as a Array for View
    private $customers = array();

    /**
     * Whenever controllers is created, open a database connection too and load "the model".
     * Start aggregation to Class CustomerModel
     */
    public function __construct() {
        // Include this File CustomerModel.php from Model
        require APP . 'models/CustomerModel.php';
        // start composition to model
        $this->customerModel = new CustomerModel();
    }

    /**
     * ACTION: readAction
     * This method handles what happens when you move to http://yourdomain/CustomerController/readAction
     */
    public function readAction() {
        // Show/Read from Model
        $this->customers = $this->customerModel->readData();
        //if url class and method exist, read $this->customers in CustomerController/read.php
        if ($_GET['url'] == "CustomerController/readAction") {
            require ROOT . URL_PUBLIC_FOLDER . '/layout/header.php';
            require APP . 'views/customer/read.php';
            require ROOT . URL_PUBLIC_FOLDER . '/layout/footer.php';
        }
    }

    /**
     * ACTION: addAction
     * This method handles what happens when you move to http://yourdomain/CustomerController/addAction
     * This is an example of how to handle a POST request.
     */
    public function addAction() {
        // if we have POST contract to create a new contract entry
        if (!isset($_POST["submit_add_data"])) {
            // do not add() in models/CustomerModel.php
            require ROOT . URL_PUBLIC_FOLDER . '/layout/header.php';
            require APP . 'views/customer/add.php';
            require ROOT . URL_PUBLIC_FOLDER . '/layout/footer.php';
            // do add() in models/CustomerModel.php
        } else if (isset($_POST["submit_add_data"])) {
            $this->customerModel->addData($_POST["id"], $_POST["firma"], $_POST["firstname"], $_POST["lastname"], $_POST["status"], $_POST["contact"]);
            header('location: ' . URL . 'CustomerController/readAction');
        }
    }

    /**
     * ACTION: editAction
     * This method handles what happens when you move to http://yourdomain/CustomerController/editAction
     * @param int $id Id of the to-edit customer
     */
    public function editAction($id) {
        // if we have an id of a Customer that should be edited
        if (isset($id)) {
            // do get() in models/CustomerModel.php
            $this->customers = $this->customerModel->editData($id);
            require ROOT . URL_PUBLIC_FOLDER . '/layout/header.php';
            require APP . 'views/customer/edit.php';
            require ROOT . URL_PUBLIC_FOLDER . '/layout/footer.php';
        } else {
            header('location: ' . URL . 'CustomerController/readAction');
        }
    }

    /**
     * ACTION: updateAction
     * This method handles what happens when you move to http://yourdomain/CustomerController/updateAction
     * This is an example of how to handle a POST request.
     */
    public function updateAction() {
        // if we have POST contract to create a new contract entry
        if (isset($_POST["submit_update_data"])) {
            // do not add() in models/CustomerModel.php
            $this->customerModel->updateData($_POST["id"], $_POST["firma"], $_POST["firstname"], $_POST["lastname"], $_POST["status"], $_POST["contact"]);
        }
        header('location: ' . URL . 'CustomerController/readAction');
    }

    /**
     * ACTION: deleteAction
     * This method handles what happens when you move to http://yourdomain/CustomerController/deleteAction
     * This is an example of how to handle a GET request.
     * @param int $id Id of the to-delete customer
     */
        public function deleteAction($id) {
        // if we have an id of a customer that should be deleted
        if (isset($id)) {
            // do deleteData() in models/CustomerModel.php
            $this->customerModel->deleteData($id);
            header('location: ' . URL . 'CustomerController/readAction');
        }
    }

    /**
     * ACTION: searchAction
     * This method handles what happens when you move to http://yourdomain/CustomerController/searchAction
     * This is an example of how to handle a GET request.
     * @param int lastname Search of the to-search lastname
     */
    public function searchAction() {
        // if we have POST contract to create a new contract entry
        if (isset($_POST["submit_add_data"])) {
            // do not add() in models/CustomerModel.php
            $this->customers = $this->customerModel->searchData($_POST["lastname"]);
        }
        require ROOT . URL_PUBLIC_FOLDER . '/layout/header.php';
        require APP . 'views/customer/search.php';
        require ROOT . URL_PUBLIC_FOLDER . '/layout/footer.php';
    }

    /**
     * ACTION: amountAction
     * This method handles what happens when you move to http://yourdomain/CustomerController/amountAction
     * This is an example of how to handle a GET request.
     * @param int id Id as a Amount
     */
    public function amountAction() {
        $amount_of_data = $this->customerModel->amountData();
        // Output from Amount
        return $amount_of_data;
        header('location: ' . URL . 'CustomerController/readAction');
    }

    /**
     * ACTION: moreAction
     * This method handles what happens when you move to http://yourdomain/CustomerController/moreAction
     * @param int $id Id of the to-edit customer
     */
    public function moreAction($id) {
        // if we have an id of a Customer that should be edited
        if (isset($id)) {
            // do get() in models/CustomerModel.php
            $this->customers = $this->customerModel->editData($id);
            require ROOT . URL_PUBLIC_FOLDER . '/layout/header.php';
            require APP . 'views/customer/more.php';
            require ROOT . URL_PUBLIC_FOLDER . '/layout/footer.php';
        } else {
            header('location: ' . URL . 'CustomerController/readAction');
        }
    }

}