<?php
require("config.php");
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $what = $_POST['what'];
    if($what === 'route'){
        $rows = query("SELECT `tripid`, `waybillno` FROM `trip` WHERE `truckid` = ? AND `waybillno` IS NULL", $_POST['truckid']);
        if($rows && ($rows[0]['waybillno'] == "")){
            echo $_POST['routeid'];
            echo $rows[0]['tripid'];
            $sql = "UPDATE `trip` SET `routeid` = ?, `date`= CURDATE() WHERE `tripid` = ?";
            $result = query($sql, $_POST['routeid'], $rows[0]['tripid']);
            echo "Updated successfully";
            return;
        }
        print_r($rows);
        $sql =  "INSERT INTO `project`.`trip` (`tripid`, `truckid`, `routeid`, `waybillno`, `date`) VALUES (NULL, ?, ?, NULL, CURDATE())";
        $result = query($sql, $_POST['truckid'], $_POST['routeid']);
        print_r($result);
        echo "I came looking for a pimp named slickback " . $result;
    }elseif($what === 'trip'){
        $sql = "UPDATE `project`.`trip` SET `waybillno` = ? WHERE `trip`.`tripid` = ?";
        $result = query($sql, $_POST['waybillno'], $_POST['tripid']);
        echo "What did you say bitch niggah " . $result;
        print_r($result);
    }

}else{
    render("administer_page.php", ["title" => "Administer"]);
}

?>
