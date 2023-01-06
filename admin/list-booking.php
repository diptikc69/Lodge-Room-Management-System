<?php 
$title = "Booking List";
include 'include/head.php';

$sql = "SELECT * FROM booking JOIN ldg_customer ON booking.custId = ldg_customer.id JOIN rooms ON booking.roomId = rooms.roomId";
$results = mysqli_query($conn, $sql);

?>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

        <?php include 'include/navbar.php';?>
            <!-- /.navbar-top-links -->
            <?php include 'include/sidebar.php';?>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Booking List</h2>
                    <a href="add-booking.php" class="btn btn-primary"><i class="fa fa-plus"></i> Add Booking</a>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row" style="margin-top:20px;">
                <div class="col-sm-12">
                <?php include 'include/message.php';?>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <td><b>id</b></td>
                                <td><b>Booking Start Date</b></td>
                                <td><b>Booking End Date</b></td>
                                <td><b>Booking Comment</b></td>
                                <td><b>Customer</b></td>
                                <td><b>Room</b></td>
                                <td><b>Action</b></td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        if (mysqli_num_rows($results) > 0) { 
                        while($row = mysqli_fetch_array($results)){
                        ?>
                        <tr>
                            <td>
                                <?php echo $row['bid']; ?>
                            </td>
                            <td>
                                <?php echo $row['bookStartDate']; ?>
                            </td>
                            <td>
                                <?php echo $row['bookEndDate']; ?>
                            </td>
                            <td>
                                <?php echo $row['bookingComments']; ?>
                            </td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['roomName']; ?></td>
                            <td>
                            <a href="edit-booking.php?id=<?php echo $row['id']; ?>" class="btn btn-xs btn-primary "><i class="fa fa-edit"></i></a>
                            <a href="delete-booking.php?id=<?php echo $row['bid']; ?>" class="btn btn-xs btn-danger "><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php 
                        }                    
                    }else{
                        echo "<tr><td>No Records found.</td></tr>";
                    }
                    mysqli_close($conn);
                    ?>
                    </tbody>
                    </table>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include 'include/footer.php';?>

</body>

</html>
