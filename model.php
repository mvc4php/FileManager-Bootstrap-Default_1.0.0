<?php

$klassentype = 'Model';
$klasse = $klassenname . $klassentype;
$dateiname = 'models/' . $klasse . '.php';

$content = $file_info;
$content .= '
/**
 * Class ' . $klasse . '
 * This is for Database.
 * Please note:
 * Don\'t use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 */
 class ' . $klasse . ' extends Model {'
        . PHP_EOL . PHP_EOL;

$fuss = '}';

### ### ### INCLUDES END ### ### ###
// Create file
$file = fopen($dateiname, 'w');



// include class variables
for ($anzahl = 0; $anzahl < $anzahl_vars; $anzahl++) {
    $content .= '    // @var ' . $typs[$anzahl] . ' $' . $vars[$anzahl] . ' ' . ucfirst($vars[$anzahl]) . PHP_EOL;
    $content .= '    private ' . '$' . $vars[$anzahl] . ' = ' . '"' . $vars[$anzahl] . '";' . PHP_EOL;
}
$content .= PHP_EOL;


//all parameters for all functions
$content .= '    /**' . PHP_EOL;
$content .= '     * Get all ' . $klassenname . ' from Database' . PHP_EOL;
for ($anzahl = 0; $anzahl < $anzahl_vars; $anzahl++) {
    $content .= '     * @param ' . $typs[$anzahl] . ' $' . $vars[$anzahl] . ' ' . ucfirst($vars[$anzahl]) . PHP_EOL;
}

#### indexData() ###
$content .= '     */' . PHP_EOL;
$content .= '    public function readData() {' . PHP_EOL;
$content .= '        $sql = "SELECT ';

// SELECT ABFRAGE
$array = implode('}, {$this->', $vars);
// fur erste this, weil explode das nicht macht
$content .= '{$this->' . $array . '}';

$content .= ' FROM ' . $klassenname . '";';

$content .= '
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
' . PHP_EOL;
#### indexData() end ###
#
#
#
#### addData() ###
//all parameters for all functions
$content .= '    /**' . PHP_EOL;
$content .= '     * Add a ' . $klassenname . ' in Database' . PHP_EOL;
for ($anzahl = 0; $anzahl < $anzahl_vars; $anzahl++) {
    $content .= '     * @param ' . $typs[$anzahl] . ' $' . $vars[$anzahl] . ' ' . ucfirst($vars[$anzahl]) . PHP_EOL;
}
$content .= '     */' . PHP_EOL;

$array = implode(', $', $vars);
$content .= '    public function addData($' . $array . ') {' . PHP_EOL;

$array = implode('}, {$this->', $vars);
$values = implode(', :', $vars);
// Insert
$content .= '        $sql = "INSERT INTO ' . $klassenname;

// fur erste this, weil explode das nicht macht
$content .= ' ( {$this->' . $array . '}';
$content .= ' ) VALUES ( :' . $values . ' )";' . PHP_EOL;

$content .= '        $query = $this->db->prepare($sql);' . PHP_EOL;
$content .= '        $parameters = array(';
//http://stackoverflow.com/questions/11427398/php-how-to-implode-array-with-key-and-value-without-foreach
$content .= implode(', ', array_map(function ($v, $k) {
            return '\':' . $v . '\' => $' . $v;
        }, $vars, array_keys($vars)));

$content .= ');';

$content .= '
        // useful for debugging: you can see the SQL behind above construction by using:
        // echo \'[ PDO DEBUG ]:\' . Helper::debugPDO($sql, $parameters);  exit();
        $query->execute($parameters);
    }
' . PHP_EOL;
#### addData() end ###
#
#
#
##### editData() ###
//all parameters for all functions
$content .= '    /**' . PHP_EOL;
$content .= '     * Get a ' . $klassenname . ' from Database' . PHP_EOL;
for ($anzahl = 0; $anzahl < $anzahl_vars; $anzahl++) {
    $content .= '     * @param ' . $typs[$anzahl] . ' $' . $vars[$anzahl] . ' ' . ucfirst($vars[$anzahl]) . PHP_EOL;
}
$content .= '     */' . PHP_EOL;
$content .= '    public function editData($id) {' . PHP_EOL;
// SELECT ABFRAGE
$content .= '        $sql = "SELECT ';
$array = implode('}, {$this->', $vars);
// fur erste this, weil explode das nicht macht
$content .= '{$this->' . $array . '}';
$content .= ' FROM ' . $klassenname . ' WHERE {$this->id} = :id LIMIT 1";' . PHP_EOL;
$content .= '        $query = $this->db->prepare($sql); ' . PHP_EOL;
$content .= '        $parameters = array(\':id\' => $id);';

