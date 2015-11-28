<?php

$klassentype = 'Controller';
$klasse = $klassenname . $klassentype;
$dateiname = 'controllers/' . $klasse . '.php';

$content = $file_info;
$content .= '
/**
 * Class ' . $klasse . '
 * This is for ' . $klassenname . '
 * Please note:
 * Don\'t use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 */
class ' . $klasse . ' extends Controller {
    '
        . PHP_EOL . PHP_EOL;

$fuss = '
}';

### ### ### INCLUDES END ### ### ###
// Create file
$file = fopen($dateiname, 'w');

#### readAction() ###
$content .= '    // @var $' . lcfirst($klassenname) . 'Model and for Class Model Aggregation' . PHP_EOL;
$content .= '    private $' . lcfirst($klassenname) . 'Model = null;' . PHP_EOL;
$content .= '    // @var $' . lcfirst($klassenname) . 's is all Data from Model as a Array for View' . PHP_EOL;
$content .= '    private $' . lcfirst($klassenname) . 's = array();' . PHP_EOL;
$content .= '
    /**
     * Whenever controllers is created, open a database connection too and load "the model".
     * Start aggregation to Class ' . $klassenname . 'Model
     */' . PHP_EOL;
$content .= '    public function __construct() {' . PHP_EOL;
$content .= '        // Include this File ' . $klassenname . 'Model.php from Model' . PHP_EOL;
$content .= '        require APP . \'models/' . $klassenname . 'Model.php\';' . PHP_EOL;
$content .= '        // start composition to model' . PHP_EOL;
$content .= '        $this->' . lcfirst($klassenname) . 'Model = new ' . $klassenname . 'Model();' . PHP_EOL;
$content .= '    }' . PHP_EOL;
$content .= '
    /**
     * ACTION: readAction
     * This method handles what happens when you move to http://yourdomain/' . $klassenname . 'Controller/readAction
     */' . PHP_EOL;
$content .= '    public function readAction() {' . PHP_EOL;
$content .= '        // Show/Read from Model' . PHP_EOL;
$content .= '        $this->' . lcfirst($klassenname) . 's = $this->' . lcfirst($klassenname) . 'Model->readData();' . PHP_EOL;
$content .= '        //if url class and method exist, read $this->' . lcfirst($klassenname) . 's in ' . $klassenname . 'Controller/read.php' . PHP_EOL;
$content .= '        if ($_GET[\'url\'] == "' . $klassenname . 'Controller/readAction") {' . PHP_EOL;
$content .= '            require ROOT . URL_PUBLIC_FOLDER . \'/layout/header.php\';' . PHP_EOL;
$content .= '            require APP . \'views/' . lcfirst($klassenname) . '/read.php\';' . PHP_EOL;
$content .= '            require ROOT . URL_PUBLIC_FOLDER . \'/layout/footer.php\';' . PHP_EOL;
$content .= '        }' . PHP_EOL;
$content .= '    }' . PHP_EOL;
#### readAction() end ###
#
#
#
#### addAction() ###
$content .= '
    /**
     * ACTION: addAction
     * This method handles what happens when you move to http://yourdomain/' . $klassenname . 'Controller/addAction
     * This is an example of how to handle a POST request.
     */
';
$content .= '    public function addAction() {' . PHP_EOL;
$content .= '        // if we have POST contract to create a new contract entry' . PHP_EOL;
$content .= '        if (!isset($_POST["submit_add_data"])) {' . PHP_EOL;
$content .= '            // do not add() in models/' . $klassenname . 'Model.php' . PHP_EOL;
$content .= '            require ROOT . URL_PUBLIC_FOLDER . \'/layout/header.php\';' . PHP_EOL;
$content .= '            require APP . \'views/' . lcfirst($klassenname) . '/add.php\';' . PHP_EOL;
$content .= '            require ROOT . URL_PUBLIC_FOLDER . \'/layout/footer.php\';' . PHP_EOL;
$content .= '            // do add() in models/' . $klassenname . 'Model.php' . PHP_EOL;
$content .= '        } else if (isset($_POST["submit_add_data"])) {' . PHP_EOL;
$content .= '            $this->' . lcfirst($klassenname) . 'Model->addData(';
$content .= implode(', ', array_map(function ($v, $k) {
            return '$_POST["' . $v . '"]';
        }, $vars, array_keys($vars)));
