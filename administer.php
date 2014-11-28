<?php
require("config.php");
if ($_SERVER["REQUEST_METHOD"] === "POST") {


}else{
    render("administer_page.php", ["title" => "Administer"]);
}

?>
