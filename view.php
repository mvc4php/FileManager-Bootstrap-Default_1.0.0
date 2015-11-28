<?php

$dateiname = 'views/read.php';
$file = fopen($dateiname, 'w');

### read.php ###
$content = '<div class="container">' . PHP_EOL;
$content .= '    <ol class="breadcrumb">' . PHP_EOL;
$content .= '        <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>' . PHP_EOL;
$content .= '        <li><a href="#">application</a></li>' . PHP_EOL;
$content . '         <li><a href="#">view</a></li>' . PHP_EOL;
$content .= '        <li><a href="#">' . lcfirst($klassenname) . '</a></li>' . PHP_EOL;
$content .= '        <li class="active">read.php</li>' . PHP_EOL;
$content .= '    </ol>' . PHP_EOL;

$content .= '    <a class = "btn btn-success" href = "<?php echo URL; ?>' . $klassenname . 'Controller/addAction">' . PHP_EOL;
$content .= '        <em class="glyphicon glyphicon-plus-sign"></em>' . PHP_EOL;
$content .= '    </a>' . PHP_EOL;
$content .= '    <br><br>' . PHP_EOL;
$content .= '    <table class="table table-bordered">' . PHP_EOL;
$content .= '        <thead>' . PHP_EOL;
$content .= '            <tr>' . PHP_EOL;
$content .= implode(PHP_EOL, array_map(function ($v, $k) {
            return '                <th class = "table-th col-lg-1">' . $v . '</th>';
        }, $index, array_keys($index)));
$content .= PHP_EOL;
$content .= '            </tr>' . PHP_EOL;
$content .= '        </thead>' . PHP_EOL;
$content .= '        <tbody>' . PHP_EOL;
$content .= '            <?php foreach ($this->' . lcfirst($klassenname) . 's as $datahtml) { ?>' . PHP_EOL;
$content .= '                <tr>' . PHP_EOL;
$content .= implode(PHP_EOL, array_map(function ($v, $k) {
            return '                <td class="table-td col-lg-2"><?php if (isset($datahtml->' . lcfirst($v) . ')) echo htmlspecialchars($datahtml->' . lcfirst($v) . '); ?></th>';
        }, $index, array_keys($index)));
$content .= '
                    <td class="table-td col-lg-2">
                        <div class="buttons pull-right">
                            <a class="btn btn-info" href="<?php echo URL . \'' . $klassenname . 'Controller/moreAction/\' . htmlspecialchars($datahtml->id); ?>">
                                <em class="glyphicon glyphicon-info-sign"></em>
                            </a>
                            <a class="btn btn-warning" href="<?php echo URL . \'' . $klassenname . 'Controller/editAction/\' . htmlspecialchars($datahtml->id); ?>">
                                <em class="glyphicon glyphicon-edit"></em>
                            </a>
                            <a class="btn btn-danger" href="<?php echo URL . \'' . $klassenname . 'Controller/deleteAction/\' . htmlspecialchars($datahtml->id); ?>">
                                <em class="glyphicon glyphicon-trash"></em>
                            </a>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>';

fwrite($file, $content);
fclose($file);
### read.php end###
#
#
#
### search.php ###
$dateiname = 'views/search.php';
$file = fopen($dateiname, 'w');

$content = '<div class="container">' . PHP_EOL;
$content .= '    <ol class="breadcrumb">' . PHP_EOL;
$content .= '        <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>' . PHP_EOL;
$content .= '        <li><a href="#">application</a></li>' . PHP_EOL;
$content . '         <li><a href="#">view</a></li>' . PHP_EOL;
$content .= '        <li><a href="#">' . lcfirst($klassenname) . '</a></li>' . PHP_EOL;
$content .= '        <li class="active">search.php</li>' . PHP_EOL;
$content .= '    </ol>' . PHP_EOL;

