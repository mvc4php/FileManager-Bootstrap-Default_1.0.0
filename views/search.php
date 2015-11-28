<div class="container">
    <ol class="breadcrumb">
        <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
        <li><a href="#">application</a></li>
        <li><a href="#">customer</a></li>
        <li class="active">search.php</li>
    </ol>
    <a class = "btn btn-success" href = "<?php echo URL; ?>CustomerController/addAction">
        <em class="glyphicon glyphicon-plus-sign"></em>
    </a>
    <br><br>
    <form class="form-horizontal" action="<?php echo URL; ?>CustomerController/searchAction" method="POST">
        <div class="form-group">
            <label class="control-label col-sm-1" for="lastname">Lastname:</label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="lastname" placeholder="Enter Lastname"/>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-default" name="submit_add_data" value="Submit">
                    <span class="glyphicon" aria-hidden="true">Suchen</span>
                </button>
            </div>
        </div>
    </form>
    <br><br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class = "table-th col-lg-1">Firma</th>
                <th class = "table-th col-lg-1">Firstname</th>
                <th class = "table-th col-lg-1">Lastname</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->customers as $datahtml) { ?>
                <tr>
                <td class="table-td col-lg-2"><?php if (isset($datahtml->firma)) echo htmlspecialchars($datahtml->firma); ?></th>
                <td class="table-td col-lg-2"><?php if (isset($datahtml->firstname)) echo htmlspecialchars($datahtml->firstname); ?></th>
                <td class="table-td col-lg-2"><?php if (isset($datahtml->lastname)) echo htmlspecialchars($datahtml->lastname); ?></th>
                    <td class="table-td col-lg-2">
                        <div class="buttons pull-right">
                            <a class="btn btn-info" href="<?php echo URL . 'CustomerController/moreAction/' . htmlspecialchars($datahtml->id); ?>">
                                <em class="glyphicon glyphicon-info-sign"></em>
                            </a>
                            <a class="btn btn-warning" href="<?php echo URL . 'CustomerController/editAction/' . htmlspecialchars($datahtml->id); ?>">
                                <em class="glyphicon glyphicon-edit"></em>
                            </a>
                            <a class="btn btn-danger" href="<?php echo URL . 'CustomerController/deleteAction/' . htmlspecialchars($datahtml->id); ?>">
                                <em class="glyphicon glyphicon-trash"></em>
                            </a>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>