<?php //success message
       if (isset($_SESSION['success'])) { 
        
    ?>
        <div class="alert alert-success">
                <?php echo $_SESSION['success']; 
                  unset($_SESSION['success']);
                ?>
        </div>
                    
    <?php } ?>

 
        <?php //error message
            if (isset($errors)){ 
            foreach ($errors as $error) {  ?>
            <div class="alert alert-danger">
        <?php echo $error;  ?>
             </div>
    <?php 
     } } 
    ?>