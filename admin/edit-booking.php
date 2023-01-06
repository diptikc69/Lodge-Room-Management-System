<?php 
$title = "Add Booking";
include 'include/head.php';
$editId = $_GET['id'];
//echo $editId;
$sql = "SELECT * FROM booking WHERE bid = $editId";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)){
    $StartDate = $row['bookStartDate'];
    $EndDate = $row['bookEndDate'];
    $Bookingcomment = $row['bookingComments'];
    $customerId = $row['custId'];
    $roomId = $row['roomId'];
}
// Get the room from database
$catSql = "SELECT * FROM rooms";
$catResults = mysqli_query($conn, $catSql);

// Get the booking from database
$customerSql = "SELECT * FROM ldg_customer";
$customerResults = mysqli_query($conn, $customerSql);

if (isset($_POST['save'])) {
    $StartDate = $_POST['bookStartDate'];
    $EndDate = $_POST['bookEndDate'];
    $Bookingcomment = $_POST['bookingComments'];
    $roomId = $_POST['roomId'];
    $customerId = $_POST['custId'];

    $sql = "INSERT INTO booking (custId, roomId, bookStartDate, bookEndDate, bookingComments) VALUE('$customerId', '$roomId','$StartDate', '$EndDate', '$Bookingcomment')";

    if (mysqli_query($conn, $sql)) {
        $success = "Booking Created Successfully !";
    } else {
        echo mysqli_error($conn);
    }
    mysqli_close($conn);
}

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
                    <h2 class="page-header">Edit Booking</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            <div class="col-sm-12">
                <?php 
                    if (!empty($success)) { ?>
                        <div class="alert alert-success">
                            <?php echo $success;  ?>
                        </div>
                <?php } ?>
            </div>
            <form action="add-booking.php?id=<?php echo $editId;?>" method="post">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label><b>Booking Start Date</b></label>
                        <input type="date" value="<?php echo $StartDate; ?>"  class="form-control" name="bookStartDate" placeholder="2022/09/11">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label><b>Booking End Date</b></label>
                        <input type="date" value="<?php echo $EndDate; ?>"  class="form-control" name="bookEndDate" placeholder="2022/02/12">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label><b>Booking Comment</b></label>
                        <textarea name="bookingComments" class="form-control" id="" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label><b>Room</b></label>
                        <select name="roomId"  class="form-control">
                            <option>Select Room</option>
                            <?php 
                    if (mysqli_num_rows($catResults) > 0) { 
                        while($row = mysqli_fetch_array($catResults)){
                        ?>
                        <option
                        <?php if ($row['roomId'] == $roomId) {
                            echo "selected";
                        } ?>
                         value="<?php echo $row['roomId']; ?>"><?php echo $row['roomName']; ?></option>
                        <?php }} ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label><b>Customer</b></label>
                        <select name="customerId"  class="form-control">
                            <option>Select customer</option>
                            <?php 
                    if (mysqli_num_rows($customerResults) > 0) { 
                        while($row = mysqli_fetch_array($customerResults)){
                        ?>
                        <option
                        <?php if ($row['id'] == $customerId) {
                            echo "selected";
                        } ?>
                         value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                        <?php }} ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12">
                    <button type="submit" name="save" class="btn btn-success">
                        Save
                    </button>
                    <a href="list-booking.php" class="btn btn-primary">All Post</a>
                </div>
            </form>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include 'include/footer.php';?>

</body>

</html>
