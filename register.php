<?php

require("config.php");
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['uname'];
    $password = crypt($_POST['pword1'], $username);
    $email = $_POST['email'];
    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $sex = $_POST['sex'];
	$department = $_POST['department'];
   
	
    try {
        $result = query("INSERT INTO `users` (`UserName`, `Email`, `FirstName`, `LastName`, `Password`, `Sex`, `Department`) VALUES (?, ?, ?, ?, ?, ?, ?);", $username, $email, $firstName, $lastName, $password, $sex,	$department);
        if ($result === false) {
            $_SESSION['errorMsgRegister'] = "Username/email is already taken";
             render("register_form.php", ["title" => "Register"]);
        } else {
            $rows = query("SELECT `UserId`, `Password` FROM `users` WHERE `UserName` = ?", $username);
            //$rows = query("SELECT * FROM users WHERE username = ?", $_POST["username"]);
            // if we found user, check password
            if (count($rows) == 1) {
                // first (and only) row
                $row = $rows[0];
            }
            //$_SESSION["id"] = $row["UserId"];
            $_SESSION["errorMsgRegister"] = "";
            $_SESSION["errorMsg"] = "";
            $_SESSION["successOrFailure"] = "true";
            render("login_form.php", ["title" => "Log In"]);
          //  redirect("/");   //render("workspace", ["title" => "Your Workspace"]);
        }
    } catch (Exception $ex) {
        $_SESSION['errorMsgRegister'] = "Unable to add the new user" + $ex->getMessage();
        render("register_form.php", ["title" => "Register"]);
    }
} else {
	//redirect("register_form.php");
    $_SESSION["successOrFailure"] = "false";
    render("register_form.php", ["title" => "Register"]);
}
?>