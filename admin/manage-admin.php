<?php include 'partials/menu.php'; ?>

<!-- main content section start. -->
<div class="main-content">

    <div class="wrapper">
        <h1>Manage Admin</h1>

        <br>

        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];  //Displaying Session message 
            unset($_SESSION['add']); //Removing Session message
        }
        ?>
        <br><br>

        <!-- Button to add admin -->
        <a href="add-admin.php" class="btn-primary">Add Admin</a>

        <br> <br> <br>

        <table class="tbl-full">

            <tr>
                <th>S.N</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>

            <?php

            //Querey to get all Admin
            $sql = "SELECT * FROM tbl_admin";
            //to execut e the querey
            $res = mysqli_query($conn, $sql);

            //Check whether the querey is Executed or not
            if ($res == TRUE) {
                //Count Rows to check whether we have data in database or not
                $count = mysqli_num_rows($res); //Function to get all the rows in database

                $sn = 1; //create a variable and assign the value

                //check the number of rows
                if ($count > 0) {
                    //we have data in database
                    while ($rows = mysqli_fetch_assoc($res)) {
                        //using while loop to get all  the data in database
                        //and while loop will run as long as we have data in database

                        //Get individual Data
                        $id = $rows['id'];
                        $full_name = $rows['full_name'];
                        $username = $rows['username'];

                        //Display the values in our table
            ?>

                        <tr>
                            <td><?php echo $sn++; ?></td>
                            <td><?php echo $full_name; ?></td>
                            <td><?php echo $username; ?></td>
                            <td>
                                <a href="#" class="btn-secondary">Update Admin</a>
                                <a href="#" class="btn-danger">Delete Admin</a>
                            </td>
                        </tr>

            <?php
                    }
                } else {
                    //we do not have data in database
                }
            }

            ?>


        </table>

    </div>

</div>
<!-- main content section ends. -->

<?php include 'partials/footer.php'; ?>