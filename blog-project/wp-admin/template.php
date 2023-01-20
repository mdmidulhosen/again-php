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
            echo 'view';
        }
        elseif($do = 'Add'){
            // add new user
            echo 'add';

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