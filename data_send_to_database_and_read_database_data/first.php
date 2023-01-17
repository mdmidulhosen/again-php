<?php

// hostname, username, password, databasename
$database = mysqli_connect("localhost", "root", "", "first_step_php");

if ($database) {
  // echo "database is connected";
}else{
    echo "database connection error";
}

ob_start();

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <title>Hello, world!</title>
  </head>
  <body>

   
  <?php 
  
//   $number_1 = 200;
//   $number_2 = 300;

//   if($number_1 != $number_2){
//     echo "equal";
//   }
//   else{
//     echo "not equal";
//   }


    // $save_username = "admin";
    // $save_password = "123456";

    // $user_username = "admin";
    // $user_password = "12345";

    // if($save_username == $user_username && $save_password == $user_password){
    //   echo "logged in</br>";
    // }else{
    //   echo "your username or password wrong</br>";
    // }

    // if(empty($user_username)){
    //   echo "it's empty</br>";
    // }else{
    //   echo "it's not empty</br>";
    // }
  
  ?>


<div class="class container" style="padding-top:100px; ">
  <div class="class row">
    
  <div class="class col-md-6">

      <div id="">
      <h1>Add a new category</h1>

        <form method="POST" name="add_new_form">
          <div class="form-group my-3">
            <input type="text" required="required" name="cate_name" placeholder="Name" class="form-control">
          </div>
          <div class="form-group my-3">
            <textarea rows="3" required="required" name="cate_description" placeholder="Description" class="form-control"></textarea>
          </div>
          <div class="form-group my-3">
            <input type="submit" name="add_cate" value="Add Category" class="btn btn-md btn-md btn-success">
          </div>
        </form> 
      </div>

     

      <?php
      if(isset($_GET['edit_ID'])){
        $edit_id = $_GET['edit_ID'];

        // read all information
        
        $edit_query   = "SELECT * FROM category WHERE category_id='$edit_id'";
        $edit_result  = mysqli_query($database, $edit_query);

        while($edit_row     = mysqli_fetch_assoc($edit_result)){
          $edit_category_id           = $edit_row['category_id'];
          $edit_category_name         = $edit_row['category_name'];
          $edit_category_description  = $edit_row['category_description'];
        }

        ?>
        <h1 class="mt-3">Edit/Update category</h1>

        <form method="POST">
        <div class="form-group my-3">
          <input type="text" required="required" value="<?php echo $edit_category_name;?>" name="cate_updated_name" placeholder="Name" class="form-control">
        </div>
        <div class="form-group my-3">
          <textarea rows="3" required="required" name="cate_updated_description" placeholder="Description" class="form-control"><?php echo $edit_category_description;?></textarea>
        </div>
        <div class="form-group my-3">
          <input type="submit" name="update_cate" value="Update Category" class="btn btn-md btn-md btn-success">
        </div>
      </form> 

      <?php
      
        if(isset($_POST['update_cate'])){
          $cate_updated_name        = $_POST['cate_updated_name'];
          $cate_updated_description = $_POST['cate_updated_description'];

          $update_query = "UPDATE category SET category_name='$cate_updated_name', category_description='$cate_updated_description' WHERE category_id='$edit_id'";
          $updated_result = mysqli_query($database, $update_query);

          if($updated_result){
            header('Location: first.php');
          }else{
            echo "Update Error";
          }

        }
      
      ?>

        <?php

      }
      ?>

  </div>

    <div class="class col-md-6">
      <table class="table table-dark table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>

        <?php
          // read query language in 3 steps
          // 1 write mysql query language
          // 2 query > database
          // 3 feadback

          $table_query  = "SELECT * FROM category";
          $table_result = mysqli_query($database, $table_query);

          $serial = 0;

          while ($table_row    = mysqli_fetch_assoc($table_result)) {
            $category_id = $table_row['category_id'];
            $category_name = $table_row['category_name'];
            $category_description = $table_row['category_description'];
            $serial++;

            ?>
            
            <tr>
            <th ><?php echo $serial;?></th>
            <th ><?php echo $category_name;?></th>
            <th ><?php echo $category_description;?></th>
            <th >
              <a href="first.php?edit_ID=<?php echo $category_id;?>"><i class="fa-solid fa-pen-to-square btn btn-success btn-sm"></i></a>
             <a data-bs-toggle="modal" data-bs-target="#modal_delete_ID<?php echo $category_id?>"><i class="fa-solid fa-trash btn btn-danger btn-sm"></i></a>
            
             <!-- Modal -->
              <div class="modal fade" id="modal_delete_ID<?php echo $category_id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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


            </th>
          </tr>
            
            <?php

          }
          ?>

        
        </tbody>
      </table>

      <!-- add operation start from here -->

      <?php 
      
      if(isset($_POST['add_cate'])){
        $cate_name        =$_POST['cate_name'];
        $cate_description = $_POST['cate_description'];

        // send data in just 3 steps
        // write query
        // query send to database
        // feadback

       $data_send_query   = "INSERT INTO category(category_name, category_description) VALUES('$cate_name', '$cate_description')";
       $data_send_query_2   = "INSERT INTO category_2(category_2_name, category_2_description) VALUES('$cate_name', '$cate_description')";
       $send_data_result  = mysqli_query($database, $data_send_query);
       $send_data_result  = mysqli_query($database, $data_send_query_2);
       if($send_data_result && $data_send_query_2){
        header('Location: first.php');
       }else{
        echo "insert error";
       }


      }
      
      ?>

      <!-- add operation end from here -->

      
             <!-- delete operation code start from here -->
             <?php 
             
              if(isset($_GET['delete_ID'])){
                $delete_id = $_GET['delete_ID'];

                // delete data from database in 3 steps
                
               $delete_query  = "DELETE FROM category WHERE category_id = '$delete_id'";
               $delete_result = mysqli_query($database, $delete_query);

               if($delete_result){
                header('Location: first.php');
               }else{
                echo "Delete error";
               }

              }


             ?>

             <!-- delete operation code end from here -->


    </div>

  </div>
</div>

<?php ob_end_flush();?>

 <!-- Option 1: Bootstrap Bundle with Popper -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 
  </body>
</html>