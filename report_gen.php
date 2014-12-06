<?php
    require("config.php");
    $fromMonth = $_GET['fromMonth'];
    $fromYear= $_GET['fromYear'];
    $toMonth = $_GET['toMonth'];
    $toYear = $_GET['toYear'];

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
    while(true){
        if($fromMonth>12){
            $fromMonth = $fromMonth % 12;
            $fromYear = $fromYear + 1;
        }
        if($fromYear > $toYear){
            //We are done
            break;
        }?>
                        <h4><?= $months[$fromMonth]?></h4>
                        <table class="table table-striped">
                        <thead>
                                <tr>
                                <tr>
                                    <th>Trip</th>
                                    <th>Expenses</th>
                                    <th>Income</th>
                                    <th>Profit/Loss</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
        $rows = query("SELECT distinct `tripid`, `date`, `platenumber`, `routename`, `expense`, `profitweight`, `capacity` FROM `truck`, `route`, `trip` WHERE `trip`.`date` AND YEAR(`date`) = ? AND MONTH(`date`) = ? AND `truck`.`truckid` = `trip`.`truckid` AND `route`.`routeid` = `trip`.`routeid`", $fromYear, $fromMonth);
        foreach($rows as $row){
            printf("<tr>\n");
            //print a table
            printf("<td>%s %s %s %s</td>\n", $row['tripid'], $row['platenumber'],
        $row['routename'], $row['date']);

            printf("<td>". $row['expense']. "</td>\n");
            printf("<td>". $income = $row['capacity'] * $row['profitweight'] . "</td>\n");
            printf("<td>".($income - $row['expense'])."</td>\n");
            printf("</tr>\n");
        }
        printf("</tbody>");
        if($fromMonth === $toMonth){
            if($fromYear === $toYear){
                break;
            }
        }
        $fromMonth++;
    }

?>

