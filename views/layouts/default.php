<!DOCTYPE html>
<html lang="en">
    <?php require_once '/var/www/html/views/partials/head.html';?>
<body>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Manage Climbing Places</h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="#addClimbingPlaceModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Climbing Place</span></a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Country</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($climbingPlaces as $place) { ?>
                        <tr>
                            <td><?php echo $place->getId(); ?></td>
                            <td><?php echo $place->getName(); ?></td>
                            <td><?php echo $place->getCountry(); ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <div class="clearfix">
                    <div class="hint-text">Total: <b><?php echo $total; ?></b> entries</div>
                </div>
            </div>
        </div>
    </div>

    <div id="addClimbingPlaceModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="index.php" method="post">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Climbing Place</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Id</label>
                            <input name="id" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input name="name" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Country</label>
                            <input name="country" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>