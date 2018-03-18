<!DOCTYPE html>
<html lang="en" >

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
    <title>soChat</title>
    <link rel="shortcut icon" href="chat_icon.png"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.min.css'>
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300'>
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,700,300'>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="validation.js"></script>

    <link rel="stylesheet" href="css/style.css">


</head>

<body>

<div class="signup__container">
    <div class="container__child signup__thumbnail">
        <div class="thumbnail__logo">
            <img class="logo__shape" width="130px" src="logo.png"/>
        </div>
        <div class="thumbnail__content text-center">
            <h1 class="heading--primary">The world is waiting for you!</h1>
            <h2 class="heading--secondary">#MakeConnections</h2>
        </div>
        <div class="signup__overlay"></div>
    </div>
    <div id="signup" class="container__child signup__form" style="display: block;">
        <form method="POST" action="http://localhost/soChat/includes/signup.inc.php" onChange="validate()">
            <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control" type="text" name="username" id="username" placeholder="Username" required />
            </div>
            <div class="form-group">
                <label for="firstName">First Name</label>
                <input class="form-control" type="text" name="firstName" id="firstName" placeholder="First Name" required />
            </div>
            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input class="form-control" type="text" name="lastName" id="lastName" placeholder="Last Name" required />
            </div>
            <div class="form-group" style="display: inline-block">
                <label for="password" >Password</label>
                <input class="form-control" type="password" name="password" id="password" placeholder="********" required />
            </div>
            <div class="form-group" style="display: inline-block">
                <label for="passwordRepeat">Repeat Password</label>
                <input class="form-control" type="password" name="passwordRepeat" id="passwordRepeat" placeholder="********" required onChange="validatePassword()"/>
            </div>
            <div class="form-group" style="display: inline-block">
                <label for="age">Age</label>
                <input class="form-control" type="number" name="age" id="age"  required onChange="validateAge()"/>
            </div>
            <div>
                <div class="form-group" style="display: inline-block">
                    <label for="email">Email</label>
                    <input class="form-control" type="text" name="mail" id="mail"  required />
                </div>
                <div class="form-group" style="display: inline-block">
                    <label for="emailRepeat">Repeat Email</label>
                    <input class="form-control" type="text" name="emailRepeat" id="emailRepeat"  required onChange="validateEmail()"/>
                </div>
                <div class="form-group" style="display: inline-block">
                    <label for="gender">Gender</label>
                    <select class="form-control" name="gender" id="gender">
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="Phone">Phone Number</label>
                <input class="form-control" type="text" name="phone" id="phone" onChange="validatePhone()"/>
            </div>
            <div class="form-group" style="display: inline-block">
                <label for="Country">Country</label>
                <select class="form-control" name="country" id="country" style="width:100%">

                    <?php
                    include_once "includes/dbh.inc.php";
                    $query = "SELECT name FROM lkp_country";
                    $result = mysqli_query($connection, $query);
                    $num = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        printf("<option value='%d'>%s</option>", $num, $row["name"]);
                        $num = $num + 1;
                    }
                    ?>

                </select>
            </div>

            <div class="m-t-lg">
                <ul class="list-inline">
                    <li>
                        <input class="btn btn--form" type="submit" name="submit" value="submit" id="submit" disabled/>
                    </li>
                    <li>
                        <a class="signup__link" onclick="login()" style="cursor: pointer;">I am already a member</a>
                    </li>
                </ul>
            </div>
        </form>
    </div>


    <div id="login" class="container__child login__form" style="display: none;">
        <form method="POST" action="http://localhost/sochat/includes/login.inc.php">
            <div class="form-group">
                <label for="username1">Username</label>
                <input class="form-control" type="text" name="username1" id="username1" placeholder="Username" required />
            </div>
            <div class="form-group">
                <label for="password1" >Password</label>
                <input class="form-control" type="password" name="password1" id="password1" placeholder="********" required />
            </div>


            <div class="m-t-lg">
                <ul class="list-inline">
                    <li>
                        <input class="btn btn--form" type="submit" name="submit" value="log in" id="submit" />
                    </li>
                    <li>
                        <a class="signup__link" href="#">Forgot your password?</a>
                    </li>
                </ul>
            </div>
        </form>
    </div>

</div>


</body>

</html>
