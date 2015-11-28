<div class="container">
    <ol class="breadcrumb">
        <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
        <li><a href="#">application</a></li>
        <li><a href="#">customer</a></li>
        <li class="active">more.php</li>
    </ol>
    <br><br>

    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Informationen</div>

        <!-- Table -->
        <table class="table">
            <thead>
                <tr>
                    <td>Id</td>
                    <th><?php echo htmlspecialchars($this->customers->id); ?><th>
                </tr>
                <tr>
                    <td>Firma</td>
                    <th><?php echo htmlspecialchars($this->customers->firma); ?><th>
                </tr>
                <tr>
                    <td>Firstname</td>
                    <th><?php echo htmlspecialchars($this->customers->firstname); ?><th>
                </tr>
                <tr>
                    <td>Lastname</td>
                    <th><?php echo htmlspecialchars($this->customers->lastname); ?><th>
                </tr>
                <tr>
                    <td>Status</td>
                    <th><?php echo htmlspecialchars($this->customers->status); ?><th>
                </tr>
                <tr>
                    <td>Contact</td>
                    <th><?php echo htmlspecialchars($this->customers->contact); ?><th>
                </tr>
             </thead>
         </table>
     </div>
                    <td class="table-td col-lg-2">
                        <div class="buttons pull-right">
                            <a class="btn btn-info" href="<?php echo URL . 'CustomerController/moreAction/' . htmlspecialchars($this->customers->id); ?>">
                                <em class="glyphicon glyphicon-info-sign"></em>
                            </a>
                            <a class="btn btn-warning" href="<?php echo URL . 'CustomerController/editAction/' . htmlspecialchars($this->customers->id); ?>">
                                <em class="glyphicon glyphicon-edit"></em>
                            </a>
                            <a class="btn btn-danger" href="<?php echo URL . 'CustomerController/deleteAction/' . htmlspecialchars($this->customers->id); ?>">
                                <em class="glyphicon glyphicon-trash"></em>
                            </a>
                        </div>
                    </td>