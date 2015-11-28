<div class="container">
    <ol class="breadcrumb">
        <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
        <li><a href="#">application</a></li>
        <li><a href="#">customer</a></li>
        <li class="active">add.php</li>
    </ol>
    <br><br>
    <form class="form-horizontal" action="<?php echo URL; ?>CustomerController/addAction" method="POST">

        <div class="form-group">
            <label class="control-label col-sm-1" for="id">Id:</label>
            <div class="col-sm-11">
                <input type="text" class="form-control" name="id" placeholder="Enter Id" value=""  />
            </div>
        </div>
        
        <div class="form-group">
            <label class="control-label col-sm-1" for="firma">Firma:</label>
            <div class="col-sm-11">
                <input type="text" class="form-control" name="firma" placeholder="Enter Firma" value=""  />
            </div>
        </div>
        
        <div class="form-group">
            <label class="control-label col-sm-1" for="firstname">Firstname:</label>
            <div class="col-sm-11">
                <input type="text" class="form-control" name="firstname" placeholder="Enter Firstname" value=""  />
            </div>
        </div>
        
        <div class="form-group">
            <label class="control-label col-sm-1" for="lastname">Lastname:</label>
            <div class="col-sm-11">
                <input type="text" class="form-control" name="lastname" placeholder="Enter Lastname" value=""  />
            </div>
        </div>
        
        <div class="form-group">
            <label class="control-label col-sm-1" for="status">Status:</label>
            <div class="col-sm-11">
                <input type="text" class="form-control" name="status" placeholder="Enter Status" value=""  />
            </div>
        </div>
        
        <div class="form-group">
            <label class="control-label col-sm-1" for="contact">Contact:</label>
            <div class="col-sm-11">
                <input type="text" class="form-control" name="contact" placeholder="Enter Contact" value=""  />
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-sm-11 pull-left">
                <button type="submit" class="btn btn-default" name="submit_add_data" value="Add">
                    <span class="glyphicon glyphicon-floppy-save" aria-hidden="true">Add</span>
                </button>
            </div>
        </div>
    </form>
</div>