$content .= ');' . PHP_EOL;
$content .= '            header(\'location: \' . URL . \'' . $klassenname . 'Controller/readAction\');' . PHP_EOL;
$content .= '        }' . PHP_EOL;
$content .= '    }' . PHP_EOL;
#### addAction() end ###
#
#
#
#### editAction() ###
$content .= '
    /**
     * ACTION: editAction
     * This method handles what happens when you move to http://yourdomain/' . $klassenname . 'Controller/editAction
     * @param int $id Id of the to-edit ' . lcfirst($klassenname) . '
     */' . PHP_EOL;
$content .= '    public function editAction($id) {' . PHP_EOL;
$content .= '        // if we have an id of a ' . $klassenname . ' that should be edited' . PHP_EOL;
$content .= '        if (isset($id)) {' . PHP_EOL;
$content .= '            // do get() in models/' . $klassenname . 'Model.php' . PHP_EOL;
$content .= '            $this->' . lcfirst($klassenname) . 's = $this->' . lcfirst($klassenname) . 'Model->editData($id);' . PHP_EOL;
$content .= '            require ROOT . URL_PUBLIC_FOLDER . \'/layout/header.php\';' . PHP_EOL;
$content .= '            require APP . \'views/' . lcfirst($klassenname) . '/edit.php\';' . PHP_EOL;
$content .= '            require ROOT . URL_PUBLIC_FOLDER . \'/layout/footer.php\';' . PHP_EOL;
$content .= '        } else {' . PHP_EOL;
$content .= '            header(\'location: \' . URL . \'' . $klassenname . 'Controller/readAction\');' . PHP_EOL;
$content .= '        }' . PHP_EOL;
$content .= '    }' . PHP_EOL;
#### editAction() end ###
#
#
#
#### updateAction() ###
$content .= '
    /**
     * ACTION: updateAction
     * This method handles what happens when you move to http://yourdomain/' . $klassenname . 'Controller/updateAction
     * This is an example of how to handle a POST request.
     */
';
$content .= '    public function updateAction() {' . PHP_EOL;
$content .= '        // if we have POST contract to create a new contract entry' . PHP_EOL;
$content .= '        if (isset($_POST["submit_update_data"])) {' . PHP_EOL;
$content .= '            // do not add() in models/' . $klassenname . 'Model.php' . PHP_EOL;
$content .= '            $this->' . lcfirst($klassenname) . 'Model->updateData(';
$content .= implode(', ', array_map(function ($v, $k) {
            return '$_POST["' . $v . '"]';
        }, $vars, array_keys($vars)));
$content .= ');' . PHP_EOL;
$content .= '        }' . PHP_EOL;
$content .= '        header(\'location: \' . URL . \'' . $klassenname . 'Controller/readAction\');' . PHP_EOL;
$content .= '    }' . PHP_EOL;
#### updateAction() end ###
#
#
#
#### deleteAction() ###
$content .= '
    /**
     * ACTION: deleteAction
     * This method handles what happens when you move to http://yourdomain/' . $klassenname . 'Controller/deleteAction
     * This is an example of how to handle a GET request.
     * @param int $id Id of the to-delete ' . lcfirst($klassenname) . '
     */
