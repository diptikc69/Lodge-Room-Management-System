<?php 
$title = "Room List";
include 'include/head.php';

$sql = "SELECT * FROM rooms";
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
                    <h2 class="page-header"> Room List </h2>
                    <?php include 'include/message.php';?>
                    <!--/.single room color-->
                    <a href="add-rooms.php" class="btn btn-success" style="background:orange !important"><i class="fa fa-plus"></i> Add Room</a>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row" style="margin-top:20px;">
                <div class="col-sm-12">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <td><b>id</b></td>
                                <td><b>Room Name</b></td>
                                <td><b>Room Number</b></td>
                                <td><b>Total Capacity</b></td>
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
                                <td><?php echo $row['roomId'];?></td>
                                <td><?php echo $row['roomName'];?>
                                </td>
                                <td><?php echo $row['roomNumber'];?>
                                </td>
                                <td><?php echo $row['totalCapacity'];?>
                                </td>
                                <td>
                                <a href="view-rooms.php?id=<?php echo $row['roomId']; ?>" class="btn btn-xs btn-primary "><i class="fa fa-eye"></i></a>
                                <a href="edit-rooms.php?id=<?php echo $row['roomId']; ?>" class="btn btn-xs btn-success "><i class="fa fa-edit"></i></a>
                                <a href="delete-rooms.php?id=<?php echo $row['roomId']; ?>" class="btn btn-xs btn-danger "><i class="fa fa-trash-o"></i></a>
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
