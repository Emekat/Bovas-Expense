<script>
    function showForm(a) {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                console.log("Successful");
                console.log(xmlhttp.responseText);
                console.log(document.getElementById('poster'));
                //Empty the messages
                document.getElementById("message").innerHTML = "";
                document.getElementById("poster").innerHTML = xmlhttp.responseText;
                document.getElementById("poster").setAttribute('style', 'visibility:visible');
            }
        }
        xmlhttp.open("GET", "lists.php?list=" + a, true);
        xmlhttp.send();
    }

    function initFormValues(a) {
        if (a == 'truck') {
            var e = document.getElementById("truck");
            var value = e.options[e.selectedIndex].value;
            document.getElementById('truckid').setAttribute('value', value);
            e = document.getElementById("route");
            value = e.options[e.selectedIndex].value;
            document.getElementById('routeid').setAttribute('value', value);
        } else {
            var e = document.getElementById("trip");
            var value = e.options[e.selectedIndex].value;
            document.getElementById('tripid').setAttribute('value', value);
        }
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
                        <li><a href="index.php">Home</a></li>
                        <li role="presentation" class="dropdown active">
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
                    <ul class="nav navbar-nav dropdown-menu" role="menu">
                        <li class="dropdown" role="presentation"><a>Add Truck</a></li>
                        <li><a>Add Route</a></li>
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
<form role="form" action="administer.php" enctype="multipart/form-data" method="POST">
    <div class="row">
        <div class="col-lg-2 col-lg-offset-1">
            <a href="javascript:showForm('truck');" class="thumbnail">
                <img src="./img/truckroute.png">
                <p class="text-center">Assign Route</p>
            </a>
            <a href="javascript:showForm('complete')" class="thumbnail">
                <img src="./img/routecomplete.png">
                <p class="text-center">Mark trip as Complete</p>
            </a>
        </div>
    </div>
    <div class="row" style="visibility:hidden" id="poster">
        <div class="col-lg-5 col-lg-offset-1">
        </div>

    </div>
    <div class="row">
        <div class="col-lg-5 col-lg-offset-1">
            <p id="message" <?php if ($isDone === "yes")
    echo 'class="text-success"';
else
    echo 'class="text-danger"';
?>>
<?= $message ?>
            </p>
        </div>

    </div>
</form>
<br/>
