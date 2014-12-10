
<?php

require("config.php");
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($_POST['type'] === "route") {
        $weight = $_POST['weight'];
        $routename = $_POST['routename'];
        $result = query("INSERT INTO `project`.`route` (`routeid`, `routename`, `profitweight`) VALUES (NULL, UPPER(?), ?)", $routename, $weight);
        if ($result === false) {
            render("add_route_page.php", ["title" => "Add Route", "message" => "Error inserting into table: Route already exists", "messageclass" => "bg-danger"]);
        } else {
            render("add_route_page.php", ["title" => "Add Route", "message" => "Successfully added new route " . $routename, "messageclass" => "bg-success"]);
        }
    } else {
        $platenumber = $_POST['platenumber'];
        $driver = $_POST['driver'];
        $age = $_POST['age'];
        $capacity = $_POST['capacity'];
        $result = query("INSERT INTO `project`.`truck` (`truckid`, `platenumber`, `driver`, `age`, `capacity`) VALUES (NULL, UPPER(?), ?, ?, ?)",
                $platenumber, $driver, $age, $capacity);
        if ($result === false) {
            render("add_truck_page.php", ["title" => "Add Route", "message" => "Error inserting into table: Truck already exists", "messageclass" => "bg-danger"]);
        } else {
            render("add_truck_page.php", ["title" => "Add Route", "message" => "Successfully added new route " . $platenumber, "messageclass" => "bg-success"]);
        }
    }
} else {
    $opt = $_GET['opt'];
    if ($opt === "truck") {
        render("add_truck_page.php", ["title" => "Add Truck", "message" => ""]);
    } elseif ($opt === 'route') {
        render("add_route_page.php", ["title" => "Add Route", "message" => ""]);
    }
}
