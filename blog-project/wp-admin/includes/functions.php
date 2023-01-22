<?php
include "connection.php";

// delete function for data
function delete($tableName,$primaryKey,$delete_id,$redirectLocation){
    global $database;
    $delete_query = "DELETE FROM $tableName WHERE $primaryKey = $delete_id";
        $delete_result = mysqli_query($database, $delete_query);
        if($delete_result){
        header('Location: '.$redirectLocation);
        }else{
        die('Category delete error'.mysqli_error($database));
        }
}



// delete function for files
function deleteFiles(){
    global $database;

    $image_delete_query  = "SELECT user_image FROM users WHERE user_id = $user_delete_ID";
    $image_delete_result = mysqli_query($database, $image_delete_query);
    while($image_delete_row = mysqli_fetch_assoc($image_delete_result)){
      $user_Image_id = $image_delete_row['user_image'];
    }
    unlink('images/users_images/'.$user_Image_id);

}

?>