<?php include "includes/header.php"?>
<div class="main-panel">
    <div class="content-wrapper">
    <!-- body content start from here -->
    

    <?php 
        
        if(isset($_GET['do'])){
            $do = $_GET['do'];
        }else{
            $do = 'View';

        }

        if($do == 'View'){
            // view all user
           
            ?>
            
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">All users information</h4>
                  <p class="card-description">
                    Users info <code>.table-hover</code>
                  </p>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Address</th>
                          <th>Photo</th>
                          <!-- <th>Biodata</th> -->
                          <th>Phone</th>
                          <th>Birth Date</th>
                          <th>Gender</th>
                          <th>User Type</th>
                          <th>User Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>


<!-- data read from dashboard php code start from here  -->

<?php 

$user_query     = "SELECT * FROM users";
$user_result    = mysqli_query($database, $user_query);
$number         = 0;
 while($user_row = mysqli_fetch_assoc($user_result)){

    $user_id            = $user_row['user_id'];
    $user_name          = $user_row['user_name'];
    $user_email         = $user_row['user_email'];
    $user_address       = $user_row['user_address'];
    $user_image         = $user_row['user_image'];
    $user_biodata       = $user_row['user_biodata'];
    $user_phone         = $user_row['user_phone'];
    $user_password      = $user_row['user_password'];
    $user_birth_date    = $user_row['user_birth_date'];
    $user_gender        = $user_row['user_gender'];
    $user_type          = $user_row['user_type'];
    $user_status        = $user_row['user_status'];

    $number++;



?>


<tr>
    <td><?php echo $number;?></td>
    <td><?php echo $user_name;?></td>
    <td><?php echo $user_email;?></td>
    <td><?php echo $user_address;?></td>
    <td><img src="images\users_images/<?php echo $user_image;?>" alt=""></td>
    <!-- <td><?php echo substr($user_biodata, 0, 48);?></td> -->
    <td><?php echo $user_phone;?></td>
    <td><?php echo $user_birth_date;?></td>
    <td><?php echo $user_gender;?></td>
    <td>
      <?php 
      
      if($user_type == 0){
        echo '<span class="badge badge-xs text-center badge-success">Subscriber</span>';
      }
      elseif($user_type == 1){
        echo '<span class="badge badge-xs text-center badge-primary">Editor</span>';
      }
      elseif($user_type == 2){
        echo '<span class="badge badge-xs text-center badge-danger">Admin</span>';
      }
      
      ?>
    </td>
    <td>
        <select name="user_status" class="form-control" id="">
            <option class="text-center" value="0" <?php if($user_status == 0) echo "selected";?>>Active</option>
            <option class="text-center" value="1" <?php if($user_status == 1) echo "selected";?>>Inactive</option>
        </select>
      </td>
      <td>
      <a class="btn btn-xs btn-success mdi mdi-pencil" href="users.php?user_edit_ID=<?php echo $user_id;?>" type="button"></a>
      <a class="btn btn-xs btn-primary mdi mdi-account-check" href="users.php?user_account_ID=<?php echo $user_id;?>" type="button"></a>
      <a class="btn btn-xs btn-danger mdi mdi-delete" data-bs-toggle="modal" data-bs-target="#modal_delete_ID<?php echo $user_id?>" type="button"></a>

        <!-- Modal -->
        <div class="modal fade" id="modal_delete_ID<?php echo $user_id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center" style="margin: 0px auto;">
                <h2 class="text-dark">Are you sure?</h2>
                </div>
                <div class="modal-body text-center">
                <button type="button" class="btn btn-success btn-md" data-bs-dismiss="modal">Cancel</button>
                <a href="users.php?user_delete_ID=<?php echo $user_id;?>" type="button" class="btn btn-danger btn-md">Delete</a>

                <?php 
                
                
                if(isset($_GET['user_delete_ID'])){
                  $user_delete_ID      = $_GET['user_delete_ID'];
                  // delete user image

                  $image_delete_query  = "SELECT user_image FROM users WHERE user_id = $user_delete_ID";
                  $image_delete_result = mysqli_query($database, $image_delete_query);
                  while($image_delete_row = mysqli_fetch_assoc($image_delete_result)){
                    $user_Image_id = $image_delete_row['user_image'];
                  }
                  unlink('images/users_images/'.$user_Image_id);

                  // delete user information
                  $user_delete_query  = "DELETE FROM users WHERE user_id = $user_delete_ID";
                  $user_delete_result = mysqli_query($database, $user_delete_query);
                  if($user_delete_result){
                    header('Location: users.php');
                  }else{
                    die('User delete error'.mysqli_error($database));
                  }
                }
                
                
                ?>

                </div>
            </div>
          </div>
      </div>


      </td>
</tr>



<?php




 }




?>


<!-- data read from dashboard php code end from here  -->

                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            
            
            <?php

        }
        elseif($do = 'Add'){
            // add new user
            ?>
            
<div class="main-panel">
    <div class="content-wrapper">
    <!-- body content start from here -->
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Add User information</h4>
          <p class="card-description">
            Add user info
          </p>


          <form class="forms-sample" method="POST" action="" enctype="multipart/form-data">
            <div class="form-group row">
              <label for="username" class="col-sm-3 col-form-label">User Name</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="username" placeholder="Name" name="username">
              </div>
            </div>

            <div class="form-group row">
              <label for="useremail" class="col-sm-3 col-form-label">User Email</label>
              <div class="col-sm-9">
                <input type="email" class="form-control" id="useremail" placeholder="Email" name="useremail">
              </div>
            </div>

            <div class="form-group row">
              <label for="usernumber" class="col-sm-3 col-form-label">User Phone</label>
              <div class="col-sm-9">
                <input type="number" class="form-control" id="usernumber" placeholder="+880" name="usernumber">
              </div>
            </div>

            <div class="form-group row">
              <label for="userdob" class="col-sm-3 col-form-label">User Date of Birth</label>
              <div class="col-sm-9">
                <input type="date" class="form-control" id="userdob" placeholder="" name="userdob">
              </div>
            </div>

            <div class="form-group row">
              <label for="userpassword" class="col-sm-3 col-form-label">User Password</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" id="userpassword" placeholder="+880" name="userpassword">
              </div>
            </div>

            <div class="form-group row">
              <label for="useraddress" class="col-sm-3 col-form-label">User Address</label>
              <div class="col-sm-9">
                <textarea name="useraddress" placeholder="Address" id="useraddress" rows="6" style="width: 100%; border:1px solid #eee; border-radius:4px; padding:14px;"></textarea>
              </div>
            </div>

            <div class="form-group row">
              <label for="usergender" class="col-sm-3 col-form-label">User Gender</label>
              <div class="col-sm-9">
                <select name="usergender" class="form-control" id="usergender">
                  <option value="">Select Your Gender</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                  <option value="Others">Others</option>
                </select>
              </div>
            </div>
            
            <div class="form-group row">
              <label for="userbiodata" class="col-sm-3 col-form-label">User Biodata</label>
              <div class="col-sm-9">
                <textarea name="userbiodata" placeholder="Biodata" id="userbiodata" rows="6" style="width: 100%; border:1px solid #eee; border-radius:4px; padding:14px;"></textarea>
              </div>
            </div>

            <div class="form-group row">
              <label for="usertype" class="col-sm-3 col-form-label">User Role</label>
              <div class="col-sm-9">
                <select name="usertype" class="form-control" id="usertype">
                  <option value="">Select User Role</option>
                  <option value="Male">Subscriber</option>
                  <option value="Female">Editor</option>
                  <option value="Others">Admin</option>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="userimage" class="col-sm-3 col-form-label">User Image</label>
              <div class="col-sm-9">
                <input type="file" class="form-control" id="userimage" placeholder="+880" name="userimage">
                <small>Insert only PNG/JPG/JPEG format image</small>
              </div>
            </div>


            <button type="submit" class="btn btn-primary me-2" name="add_user">Submit</button>
            <button class="btn btn-light">Cancel</button>
          </form>

          <?php 
          
          if(isset($_POST['add_user'])){

            $user_name            = $_POST['username'];
            $user_email           = $_POST['useremail'];
            $user_address         = $_POST['useraddress'];
            $user_biodata         = mysqli_real_escape_string($database, $_POST['userbiodata']);
            $user_phone           = $_POST['usernumber'];
            $userdob              = $_POST['userdob'];
            $user_password        = $_POST['userpassword'];
            $user_gender          = $_POST['usergender'];
            $user_type            = $_POST['usertype'];
            $user_image           = $_FILES['userimage']['name'];

            $user_image_size      = $_FILES['userimage']['size'];
            $user_image_temp_name = $_FILES['userimage']['tmp_name'];

            $split_name = explode('.', $_FILES['userimage']['name']);
            $extension = end($split_name);
            $lower_extension = strtolower($extension);
            $image_format = array('png','jpg','jpeg');


            if(in_array($lower_extension, $image_format) === true){

              

              $random_number    = rand();
              $updated_name     = $random_number.'_'.$user_image;
              move_uploaded_file($user_image_temp_name, 'images/users_images/'.$updated_name);
              $hash_password    = sha1($user_password);

              $image_size = getimagesize('images/users_images/32386026_istockphoto-1319763830-612x612.jpg');

              $add_user_query   = "INSERT INTO users (user_name, user_email, user_address, user_image, user_biodata, user_phone, user_birth_date, user_password, user_gender, user_type, user_status) VALUES ('$user_name', '$user_email', '$user_address', '$updated_name', '$user_biodata', '$user_phone', '$userdob', '$hash_password', '$user_gender', '$user_type', 0)";
              $add_user_result  = mysqli_query($database, $add_user_query);
              
              if($add_user_result){
                header('Location: users.php');
              }else{
                die('Add user error!'.mysqli_error($database));
              }


            }else{
               echo "Please upload an jpg, jpeg, png format image!";
            }



          }

            
          
          
          ?>
          

        </div>
      </div>

      

    <!-- body content end from here -->
    </div>
            
            <?php

        }
        elseif($do = 'Edit'){
            // edit user

        }
        elseif($do = 'Update'){
            // update user

        }
        elseif($do = 'Delete'){
            // delete user

        }
        
    ?>


    <!-- body content end from here -->
    </div>
<?php include "includes/footer.php"?>