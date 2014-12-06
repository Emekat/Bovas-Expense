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
        <div class="row">
            <div class="col-lg-2 col-lg-offset-1">
                <div class="thumbnail">
                    <img src="./img/addtruck.png">
                    <p class="text-center">Add Route</p>
                </div>
            </div>
        </div>
        <div class="row">
            <form role="form" action="add.php" method="POST">
            <div class="col-lg-2 col-lg-offset-1">
                <div class="form-group">
                    <label for="routename">Route Name/Code</label>
                    <input class="form-control" type="text" name="routename" maxlength="20"/>
                </div>
                <div class="form-group">
                    <label for="weight">Weight</label>
                    <input class="form-control" type="number" name="weight" maxlength="20" />
                </div>
                <button class="btn btn-normal" type="submit">Add Route</button>
            </div>
            </form>
       </div>

            <br/>
            <br/>