';
$content .= '        public function deleteAction($id) {' . PHP_EOL;
$content .= '        // if we have an id of a customer that should be deleted' . PHP_EOL;
$content .= '        if (isset($id)) {' . PHP_EOL;
$content .= '            // do deleteData() in models/' . $klassenname . 'Model.php' . PHP_EOL;
$content .= '            $this->' . lcfirst($klassenname) . 'Model->deleteData($id);' . PHP_EOL;
$content .= '            header(\'location: \' . URL . \'' . $klassenname . 'Controller/readAction\');' . PHP_EOL;
$content .= '        }' . PHP_EOL;
$content .= '    }' . PHP_EOL;
#### deleteAction() end ###
#
#
#
#### searchAction() ###
$content .= '
    /**
     * ACTION: searchAction
     * This method handles what happens when you move to http://yourdomain/' . $klassenname . 'Controller/searchAction
     * This is an example of how to handle a GET request.
     * @param int ' . $search . ' Search of the to-search ' . $search . '
     */
';
$content .= '    public function searchAction() {' . PHP_EOL;
$content .= '        // if we have POST contract to create a new contract entry' . PHP_EOL;
$content .= '        if (isset($_POST["submit_add_data"])) {' . PHP_EOL;
$content .= '            // do not add() in models/' . $klassenname . 'Model.php' . PHP_EOL;
$content .= '            $this->' . lcfirst($klassenname) . 's = $this->' . lcfirst($klassenname) . 'Model->searchData($_POST["' . $search . '"]);' . PHP_EOL;
$content .= '        }' . PHP_EOL;
$content .= '        require ROOT . URL_PUBLIC_FOLDER . \'/layout/header.php\';' . PHP_EOL;
$content .= '        require APP . \'views/' . lcfirst($klassenname) . '/search.php\';' . PHP_EOL;
$content .= '        require ROOT . URL_PUBLIC_FOLDER . \'/layout/footer.php\';' . PHP_EOL;
$content .= '    }' . PHP_EOL;
#### searchAction() end ###
#
#
#
#### amountAction() ###
$content .= '
    /**
     * ACTION: amountAction
     * This method handles what happens when you move to http://yourdomain/' . $klassenname . 'Controller/amountAction
     * This is an example of how to handle a GET request.
     * @param int id Id as a Amount
     */
';
$content .= '    public function amountAction() {' . PHP_EOL;
$content .= '        $amount_of_data = $this->customerModel->amountData();' . PHP_EOL;
$content .= '        // Output from Amount' . PHP_EOL;
$content .= '        return $amount_of_data;' . PHP_EOL;
$content .= '        header(\'location: \' . URL . \'' . $klassenname . 'Controller/readAction\');' . PHP_EOL;
$content .= '    }' . PHP_EOL;
#### amountAction() end ###
#
#
#### moreAction() ###
$content .= '
    /**
     * ACTION: moreAction
     * This method handles what happens when you move to http://yourdomain/' . $klassenname . 'Controller/moreAction
     * @param int $id Id of the to-edit ' . lcfirst($klassenname) . '
     */' . PHP_EOL;
$content .= '    public function moreAction($id) {' . PHP_EOL;
$content .= '        // if we have an id of a ' . $klassenname . ' that should be edited' . PHP_EOL;
$content .= '        if (isset($id)) {' . PHP_EOL;
$content .= '            // do get() in models/' . $klassenname . 'Model.php' . PHP_EOL;
$content .= '            $this->' . lcfirst($klassenname) . 's = $this->' . lcfirst($klassenname) . 'Model->editData($id);' . PHP_EOL;
$content .= '            require ROOT . URL_PUBLIC_FOLDER . \'/layout/header.php\';' . PHP_EOL;
$content .= '            require APP . \'views/' . lcfirst($klassenname) . '/more.php\';' . PHP_EOL;
$content .= '            require ROOT . URL_PUBLIC_FOLDER . \'/layout/footer.php\';' . PHP_EOL;
$content .= '        } else {' . PHP_EOL;
$content .= '            header(\'location: \' . URL . \'' . $klassenname . 'Controller/readAction\');' . PHP_EOL;
$content .= '        }' . PHP_EOL;
$content .= '    }' . PHP_EOL;
#### moreAction() end ###
// include footer
$content .= $fuss;

fwrite($file, $content);
fclose($file);
