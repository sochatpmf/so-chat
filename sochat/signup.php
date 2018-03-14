<?php
include_once "header.php";
?>

<section class="main-container">

    <div class="main-wrapper">
        <h2>Sign up</h2>
        <form class="signup-form" action="includes/signup.inc.php" method="post">
            <input type="text" name="firstName" placeholder="first name">
            <input type="text" name="lastName" placeholder="last name">
            <input type="text" name="phone" placeholder="phone number">
            <input type="text" name="age" placeholder="age">
            <input type="text" name="gender" placeholder="gender">
            <input type="text" name="country" placeholder="country">
            <input type="text" name="username" placeholder="username">
            <input type="password" name="password" placeholder="password">
            <input type="text" name="mail" placeholder="email">
            <button type="submit" name="submit">Sign up</button>
        </form>
    </div>

</section>

<?php
include_once "footer.php";
?>