$content .= '    <a class = "btn btn-success" href = "<?php echo URL; ?>' . $klassenname . 'Controller/addAction">' . PHP_EOL;
$content .= '        <em class="glyphicon glyphicon-plus-sign"></em>' . PHP_EOL;
$content .= '    </a>' . PHP_EOL;
$content .= '    <br><br>' . PHP_EOL;
$content .= '    <form class="form-horizontal" action="<?php echo URL; ?>' . $klassenname . 'Controller/searchAction" method="POST">' . PHP_EOL;
$content .= '        <div class="form-group">' . PHP_EOL;
$content .= '            <label class="control-label col-sm-1" for="' . $search . '">' . ucfirst($search) . ':</label>' . PHP_EOL;
$content .= '            <div class="col-md-9">' . PHP_EOL;
$content .= '                <input type="text" class="form-control" name="' . $search . '" placeholder="Enter ' . ucfirst($search) . '"/>' . PHP_EOL;
$content .= '            </div>' . PHP_EOL;
$content .= '            <div class="col-md-2">' . PHP_EOL;
$content .= '                <button type="submit" class="btn btn-default" name="submit_add_data" value="Submit">' . PHP_EOL;
$content .= '                    <span class="glyphicon" aria-hidden="true">Suchen</span>' . PHP_EOL;
$content .= '                </button>' . PHP_EOL;
$content .= '            </div>' . PHP_EOL;
$content .= '        </div>' . PHP_EOL;
$content .= '    </form>' . PHP_EOL;
$content .= '    <br><br>' . PHP_EOL;
$content .= '    <table class="table table-bordered">' . PHP_EOL;
$content .= '        <thead>' . PHP_EOL;
$content .= '            <tr>' . PHP_EOL;
$content .= implode(PHP_EOL, array_map(function ($v, $k) {
            return '                <th class = "table-th col-lg-1">' . $v . '</th>';
        }, $index, array_keys($index)));
$content .= PHP_EOL;
$content .= '            </tr>' . PHP_EOL;
$content .= '        </thead>' . PHP_EOL;
$content .= '        <tbody>' . PHP_EOL;
$content .= '            <?php foreach ($this->' . lcfirst($klassenname) . 's as $datahtml) { ?>' . PHP_EOL;
$content .= '                <tr>' . PHP_EOL;
$content .= implode(PHP_EOL, array_map(function ($v, $k) {
            return '                <td class="table-td col-lg-2"><?php if (isset($datahtml->' . lcfirst($v) . ')) echo htmlspecialchars($datahtml->' . lcfirst($v) . '); ?></th>';
        }, $index, array_keys($index)));
$content .= '
                    <td class="table-td col-lg-2">
                        <div class="buttons pull-right">
                            <a class="btn btn-info" href="<?php echo URL . \'' . $klassenname . 'Controller/moreAction/\' . htmlspecialchars($datahtml->id); ?>">
                                <em class="glyphicon glyphicon-info-sign"></em>
                            </a>
                            <a class="btn btn-warning" href="<?php echo URL . \'' . $klassenname . 'Controller/editAction/\' . htmlspecialchars($datahtml->id); ?>">
                                <em class="glyphicon glyphicon-edit"></em>
                            </a>
                            <a class="btn btn-danger" href="<?php echo URL . \'' . $klassenname . 'Controller/deleteAction/\' . htmlspecialchars($datahtml->id); ?>">
                                <em class="glyphicon glyphicon-trash"></em>
                            </a>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>';

fwrite($file, $content);
fclose($file);
### search.php end ###
#
#
#
### add.php ###
$dateiname = 'views/add.php';
$file = fopen($dateiname, 'w');


$content = '<div class="container">' . PHP_EOL;
$content .= '    <ol class="breadcrumb">' . PHP_EOL;
$content .= '        <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>' . PHP_EOL;
$content .= '        <li><a href="#">application</a></li>' . PHP_EOL;
$content . '        <li><a href="#">view</a></li>' . PHP_EOL;
$content .= '        <li><a href="#">' . lcfirst($klassenname) . '</a></li>' . PHP_EOL;
$content .= '        <li class="active">add.php</li>' . PHP_EOL;
$content .= '    </ol>' . PHP_EOL;
$content .= '    <br><br>' . PHP_EOL;
$content .= '    <form class="form-horizontal" action="<?php echo URL; ?>' . $klassenname . 'Controller/addAction" method="POST">' . PHP_EOL;

foreach ($vars as $values) {
    $content .='
        <div class="form-group">
            <label class="control-label col-sm-1" for="' . $values . '">' . ucfirst($values) . ':</label>
            <div class="col-sm-11">
                <input type="text" class="form-control" name="' . $values . '" placeholder="Enter ' . ucfirst($values) . '" value=""  />
            </div>
        </div>
        ';
}

