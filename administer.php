<?php
require("config.php");
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $what = $_POST['what'];
    if($what === 'route'){
        $sql =  "INSERT INTO `project`.`trip` (`tripid`, `truckid`, `routeid`, `waybillno`, `date`) VALUES (NULL, ?, ?, NULL, ?)";
        $result = query($sql, $_POST['truckid'], $_POST['routeid']);
    }elseif($what === 'trip'){
        $sql = "UPDATE `project`.`trip` SET `waybillno` = ? WHERE `trip`.`tripid` = ?"
        $result = query($sql, $_POST['waybillno'], $_POST['tripid']);
    }

}else{
    render("administer_page.php", ["title" => "Administer"]);
}

?>
