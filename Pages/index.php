<?php
require_once '../Include/API/Classes/Admin.php';
session_start();

$admin = new Admin;

?>
<?php
    if(isset($_SESSION['logged_in'])) { ?>
        <form method='post'>
            <button name='logout'>Log Out</button>
        </form>
    <?php } else { ?>
<h2> Logga in </h2>
<form method="post">
<?php
$admin->createInputs();
?>
    <input type="submit" value="Log in" name="login">
</form>
<h2> Skapa Konto </h2>
<form method="post">
    <?php
    $admin->createInputs();
    ?>
    <input type="submit" value="Create Account" name="createAcc">
</form>
<?php
    if(isset($_POST['login'])){
        echo "testar att logga in";
        if($admin->login()) {
            header('Location: create_api_key.php');
        }
    }
    if(isset($_POST['createAcc'])) {
        if($admin->create()){
            echo "Konto Skapat";
        }
        else {
            echo "något gick fel";
        }
    }
}

if(isset($_POST['logout'])) {
    $_SESSION = array();
}
    ?>

