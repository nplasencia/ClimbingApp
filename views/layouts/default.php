<!DOCTYPE html>
<html lang="en">
    <?php require_once (__DIR__.'/../partials/head.html');?>
<body>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper" id="content">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Manage Climbing Places</h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="#addClimbingPlaceModal" class="btn btn-success" data-toggle="modal">
                                <i class="material-icons">&#xE147;</i>
                                <span>Add New Climbing Place</span>
                            </a>
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
                        <tr v-if="total == 0">
                            <td colspan="3" class="noresults">No results</td>
                        </tr>
                        <tr v-else v-for="place in climbingPlaces">
                            <td>{{ place.id }}</td>
                            <td>{{ place.name }}</td>
                            <td>{{ place.country }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="clearfix">
                    <div class="hint-text">Total: <b>{{ total }}</b> entries</div>
                </div>
            </div>
        </div>
    </div>

    <div id="addClimbingPlaceModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form @submit.prevent="createClimbingPlace">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Climbing Place</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Id</label>
                            <input v-model="id" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input v-model="name" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="country">Country</label>
                            <input v-model="country" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" :disabled="!isFormValid()" class="btn btn-success" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php require_once (__DIR__.'/../partials/scripts.html');?>
</body>
</html>