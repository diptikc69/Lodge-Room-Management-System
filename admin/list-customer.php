<?php 
$title = "Customer List";
include 'include/head.php';

$sql = "SELECT * FROM ldg_customer";
$results = mysqli_query($conn, $sql);

?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <?php include 'include/navbar.php';?>
            <?php include 'include/sidebar.php';?>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header"> Customer List </h2>
                    <?php include 'include/message.php';?>
                    <a href="add-customer.php" class="btn btn-primary"><i class="fa fa-plus"></i> Add Customer</a>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row" style="margin-top:20px;">
                <div class="col-sm-12">

                <?php 
                if (isset($_SESSION['success'])) { ?>
                    <div class="alert alert-success">
                        <?php 
                        echo $_SESSION['success']; 
                        unset($_SESSION['success'])
                         ?>
                    </div>
                    
                <?php } ?>

                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <td><b>id</b></td>
                                <td><b>Name</b></td>
                                <td><b>Address</b></td>
                                <td><b>Email</b></td>
                                <td><b>Action</b></td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(mysqli_num_rows($results) > 0){
                            while ($row = mysqli_fetch_array
                            ($results)){ 
                        ?>
                            <tr>
                                <td><?php echo $row['id'];?></td>
                                <td><?php echo $row['name'];?>
                                </td>
                                <td><?php echo $row['address'];?>
                                </td>
                                <td><?php echo $row['email'];?>
                                </td>
                                <td>
                                <a href="edit-customer.php?id=<?php echo $row['id']; ?>" class="btn btn-xs btn-primary "><i class="fa fa-edit"></i></a>
                                <a href="delete-customer.php?id=<?php echo $row['id']; ?>" class="btn btn-xs btn-danger "><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                            <?php } } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- /#wrapper -->
    <?php include 'include/footer.php';?>
</body>

</html>
