<?php
//require_once("config.php");
//require("header.php");
//$id = $_GET['s'];
//$sql = "SELECT * FROM Incidents WHERE id = ? ";
//    $rows = query($sql, $id);
//$row = $rows[0];
?>
<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
        <img src="img/logo.png"/><h1></h1>
        <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Home</a></li>
                        <li class="active"><a href="incident.php?type=add">New Incident</a></li>
                        <li><a href="review.php">Review Incidents</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="pull-right"><a href="logout.php">Log Out</a></li>
                        <li class="pull-right"><a><?= $_SESSION["firstname"] ?></a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </div>
    <div class="col-lg-1"></div>
</div>
<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
        <br/>
        <hr/>
        <p class="<?php
        if ($_SESSION["addIncidentSuccess"] === "true") {
            echo "text-success";
        } else if ($_SESSION["addIncidentSuccess"] === "false") {
            echo "text-danger";
        } else {
            echo "text-info";
        }
        ?>">
               <?php
               if ($_SESSION["addIncidentSuccess"] === "true") {
                   echo "Incident Successfully Added";
               } else if ($_SESSION["addIncidentSuccess"] === "false") {
                   echo $_SESSION["addIncidentErrorMsg"];
               } else {
                   echo "";
               }
               ?></p>
        <form role="form" action="incident.php" enctype="multipart/form-data" method="POST">
            <button type="submit" class="btn btn-info btn-sm">Save</button>
            <div class="row">

                <div class="col-lg-12"><h3>Submit A New Incident</h3></div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <input type="hidden" name="type" value="add"/>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" maxlength="120" required class="form-control" name="title" id="title" placeholder="Enter title">
                    </div>
                </div>

            </div>
            <div class="row">

                <div class="col-lg-12"><h3>Your Personal Information</h3></div>
            </div>
            <div class="row">

                <div class="col-lg-4">

                    <div class="form-group">
                        <label for="fname">First Name</label>
                        <input type="text" disabled class="form-control" name="fname" id="fname" value="<?= $_SESSION["firstname"] ?>" placeholder="Enter First Name">
                    </div>
                    <div class="form-group">
                        <label for="department">Department</label>
                        <input type="text" disabled class="form-control" name="department" id="department" value="<?= $_SESSION["department"] ?>" placeholder="Enter Department">
                    </div>
                    <div class="form-group">
                        <label for="staffid">Staff Id</label>
                        <input type="number" maxlength="40" class="form-control" name="staffid" id="staffid" placeholder="Enter Staff Id">
                    </div>
                </div>
                <div class="col-lg-4">

                    <div class="form-group">
                        <label for="lname">Last Name</label>
                        <input type="text" disabled class="form-control" name="lname" id="lname" value="<?= $_SESSION["lastname"] ?>" placeholder="Enter Last Name">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="number" maxlength="40" class="form-control" id="phone" name ="phone" id="phone" placeholder="Enter Phone Number">
                    </div>

                </div>
                <div class="col-lg-4">

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" disabled class="form-control" name="email" id="email" value="<?= $_SESSION["email"] ?>" placeholder="Enter Email Address">
                    </div>
                    <div class="form-group">
                        <label for="userid">User ID</label>
                        <p class="form-static-control"></p>
                        <input type="text" class="form-control" disabled name="userid" id="userid" disabled value="<?= $_SESSION["username"] ?>" placeholder="Enter User ID">
                    </div>

                </div>

            </div>
            <div class="row">

                <div class="col-lg-12"><h3>Incident Information</h3></div>
            </div>
            <div class="row">
                <div class="col-lg-4">

                    <div class="form-group">
                        <label for="category">Category</label>
                        <input type="text" maxlength="50" class="form-control" name="category" id="category" placeholder="Enter Category">
                    </div>
                    <div class="form-group">
                        <label for="unitinvolved">Unit Involved</label>
                        <input type="text" maxlength="40" class="form-control" name="unitinvolved" id="unitinvolved" placeholder="Enter Unit Involved">
                    </div>
                    <div class="form-group">
                        <label for="location">Location Of Incident</label>
                        <input type="text" maxlength="100" class="form-control" name="location" id="location" placeholder="Enter Location of Incident">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" rows="5" placeholder="Enter Description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="action">Action Taken</label>
                        <input type="text" class="form-control" name="action" id="action" placeholder="Enter Action Taken">
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="dateofoccurrence">Date and Time of Occurrence</label>
                        <input type="date" name="dateofoccurrence" class="form-control" id="dateofoccurrence" />
                    </div>
                    <div class="form-group">
                        <label for="upfile">Upload Attachment</label>
                        <input type="file" name="upfile" class="form-control" id="upfile">
                    </div>
                </div>
                <div class="col-lg-2">
                </div>
            </div>
            <br/>
            <br/>
            <hr/>
            <button type="submit" class="btn btn-info btn-sm">Save</button>
        </form>
    </div>
    <div class="col-lg-1"></div>
</div>