$content .= '
        // useful for debugging: you can see the SQL behind above construction by using:
        // echo \'[ PDO DEBUG ]:\' . Helper::debugPDO($sql, $parameters);  exit();
        $query->execute($parameters);
        // fetch() is the PDO method that get exactly one result
        return $query->fetch();
    }
' . PHP_EOL;
#### editData() end ###
#
#
#
#### updatData() ###
//all parameters for all functions
$content .= '    /**' . PHP_EOL;
$content .= '     * Edit/Update a ' . $klassenname . ' in Database' . PHP_EOL;
for ($anzahl = 0; $anzahl < $anzahl_vars; $anzahl++) {
    $content .= '     * @param ' . $typs[$anzahl] . ' $' . $vars[$anzahl] . ' ' . ucfirst($vars[$anzahl]) . PHP_EOL;
}

$content .= '     */' . PHP_EOL;

$array = implode(', $', $vars);
$content .= '    public function updateData($' . $array . ') {' . PHP_EOL;

$array = implode('}, {$this->', $vars);
$values = implode(', :', $vars);
// update
$content .= '        $sql = "UPDATE ' . $klassenname . ' SET ';

$content .= implode(', ', array_map(function ($v, $k) {
            return '{$this->' . $v . '} = :' . $v;
        }, $vars, array_keys($vars)));


$content .= ' WHERE {$this->id} = :id";' . PHP_EOL;

$content .= '        $query = $this->db->prepare($sql);' . PHP_EOL;
$content .= '        $parameters = array(';

$content .= implode(', ', array_map(function ($v, $k) {
            return '\':' . $v . '\' => $' . $v;
        }, $vars, array_keys($vars)));

$content .= ');';

$content .= '
        // useful for debugging: you can see the SQL behind above construction by using:
        // echo \'[ PDO DEBUG ]:\' . Helper::debugPDO($sql, $parameters);  exit();
        $query->execute($parameters);
    }
' . PHP_EOL;
#### updtaeData() end ###
#
#
#
##### deleteData() ###
//all parameters for all functions
$content .= '    /**' . PHP_EOL;
$content .= '     * Delete a  ' . $klassenname . ' in Database' . PHP_EOL;
$content .= '     */' . PHP_EOL;
$content .= '    public function deleteData($id) {' . PHP_EOL;

$content .= '        $sql = "DELETE FROM ' . $klassenname;
$content .= ' WHERE {$this->id} = :id";' . PHP_EOL;
$content .= '        $query = $this->db->prepare($sql); ' . PHP_EOL;
$content .= '        $parameters = array(\':id\' => $id);';

$content .= '
        // useful for debugging: you can see the SQL behind above construction by using:
        // echo \'[ PDO DEBUG ]:\' . Helper::debugPDO($sql, $parameters);  exit();
        $query->execute($parameters);
    }
' . PHP_EOL;
#### deleteData() end ###
#
#
#
##### searchData() ###
//all parameters for all functions
$content .= '    /**' . PHP_EOL;
$content .= '     * Search a  ' . $klassenname . ' in Database' . PHP_EOL;
$content .= '     * @param ' . $search_type . ' $' . $search . ' ' . ucfirst($search) . PHP_EOL;
$content .= '     */' . PHP_EOL;
$content .= '    public function searchData() {' . PHP_EOL;

$content .= '        $sql = "SELECT * FROM ' . $klassenname;
$content .= ' WHERE {$this->' . $search . '} LIKE \'%{$_POST["' . $search . '"]}%\'";' . PHP_EOL;
$content .= '        $query = $this->db->prepare($sql); ' . PHP_EOL;

$content .= '
        $query->execute();
        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        return $query->fetchAll();
    }
' . PHP_EOL;
#### searchData() end ###
#
#
#
##### amountData() ###
//all parameters for all functions
$content .= '    /**' . PHP_EOL;
$content .= '     * Amount a  ' . $klassenname . ' from Database' . PHP_EOL;
$content .= '     * @param amount_of_data $amount_of_data Amount of data' . PHP_EOL;
$content .= '     */' . PHP_EOL;
$content .= '    public function amountData() {' . PHP_EOL;

$content .= '        $sql = "SELECT COUNT({$this->id}) AS amount_of_data FROM ' . $klassenname . '";' . PHP_EOL;
$content .= '        $query = $this->db->prepare($sql); ' . PHP_EOL;
$content .= '        $query->execute();';

$content .= '
        // fetch() is the PDO method that get exactly one result
        return $query->fetch()->amount_of_data;
    }
' . PHP_EOL;
#### amountData() end ###
// include footer
$content .= $fuss;

fwrite($file, $content);
fclose($file);
