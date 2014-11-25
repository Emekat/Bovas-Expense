<!DOCTYPE html>
<html lang="en">

    <head>

        <link href="css/bootstrap.css" rel="stylesheet"/>
        <!--link href="css/styles.css" rel="stylesheet"/-->
        <!--link href="css/bootstrap.min.css" rel="stylesheet"-->

        <?php if (isset($title)): ?>
            <title>Incident Report Portal: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>Project</title>
        <?php endif ?>

        <script src="js/jquery-1.8.2.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/scripts.js"></script>
        <script>
            function validateForm() {
                var frm = document.forms[0];
                var nameRegex = /^[A-Za-z ]{3,20}$/;
                var emailRegex = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                var usernameRegex = /^[A-Za-z0-9_]{1,20}$/;
                var passwordRegex = /^[A-Za-z0-9!@#$%^&*()_]{6,20}$/;
                var fname = frm.fname.value;
                var lname = frm.lname.value;
                var email = frm.email.value;
                var username = frm.uname.value;
                var pword1 = frm.pword1.value;
                var pword2 = frm.pword2.value;
                if (!nameRegex.test(fname)) {
                    document.getElementById("errorregister").innerHTML = "Enter a valid First Name .";
                    return false;
                }
                if (!nameRegex.test(lname)) {
                    document.getElementById("errorregister").innerHTML = "Enter a valid Last Name .";
                    return false;
                }
                if (!emailRegex.test(email)) {
                    document.getElementById("errorregister").innerHTML = "Enter a valid email";
                    return false;
                }
                if (!usernameRegex.test(username)) {
                    document.getElementById("errorregister").innerHTML = "Enter a valid username";
                    return false;
                }
                if (!passwordRegex.test(pword1)) {
                    document.getElementById("errorregister").innerHTML = "Enter a valid password";
                    return false;
                }
                if (pword1 === pword2) {

                } else {
                    document.getElementById("errorregister").innerHTML = "The passwords do not match";
                    return false;
                }

            }
        </script>

        <style>
            
            /*div.container{ background-color: #efefef;}*/ 
            .navbar-default .navbar-nav > li > a {
                color: #900;
            }
            element.style {
            }
            .navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:hover, .navbar-default .navbar-nav > .active > a:focus {
                color: #fff;
                background-color: #900;
            </style>

        </head>

        <body>
            <div class="container">




