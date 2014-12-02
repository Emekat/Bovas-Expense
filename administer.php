<?php
require("config.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $what = $_POST['what'];
    if($what === 'route'){
        $rows = query("SELECT `tripid`, `waybillno` FROM `trip` WHERE `truckid` = ? AND `waybillno` IS NULL", $_POST['truckid']);
        if($rows && ($rows[0]['waybillno'] == "")){
            $sql = "UPDATE `trip` SET `routeid` = ?, `date`= CURDATE() WHERE `tripid` = ?";
            $result = query($sql, $_POST['routeid'], $rows[0]['tripid']);
            render("administer_page.php", ["title" => "Administer", "message"=> "Route Successfully Assigned", "isDone" => "yes"]);
        }else{
            print_r($rows);
            $sql =  "INSERT INTO `project`.`trip` (`tripid`, `truckid`, `routeid`, `waybillno`, `date`) VALUES (NULL, ?, ?, NULL, CURDATE())";
            $result = query($sql, $_POST['truckid'], $_POST['routeid']);
            render("administer_page.php", ["title" => "Administer", "message" => "Route Successfully Assigned", "isDone" => "yes"]);
        }
    }elseif($what === 'trip'){
        $sql = "UPDATE `project`.`trip` SET `waybillno` = ? WHERE `trip`.`tripid` = ?";
        $waybillno = $_POST['waybillno']; $tripid = $_POST['tripid'];
        $result = query($sql, $_POST['waybillno'], $_POST['tripid']);
        render("administer_page.php", ["title" => "Administer", "message" => "Trip Successfully Completed", "isDone" => "yes"]);
    }

}else{
    render("administer_page.php", ["title" => "Administer", "isDone" => "no", "message"=> ""]);
}
