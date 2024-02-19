<?php
// Front Controller
$vueNom = "formage";
if(isset($_GET["p"])){
    switch($_GET["p"]){
        case "livreor":
            $vueNom = "livreor";
            //require_once "../views/livreor.html.php";
            break;
        default:
            $vueNom = "404";
            //require_once "../views/404.html.php";
            break;
    }
}

if($vueNom == "livreor"){
    require_once "../Model/livreorModel.php";
}


require_once "../view/$vueNom.html.php";