$content .= '
        <div class="form-group">
            <div class="col-sm-11 pull-left">
                <button type="submit" class="btn btn-default" name="submit_add_data" value="Add">
                    <span class="glyphicon glyphicon-floppy-save" aria-hidden="true">Add</span>
                </button>
            </div>
        </div>
    </form>
</div>';

fwrite($file, $content);
fclose($file);
### add.php end ###
#
#
#
### edit.php ###
$dateiname = 'views/edit.php';
$file = fopen($dateiname, 'w');

$content = '<div class="container">' . PHP_EOL;
$content .= '    <ol class="breadcrumb">' . PHP_EOL;
$content .= '        <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>' . PHP_EOL;
$content .= '        <li><a href="#">application</a></li>' . PHP_EOL;
$content . '        <li><a href="#">view</a></li>' . PHP_EOL;
$content .= '        <li><a href="#">' . lcfirst($klassenname) . '</a></li>' . PHP_EOL;
$content .= '        <li class="active">adit.php</li>' . PHP_EOL;
$content .= '    </ol>' . PHP_EOL;
$content .= '    <br><br>' . PHP_EOL;
$content .= '    <form class="form-horizontal" action="<?php echo URL; ?>' . $klassenname . 'Controller/updateAction" method="POST">' . PHP_EOL;

foreach ($vars as $values) {
    $content .='
        <div class="form-group">
            <label class="control-label col-sm-1" for="' . $values . '">' . ucfirst($values) . ':</label>
            <div class="col-sm-11">
                <input type="text" class="form-control" name="' . $values . '" placeholder="Enter ' . ucfirst($values) . '" value="<?php echo htmlspecialchars($this->' . lcfirst($klassenname) . 's->' . lcfirst($values) . '); ?>" />
            </div>
        </div>
        ';
}

$content .= '
        <div class="form-group">
            <div class="col-sm-11 pull-left">
                <button type="submit" class="btn btn-default" name="submit_update_data" value="Update">
                    <span class="glyphicon glyphicon-floppy-save" aria-hidden="true">Add</span>
                </button>
            </div>
        </div>
    </form>
</div>';

fwrite($file, $content);
fclose($file);
### edit.php end ###
#
#
#
#
#
#
### more.php ###
$dateiname = 'views/more.php';
$file = fopen($dateiname, 'w');

$content = '<div class="container">' . PHP_EOL;
$content .= '    <ol class="breadcrumb">' . PHP_EOL;
$content .= '        <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>' . PHP_EOL;
$content .= '        <li><a href="#">application</a></li>' . PHP_EOL;
$content . '        <li><a href="#">view</a></li>' . PHP_EOL;
$content .= '        <li><a href="#">' . lcfirst($klassenname) . '</a></li>' . PHP_EOL;
$content .= '        <li class="active">more.php</li>' . PHP_EOL;
$content .= '    </ol>' . PHP_EOL;
$content .= '    <br><br>' . PHP_EOL;
$content .= '
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Informationen</div>

        <!-- Table -->
        <table class="table">
            <thead>';

foreach ($vars as $values) {

    $content .='
                <tr>
                    <td>' . ucfirst($values) . '</td>
                    <th><?php echo htmlspecialchars($this->' . lcfirst($klassenname) . 's->' . lcfirst($values) . '); ?><th>
                </tr>';
}

$content .= '
             </thead>
         </table>
     </div>';

$content .= '
                    <td class="table-td col-lg-2">
                        <div class="buttons pull-right">
                            <a class="btn btn-info" href="<?php echo URL . \'' . $klassenname . 'Controller/moreAction/\' . htmlspecialchars($this->' . lcfirst($klassenname) . 's->id); ?>">
                                <em class="glyphicon glyphicon-info-sign"></em>
                            </a>
                            <a class="btn btn-warning" href="<?php echo URL . \'' . $klassenname . 'Controller/editAction/\' . htmlspecialchars($this->' . lcfirst($klassenname) . 's->id); ?>">
                                <em class="glyphicon glyphicon-edit"></em>
                            </a>
                            <a class="btn btn-danger" href="<?php echo URL . \'' . $klassenname . 'Controller/deleteAction/\' . htmlspecialchars($this->' . lcfirst($klassenname) . 's->id); ?>">
                                <em class="glyphicon glyphicon-trash"></em>
                            </a>
                        </div>
                    </td>';

fwrite($file, $content);
fclose($file);
### more.php end ###
