<?php
require_once("config.php");
require("header.php");
if ($_GET) {
    $getReport = true;
} else {
    $getReport = false;
}
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
                        <li class="active"><a href="report.php">Reports</a></li>
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
<form action="report.php" method="GET">
    <div class="row">
        <div class="col-lg-1"></div>

        <div class="col-lg-2">

        </div>
        <div class="col-lg-2">

        </div>
        <div class="col-lg-2">
            <p class="text-center">
                <select class="form-control" name="month" id="month" onchange="" size="1">
                    <option value="01">January</option>
                    <option value="02">February</option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
        </div>

        <div class="col-lg-2">

        </div>
        <div class="col-lg-2">

        </div>

    </div>
    <div class="row">
        <div class="col-lg-5"></div>
        <div class="col-lg-2 text-center"><a href="report.php"><button class="btn btn-info">View Report</button></a></div>
    </div>
</form>

<?php
if ($getReport) {
    $month = $_GET['month'];

    $months[1] = "January";
    $months[2] = "February";
    $months[3] = "March";
    $months[4] = "April";
    $months[5] = "May";
    $months[6] = "June";
    $months[7] = "July";
    $months[8] = "August";
    $months[9] = "September";
    $months[10] = "October";
    $months[11] = "November";
    $months[12] = "December";

    $rows = query('SELECT DISTINCT `trip`.`truckid`, `platenumber` FROM `trip`, `truck` WHERE `trip`.`truckid` = `truck`.`truckid` AND MONTH(`date`) = ?', $month);
    if ($rows) {
        printf('        <div class="row">');
        printf('            <div class = "col-lg-10 col-lg-offset-1">');
        printf('                <table class = "table table-striped">');
        printf('                    <thead>');
        printf("                        <tr><th>$months[$month]");
        printf('                        </th></tr>');
        printf('                        <tr>');
        printf('                            <th>Truck</th>');
        printf('                            <th>Expenses</th>');
        printf('                            <th>Income</th>');
        printf('                            <th>Profit/Loss</th>');
        printf('                        </tr>');
        printf('                     </thead>');
        printf('                    <tbody>');
        foreach ($rows as $row) {
            printf("            <tr>\n");
            $truckid = $row['truckid'];
            printf("                <td>%s</td>\n", $row['platenumber']);
            $expense = 0;
            $res = query("SELECT SUM(`route`.`profitweight` * `truck`.`capacity`) AS sum FROM `truck`, `route`, `trip` WHERE `trip`.`truckid` = ? AND `truck`.`truckid` = ? AND MONTH(`trip`.`date`) = ? AND `route`.`routeid` = `trip`.`routeid`", $truckid, $truckid, $month);
            $income = $res[0]['sum'];
            $res = query("SELECT SUM(`expense`) AS sum FROM `trip` WHERE `trip`.`truckid` = ?", $truckid);
            $expense = $res[0]['sum'];
            $profitLoss = $income - $expense;
            printf("                <td>" . $expense . "</td>\n");
            printf("                <td>" . $income . "</td>\n");
            printf("                <td>" . $profitLoss . "</td>\n");
            printf("            </tr>\n");
        }
        printf('            </tbody>');
        printf('            </table>');
        printf('            </div>');
        printf('        </div>');
    } else {
        printf('        <div class="row">');
        printf('            <div class = "col-lg-10 col-lg-offset-1">');
        printf('                <p class="text-info">No trips found for this month</p>');
        printf('            </div>');
        printf('        </div>');
    }
}
?>
<br/>
<br/>


<br/>
</div>
<div class="footer text-center">
    <p>&copy; 2014 Bovas Company Limited</p>
</div>
<br/>

</div>

</body>

</html>

