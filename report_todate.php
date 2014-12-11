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
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/bovasexpense">Bovas</a>
                </div>
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
                </div> 
            </div> 
        </nav>
    </div>
    <div class="col-lg-1"></div>
</div>
<form action="report_todate.php" method="GET">
    <div class="row">
        <div class="col-lg-2 col-lg-offset-5">
            <select class="form-control" name="year">
                <option>2013</option>
                <option>2014</option>
                <option>2015</option>
                <option>2016</option>
            </select>
            <br/>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5"></div>
        <div class="col-lg-2 text-center"><a href="report.php"><button class="btn btn-info">View Report</button></a></div>
    </div>
</form>

<?php
if ($getReport) {
    $year = $_GET['year'];
    $startMonth = 1;
    $endMonth = date("m");
    $endYear = date("Y");
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
    while (true) {
        if ($startMonth > 12) {
            $startMonth = $startMonth % 12;
            $year = $year + 1;
        }
        if ($year > $endYear) {
            //We are done
            break;
        }
        $rows = query('SELECT DISTINCT `trip`.`truckid`, `platenumber` FROM `trip`, `truck` WHERE `trip`.`truckid` = `truck`.`truckid` AND MONTH(`date`) = ? AND YEAR(`date`) = ?', $startMonth, $year);
        if ($rows) {
            printf('        <div class="row">');
            printf('            <div class = "col-lg-10 col-lg-offset-1">');
            printf('                <table class = "table table-striped">');
            printf('                    <thead>');
            printf("                        <tr><th>$months[$startMonth]");
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
                $res = query("SELECT SUM(`route`.`profitweight` * `truck`.`capacity`) AS sum FROM `truck`, `route`, `trip` WHERE `trip`.`truckid` = ? AND `truck`.`truckid` = ? AND MONTH(`trip`.`date`) = ? AND YEAR(`trip`.`date`) = ? AND `route`.`routeid` = `trip`.`routeid`", $truckid, $truckid, $startMonth, $year);
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
//            printf('        <div class="row">');
//            printf('            <div class = "col-lg-10 col-lg-offset-1">');
//            printf('                <p class="text-info">No trips found for this month</p>');
//            printf('            </div>');
//            printf('        </div>');
        }
        if ($startMonth === $endMonth) {
            if ($year === $endYear) {
                break;
            }
        }
        $startMonth++;
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

