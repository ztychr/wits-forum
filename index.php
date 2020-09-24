<?php
include("templates/header.php");

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
    $action = basename($action);

    if (isset($_GET["return"])){
    include("php/messages.php");
    }

    include("templates/$action.php");
}

else {
    include("templates/index.php");
}

include("templates/footer.php");
?>
