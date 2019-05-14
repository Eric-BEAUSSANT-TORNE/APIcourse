<?php
session_start();
require_once '../Include/API/Classes/Admin.php';
$admin = new Admin;

if(isset($_SESSION['logged_in'])) {
    echo "<form method='post'>
        <button name='logout'>Log Out</button>
    </form>";
}

if(isset($_POST['logout'])) {
    $_SESSION = array();
    header('Location: index.php');
}

if(isset($_GET['action'])) {
    $admin->api_key_generator();
    header('Location: create_api_key.php');
}
?>
<h1> API GENERATOR </h1>

<form>
    <input name='api-key' placeholder='api-key' value="<?php echo $admin->getKey()?>"><br>
    <input type="submit" name="action" value="Get new API-key">
</form>
