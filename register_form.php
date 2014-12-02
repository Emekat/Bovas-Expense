<div class="container-fluid">
    <br/>
    <br/><br/>

    <div class="container-fluid">
        <br/>
        <br/><br/>
        <div class="row-fluid">
            <div class="col-md-4">

            </div>
            <div class="col-md-4" style="background-color:#ededed;border-radius: 10px" >
                <div id="header"><h1 style="font-family: sans-serif">Incident Report Portal</h1></div>
                <br/><br/><br/>
                <p id="errormessage" class="text-danger"><?= $_SESSION['errorMsgRegister']?></p>
                <form method="post" action="register.php" role="form" onsubmit="return validateForm();">               
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input id="username" type="text" class="form-control" placeholder="Enter Username" name="uname" required autofocus/>
                    </div>
                    <div class="form-group">
                        <label for="pword1">Password</label>
                        <input id="pword1" type="password" class="form-control" placeholder="Enter Password" name="pword1" required/><br/>
                    </div>
                    <div class="form-group">
                        <label for="pword2">Confirm Password</label>
                        <input id="pword2" type="password" class="form-control" placeholder="Confirm Password" name="pword2" required/>
                    </div>
                    <div class="form-group">
                        <label for="email">Company Email</label>
                        <input id="email" type="email" class="form-control" placeholder="Enter Email Address" name="email" required />
                    </div>
                    <div class="form-group">
                        <label for="fname">First Name</label>
                        <input id="fname" type="text" class="form-control" placeholder="Enter First Name" name="fname" required/>
                    </div>
                    <div class="form-group">
                        <label for="lname">Last Name</label>
                        <input id="lname" type="text" class="form-control" placeholder="Enter Last Name" name="lname" required/>
                    </div>

                    <div class="form-group">
                        <label for="sex">Sex</label>
                        <select class="form-control" id="sex" name="sex">
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="lname">Department</label>
                        <input id="lname" type="text" class="form-control" placeholder="Enter your Department" name="department" required/>
                    </div>

                    <button type="submit" class="btn btn-primary">Register</button>
                    <br/><br/>
                    <!--  <a href="index.php">Homepage</a>-->
                    <a href="index.php">Home</a>
                </form>
                <br/> <br/><br/><br/>

            </div>
            <div class="col-md-4">

            </div>
        </div>

    </div>

</div>

</body>
</html>
<!--
<div class="container-fluid">
    <br/>
    <br/>
    <div class="row-fluid">
        <div class="col-md-4">

        </div>
        <div class="col-md-4" style="background-color:#fdfdfd;border-radius: 10px" >
            <div id="header"><h3 style="font-family: sans-serif">Register</h3></div>
            <p id="errorregister" class="text-error"><?= $_SESSION['errorMsgRegister'] ?></p>
            <form method="post" class="form-horizontal" role="form" action="register.php" onsubmit="return validateForm();">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" type="text" placeholder="Enter Username" name="uname" required autofocus/>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input id="email" type="email" placeholder="Enter Email Address" name="email" required />
                </div>
                <div class="form-group">
                    <label for="fname">First Name</label>
                    <input id="fname" type="text" placeholder="Enter First Name" name="fname" required/>
                </div>
                <div class="form-group">
                    <label for="lname">Last Name</label>
                    <input id="lname" type="text" placeholder="Enter Last Name" name="lname" required/>
                </div>
                <div class="form-group">
                    <label for="pword1">Password</label>
                    <input id="pword1" type="password" placeholder="Enter Password" name="pword1" required/><br/>
                </div>
                <div class="form-group">
                    <label for="pword2">Confirm Password</label>
                    <input id="pword2" type="password" placeholder="Confirm Password" name="pword2" required/>
                </div>
                <div class="form-group">
                    <label for="sex">Sex</label>
                    <select class="option" id="sex" name="sex">
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
                <br/><br/>
                <a href="index.php">Homepage</a>
            </form>
        </div>
        <div class="col-md-4">

        </div>
    </div>
</div>-->