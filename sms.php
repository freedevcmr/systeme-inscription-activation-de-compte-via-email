<?php 
session_start();
include ('constant/constant.php');
include ('constant/function.php');


if(isset($_POST['send'])){
    extract($_POST);
    var_dump($_POST);
    $errors=[];
    if(remplie(['mynumber','numberdest','msg'])){

        //on verifie que le numero de l'expediteur et
        //du destinataire  ait chacun 9 chiffres

        //on virifie que le message ai au max 160 caracter

        //si tous est bon on fait appel a l'Api

    }else{
        $errors[]="tous les champs sont oubligatoires";
    }
}

include 'view/sms.view.php';