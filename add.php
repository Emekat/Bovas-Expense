
<?php
require("config.php");
if($_SERVER["REQUEST_METHOD"] === "POST"){


}else{

    $opt = $_GET['opt'];
    if($opt === "truck"){
        render("add_truck_page.php", ["title" => "Add Truck", "message" => ""]);
    }elseif($opt === 'route'){
        render("add_route_page.php", ["title" => "Add Route", "message" => ""]);
    }
}







?>
