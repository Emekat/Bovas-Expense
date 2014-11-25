<!DOCTYPE html>
<html lang="en">

    <head>

        <link href="css/bootstrap.css" rel="stylesheet"/>
        <!--link href="css/styles.css" rel="stylesheet"/-->
        <!--link href="css/bootstrap.min.css" rel="stylesheet"-->

        <title> Bovas Company Limited</title>

        <script src="js/jquery-1.8.2.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/scripts.js"></script>
        <script>
            function validateForm() {
                var frm = document.forms[0];
                var nameRegex = /^[A-Za-z ]{3,20}$/;
                var emailRegex = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                var usernameRegex = /^[A-Za-z0-9_]{1,20}$/;
                var passwordRegex = /^[A-Za-z0-9!@#$%^&*()_]{6,20}$/;
                var fname = frm.fname.value;
                var lname = frm.lname.value;
                var email = frm.email.value;
                var username = frm.uname.value;
                var pword1 = frm.pword1.value;
                var pword2 = frm.pword2.value;
                if (!nameRegex.test(fname)) {
                    document.getElementById("errorregister").innerHTML = "Enter a valid First Name .";
                    return false;
                }
                if (!nameRegex.test(lname)) {
                    document.getElementById("errorregister").innerHTML = "Enter a valid Last Name .";
                    return false;
                }
                if (!emailRegex.test(email)) {
                    document.getElementById("errorregister").innerHTML = "Enter a valid email";
                    return false;
                }
                if (!usernameRegex.test(username)) {
                    document.getElementById("errorregister").innerHTML = "Enter a valid username";
                    return false;
                }
                if (!passwordRegex.test(pword1)) {
                    document.getElementById("errorregister").innerHTML = "Enter a valid password";
                    return false;
                }
                if (pword1 === pword2) {

                } else {
                    document.getElementById("errorregister").innerHTML = "The passwords do not match";
                    return false;
                }

            }
        </script>

        <style>
            body{
                background-color: #fdfdfd;
            }
        </style>

    </head>

    <body>
        <div class="container">
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
                                    <li class="active"><a href="administer.php">Administer</a></li>
                                    <li><a href="report.php">Reports</a></li>
                                </ul>

                                <ul class="nav navbar-nav navbar-right">
                                    <li class="pull-right"><a href="logout.php">Log Out</a></li>
                                    <li class="pull-right"><a><?=$_SESSION["username"] ?></a></li>
                                </ul>
                            </div><!-- /.navbar-collapse -->
                        </div><!-- /.container-fluid -->
                    </nav>
                </div>
                <div class="col-lg-1"></div>
            </div>
            <form role="form" action="incident.php" enctype="multipart/form-data" method="POST">
            <div class="row">
                                <div class="col-lg-1"></div>
                <div class="col-lg-5">
                <h3>Select Truck and Route</h3>
                    <div class="form-group">
                        <label for="fname">Truck</label>
                        <select class="form-control" name="month" id="month">
                            <option>AKD-744-AT</option>
                            <option>The choice is yours</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="department">Route</label>
                        <select class="form-control" name="month" id="month">
                            <option>IBD-LAG-IBD</option>
                            <option>The choice is yours</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Assign</button>
                    </div>
                </div>
            </div>
            </form>
            <br/>
            <br/>
            <div class="footer text-center">
                <p>&copy; 2014 Bovas Company Limited</p>
            </div>
            <br/>

        </div>

    </body>

</html>
