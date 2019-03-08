<?php
session_start(); 
include ('constant/constant.php');
include ('constant/function.php');
require 'library//filter/is_guest.php';
include ('constant/managers.php');

//c'est a dire l'utilisateur est sur le formulaire 
    //on auto remplie les champ par les information stocker en bd
    $id =$_SESSION['auth_id'];
    $data= get_info_user( $id);
   // var_dump($data);
    if(!isset($_GET['id'])){
        header("location:./edit_profil.php?id=$id");
    }

if(isset($_POST['update']))
{
    extract($_POST);
    $errors=[];

    if(remplie(['nom','pseudo','ville', 'pays','sexe','dev','git','comment']))
    {
        //on verifie la longueur du pseudo
        if(mb_strlen($pseudo) < 4){
            $errors[]="pseudo tres court minimuim 4 caractere";
        }

         //on verifie l'unicité du pseudo
        if(is_unique($pseudo, 'pseudo', 'users')){
             $errors[]="Desolé ce pseudo est deja Pris";
         }
         //virification sur la checbox
         if(isset($box)){
             $emploi ='1';
         }else{
             $emploi='0';
         }
         //virification sur le sexe
         if($sexe =='H'){
             $sexe =='H';
         }elseif($sexe =='F'){
             $sexe =='F';
         }else{
            $errors[]="votre sexe est inconnue"; 
         }
         //le status du devellopeur
         if($dev=='1'){
            $devs="dev-web";
         }elseif($dev=='2'){
            $devs="dev-mobile";
         }elseif($dev=='3'){
            $devs="dev-frontend";
         }elseif($dev=='4'){
            $devs="QA Manger";
         }elseif($dev=='5'){
            $devs="dev-fallstack";
         }elseif($dev=='6'){
            $devs="dev-integrator";
         }else{
            $errors[]="votre profil dev est inconnue";
         }


        //  var_dump($_POST);
        //  die();


         save_input();
         if(count($errors)==0)
         {
             $id =$_SESSION['auth_id'];
             //tu mets a jour la table users
            update_user($nom, $pseudo, $id); ;
             //tu mets a jour la table info_user
             //la table info_user s'actionne l'ors de l'activation  du compte
             
     update_info_user($ville, $pays, $sexe, $devs, $git, $comment, $face,$twiter,$emploi, $id);

     //le message flash 
     flash("votre profil est maintenant a jour", "info");
        //on le redirige vers la page accueil
      header('location:accueil.php?id='.$id);

         }

    }else{
        save_input();
        $errors[]="Les champs marqués sont oubligatoires";
    }


}
    


    
   

include ('view/edit_profil.view.php');
