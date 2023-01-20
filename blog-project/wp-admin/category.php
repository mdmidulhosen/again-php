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

                        <?php 
                        
                        if(isset($_POST['add_category_btn'])){
                            $add_category_name = $_POST['category_name_form'];
                            $add_category_description = $_POST['category_description_form'];
                            echo $add_category_description;

                           $add_category_query      = "INSERT INTO category (category_name,category_description,category_status) VALUES ('$add_category_name', '$add_category_description', 0)";
                           $add_category_result     = mysqli_query($database, $add_category_query);

                            if($add_category_result){
                                header('Location: category.php');
                            }else{
                                die("category add error".mysqli_error($database));
                            }
                        }
                        
                        ?>

                        <form class="forms-sample" method="POST" action="" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label for="category_name" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="category_name" placeholder="Name" required="required" name="category_name_form" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="category_description" class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9">
                                    <textarea id="category_description" rows="6" placeholder="Description" name="category_description_form" required="required" style="width: 100%; border:1px solid #eee; border-radius:4px; padding:14px;"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success me-2" name="add_category_btn">Add New</button>
                            <button class="btn btn-primary">Cancel</button>
                        </form>


                    </div>
                </div>

                <!-- edit form start from here -->

                    <?php 
                    
                    if(isset($_GET['edit_ID'])){

                        $edit_id = $_GET['edit_ID'];

                        $edit_query = "SELECT * FROM category WHERE category_id='$edit_id'";
                        $edit_result = mysqli_query($database, $edit_query);

                        while($edit_form_row            = mysqli_fetch_assoc($edit_result)){

                           $edit_category_id            = $edit_form_row['category_id'];
                           $edit_category_name          = $edit_form_row['category_name'];
                           $edit_category_description   = $edit_form_row['category_description'];
                           $edit_category_status        = $edit_form_row['category_status'];
                        }
                        



                        ?>
                        

                        
                        <div class="card mt-5">
                            <div class="card-body">
                                <h4 class="card-title">Edit Category</h4>
                                <p class="card-description">
                                    Name should be 25 characters long.
                                </p>

                                <form class="forms-sample" method="POST" action="" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label for="category_name" class="col-sm-3 col-form-label">Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="edit_category_name" placeholder="Name" required="required" name="update_category_name" value="<?php echo $edit_category_name;?>" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="category_description" class="col-sm-3 col-form-label">Description</label>
                                        <div class="col-sm-9">
                                            <textarea id="edit_category_description" rows="6" placeholder="Description" name="update_category_description" required="required" style="width: 100%; border:1px solid #eee; border-radius:4px; padding:14px;"><?php echo $edit_category_description;?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="category_description" class="col-sm-3 col-form-label">Status</label>
                                        <div class="col-sm-9">
                                            <select name="update_category_status" class="form-control" id="">
                                                <option value="0" <?php if($edit_category_status == 0) echo "selected";?>>Active</option>
                                                <option value="1" <?php if($edit_category_status == 1) echo "selected";?>>Inactive</option>
                                            </select>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-success me-2" name="update_category_btn">Update Category</button>
                                    <button class="btn btn-primary">Cancel</button>

                                    <!-- update category code start from here -->

                                    <?php 
                                    
                                    
                                    if(isset($_POST['update_category_btn'])){
                                        $update_category_name           = $_POST['update_category_name'];
                                        $update_category_description    = $_POST['update_category_description'];
                                        $update_category_status         = $_POST['update_category_status'];

                                        $update_query = "UPDATE category SET category_name='$update_category_name', category_description='$update_category_description ', category_status='$update_category_status' WHERE category_id='$edit_id'";
                                        $update_result = mysqli_query($database, $update_query);
                                        if($update_result){
                                            header('Location: category.php');
                                        }else{
                                            die('category update error'.mysqli_error($database));
                                        };
                                    
                                    
                                    }
                                    
                                    
                                    ?>

                                    <!-- update category code end from here -->
                                </form>


                            </div>
                        </div>

                        
                        <?php
                    }
                    
                    ?>


                

                <!-- edit form end from here -->



            </div>
            <div class="col-md-8">
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


                                <?php 
                                
                               $read_query = "SELECT * FROM category WHERE is_parent = 0 ";
                               $result_query = mysqli_query($database, $read_query);
                                
                               while($result_loop = mysqli_fetch_assoc($result_query)){
                                
                                $category_id            = $result_loop['category_id'];
                                $category_name          = $result_loop['category_name'];
                                $category_description   = $result_loop['category_description'];
                                $category_status        = $result_loop['category_status'];
                                $is_parent              = $result_loop['is_parent'];
                                $parent_id              = $result_loop['parent_id'];


                                ?>
                                
                                <tr>
                                        <td><?php echo $category_name;?></td>
                                        <td><?php echo $category_description;?></td>
                                        <td>
                                            <?php 
                                            
                                            if($category_status == 0){
                                                echo '<label class="btn btn-success btn-sm">Active</label>';
                                            }else{
                                                echo '<label class="btn btn-danger btn-sm">Inactive</label>';
                                            }
                                            
                                            ?>
                                        
                                        
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-success mdi mdi-pencil" href="category.php?edit_ID=<?php echo $category_id?>" type="button"></a>
                                            <a data-bs-toggle="modal" data-bs-target="#modal_delete_ID<?php echo $category_id?>" class="btn btn-sm btn-danger mdi mdi-delete" href="" type="button"></a>

                                                <!-- Modal -->
                                            <div class="modal fade" id="modal_delete_ID<?php echo $category_id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header text-center" style="margin: 0px auto;">
                                                    <h2 class="text-dark">Are you sure?</h2>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                    <button type="button" class="btn btn-success btn-md" data-bs-dismiss="modal">Cancel</button>
                                                    <a href="category.php?delete_ID=<?php echo $category_id;?>" type="button" class="btn btn-danger btn-md">Delete</a>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>

                                            <!-- Edit operation start from here -->

                                                <?php 
                                                
                                                
                                                
                                                ?>

                                            <!-- Edit operation end from here -->

                                            <!-- Delete operation start from here -->

                                            <?php
                                            
                                            if(isset($_GET['delete_ID'])){
                                                $delete_id = $_GET['delete_ID'];

                                               $delete_query = "DELETE FROM category WHERE category_id = $delete_id";
                                               $delete_result = mysqli_query($database, $delete_query);
                                               if($delete_result){
                                                header('Location: category.php');
                                               }else{
                                                die('Category delete error'.mysqli_error($database));
                                               }

                                            }
                                            
                                            ?>

                                            <!-- Delete operation end from here -->

                                        </td>
                                    </tr>
                                
                                <?php


                               }
                                ?>
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
