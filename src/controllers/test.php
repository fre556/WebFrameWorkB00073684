<?php

$array = \Hdip\Controller\AdminController::adminNavLinks();

$navHTML = null;

foreach ($array as $nav => $link) {
    echo '<li>';
    $navHTML .= "<a href=". $link. ">". $nav."</a>"."<br>";
    echo '</li>';
}

?>
