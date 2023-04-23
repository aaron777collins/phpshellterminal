<?php
session_start();

// checking if the user has logged in with the correct password of research13579
if (isset($_POST['password']) && $_POST['password'] == "research13579") {
    // if the user has logged in, then we will set the session variable to true
    $_SESSION['loggedin'] = true;
    // and then we will redirect the user to the shell.php page
    header("Location: shell.php");
} else {
    // if the user has not logged in, then we will display the login form
    echo "<form method='post' action='loginshell.php'>
    <input type='password' name='password' placeholder='Password'>
    <input type='submit' value='Login'>
    </form>";
}


?>

<style>
    body {
        background-color: #000000;
        color: #ffffff;
    }
    input {
        background-color: #000000;
        color: #ffffff;
        border: 1px solid #ffffff;
        border-radius: 5px;
        padding: 5px;
    }
    input[type="submit"] {
        background-color: #ffffff;
        color: #000000;
        border: 1px solid #ffffff;
        border-radius: 5px;
        padding: 5px;
    }

    input[type="submit"]:hover {
        background-color: #000000;
        color: #ffffff;
        border: 1px solid #ffffff;
        border-radius: 5px;
        padding: 5px;
    }

    input[type="submit"]:active {
        background-color: #ffffff;
        color: #000000;
        border: 1px solid #ffffff;
        border-radius: 5px;
        padding: 5px;
    }

</style>
