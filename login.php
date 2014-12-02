<?php

    // configuration
    require("config.php");

    // if form was submitted
    $_SESSION["errorMsgRegister"] = "";
    if ($_SERVER['REQUEST_METHOD'] === "POST")
    {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $_SESSION["errorMsg"] = " ";
        $_SESSION["errorMsgRegister"] = "";
        // validate submission
        if (empty($username))
        {
            $_SESSION['errorMsg'] = "You must provide your username.";
            return;
        }
        else if (empty($password))
        {
            $_SESSION['errorMsg'] = "You must provide your password.";
            return;
        }

        // query database for user
        $rows = query("SELECT `UserId`,`IsAdmin`, `FirstName`, `LastName`, `UserName`, `Email`, `Department`, `Password` FROM `users` WHERE `UserName` = ?", $username);
        //$rows = query("SELECT * FROM users WHERE username = ?", $_POST["username"]);

        // if we found user, check password
        if (count($rows) == 1)
        {
            // first (and only) row
            $row = $rows[0];

            // compare hash of user's input against hash that's in database
            if (crypt($password, $username) == $row["Password"])
            {
                // remember that user's now logged in by storing user's ID in session
                $_SESSION["id"] = $row["UserId"];

                // store some of the user's info
                $_SESSION["username"] = $row["UserName"];
                $_SESSION["firstname"] = $row["FirstName"];
                $_SESSION["lastname"] =  $row["LastName"];
                $_SESSION["email"] = $row["Email"];
                $_SESSION["department"] = $row["Department"];
                $_SESSION["isAdmin"] = $row["IsAdmin"];

                // redirect to home
                redirect("/bovasexpense");
            }
        }

        // else display error message
        $_SESSION['errorMsg'] = "Invalid username and/or password.";
        render("login_form.php", ["title" => "Log In"]);
    }
    else
    {
        // else render form
        $_SESSION["errorMsg"] = " ";
        $_SESSION["successOrFailure"] = "";
        render("login_form.php", ["title" => "Log In"]);
    }

?>
