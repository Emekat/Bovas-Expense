            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    <img src="img/logo.png"/><h1></h1>
                    <nav class="navbar navbar-default" role="navigation">
                        <div class="container-fluid">
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav">
                                    <li class="active"><a href="index.php">Home</a></li>
                                    <li><a href="administer.php">Administer</a></li>
                                    <li><a href="report.php">Reports</a></li>
                                </ul>

                                <ul class="nav navbar-nav navbar-right">
                                    <li class="pull-right"><a href="logout.php">Log Out</a></li>
                                    <li class="pull-right"><a><?= $_SESSION["username"] ?></a></li>
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
                    <div class="col-lg-2">
                    </div>
                    <div class="col-lg-2">
                    </div>
                    <div class="col-lg-1"></div>
                </div>
            </form>
        <div class="row">
            <div class="col-lg-2 col-lg-offset-1">
                <a href="add.php?opt=truck" class="thumbnail">
                    <img src="./img/addtruck.png">
                    <p class="text-center">Add Truck</p>
                </a>
                <a href="add.php?opt=route" class="thumbnail">
                    <img src="./img/addroute.png">
                  <p class="text-center">Add Route</p>
                </a>
            </div>
        </div>

            <br/>
            <br/>
