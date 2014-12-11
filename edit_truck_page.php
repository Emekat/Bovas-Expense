<script>
    $(function () {
        console.log("Ready document forms capacity");
    });

    function validateForm() {
        var capacity = document.forms[0].capacity.value;
        var truckname = document.forms[0].truckname.value;
        console.log(capacity);
        if (weight > 200000) {
            document.getElementById("message").innerHTML = "Capacity can not be more than 100000";
            document.getElementById("message").focus();
            return false;
        }
        document.forms[0].truckname.value = truckname.toUpperCase();
        return true;
    }




</script>           
<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
        <img src="img/logo.png"/><h1></h1>
        <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/bovasexpense">Bovas</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Home</a></li>
                        <li role="presentation" class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="administer.php" role="button" aria-expanded="false">
                                Administer <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="administer.php">Administer</a></li>
                                <li class="divider"></li>
                                <li role="presentation" class="dropdown-header">Add</li>
                                <li><a href="add.php?opt=truck">Truck</a></li>
                                <li><a href="add.php?opt=route">Route</a></li>
                                <li class="divider"></li>
                                <li role="presentation" class="dropdown-header">Edit</li>
                                <li><a href="edit.php?opt=truck">Truck</a></li>
                                <li><a href="edit.php?opt=route">Route</a></li>
                            </ul>
                        </li>
                        <li role="presentation" class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="report.php" role="button" aria-expanded="false">
                                Reports <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="report.php">Monthly Report</a></li>
                                <li class="divider"></li>
                                <li><a href="report_todate.php">Year till Current Report</a></li>
                            </ul>
                        </li>
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
        <a href="javascript:showForm('truck');" class="thumbnail">
            <img src="./img/addtruck.png">
            <p class="text-center">Edit Truck</p>
        </a>
    </div>
</div>
<form role="form" action="add.php" onsubmit="return validateForm();" method="POST">
    <div class="row">
        <div class="col-lg-2 col-lg-offset-1">
            <div class="form-group">
                <input type="hidden" value="truck" name="type"/>
                <label for="platenumber">Plate Number</label>
                <select class="form-control" name="platenumber">
                    <option value="doo">AKD-744-AT</option>
                </select>
            </div>
            <div class="form-group">
                <label for="driver">Driver</label>
                <input class="form-control" type="text" name="driver" maxlength="40" />
            </div>
            <button class="btn btn-normal" type="submit">Submit</button>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2 col-lg-offset-1">
            <br/>
            <p id="message" class="<?= $messageclass ?>"><?= $message ?></p>
        </div>
    </div>
</form>


<br/>
<br/>
