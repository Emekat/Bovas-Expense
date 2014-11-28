<script>
            function showForm(a){
                if(window.XMLHttpRequest){
                    xmlhttp = new XMLHttpRequest();
                }else{
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange=function() {
                    if(xmlhttp.readyState==4 && xmlhttp.status==200){
                        console.log("Successful");
                        console.log(xmlhttp.responseText);
                        console.log(document.getElementById('poster'));
                        document.getElementById("poster").innerHTML = xmlhttp.responseText;
                        document.getElementById("poster").setAttribute('style', 'visibility:visible');
                    }
                }
                xmlhttp.open("GET", "lists.php?list="+a, true);
                xmlhttp.send();
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
                                    <li class="active"><a href="administer.php">Administer</a></li>
                                    <li><a href="report.php">Reports</a></li>
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
            <form role="form" action="incident.php" enctype="multipart/form-data" method="POST">
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
            </form>
            <br/>
