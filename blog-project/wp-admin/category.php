<?php include "includes/header.php"?>
<div class="main-panel">
    <div class="content-wrapper">
        <!-- our code start from here -->

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add New Category</h4>
                        <p class="card-description">
                            Name should be 25 characters long.
                        </p>
                        <form class="forms-sample">
                            <div class="form-group row">
                                <label for="category_name" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="category_name" placeholder="Name" required="required" name="category_name" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="category_description" class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9">
                                    <textarea id="category_description" rows="6" placeholder="Description" name="category_description" required="required" style="width: 100%; border:1px solid #eee; border-radius:4px; padding:14px;"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success me-2">Add New</button>
                            <button class="btn btn-primary">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Categories</h4>
                        <p class="card-description">Category Info <code>.table-hover</code></p>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Category Name</th>
                                        <th>Description</th>
                                        <th>Category Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Jacob</td>
                                        <td>Photoshop</td>
                                        <td><label class="badge badge-danger">Pending</label></td>
                                        <td>
                                            <a class="btn btn-sm btn-success mdi mdi-pencil" href="" type="button"></a>
                                            <a data-bs-toggle="modal" data-bs-target="#modal_delete_ID" class="btn btn-sm btn-danger mdi mdi-delete" href="" type="button"></a>

                                              <!-- Modal -->
                                            <div class="modal fade" id="modal_delete_ID" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header text-center" style="margin: 0px auto;">
                                                    <h2 class="text-dark">Are you sure?</h2>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                    <button type="button" class="btn btn-success btn-md" data-bs-dismiss="modal">Cancel</button>
                                                    <a href="first.php?delete_ID=<?php echo $category_id;?>" type="button" class="btn btn-danger btn-md">Delete</a>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>


                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- our code end from here -->
    </div>
    <?php include "includes/footer.php"?>
</div>
