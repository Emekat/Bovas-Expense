<script>
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
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Home</a></li>
                        <li role="presentation" class="dropdown">
                             <a class="dropdown-toggle" data-toggle="dropdown" href="administer.php" role="button" aria-expanded="false">
                                Administer <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="administer.php">Administer</a></li>
                                <li><a href="add.php?opt=truck">Add Truck</a></li>
                                <li><a href="add.php?opt=route">Add Route</a></li>
                            </ul>
                        </li>
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
        <a href="javascript:showForm('truck');" class="thumbnail">
            <img src="./img/addtruck.png">
            <p class="text-center">Add Truck</p>
        </a>
    </div>
</div>
<form role="form" action="add.php" onsubmit="return validateForm();" method="POST">
    <div class="row">

        <div class="col-lg-2 col-lg-offset-1">
            <div class="form-group">
                <input type="hidden" value="truck" name="type"/>
                <label for="platenumber">Plate Number</label>
                <input class="form-control" type="text" name="platenumber" maxlength="20"/>
            </div>
            <div class="form-group">
                <label for="driver">Driver</label>
                <input class="form-control" type="text" name="driver" maxlength="40" />
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-2 col-lg-offset-1">
            <div class="form-group">
                <label for="age">Age</label>
                <input class="form-control" type="number" name="age" maxlength="3" />
            </div>
            <div class="form-group">
                <label for="capacity">Capacity</label>
                <input class="form-control" type="number" name="capacity" maxlength="20" />
            </div>
            <button class="btn btn-normal" type="submit">Add Truck</button>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2 col-lg-offset-1">
            <br/>
            <p id="message" class="<?=$messageclass?>"><?=$message?></p>
        </div>
    </div>
</form>


<br/>
<br/>
