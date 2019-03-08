<?php
session_start(); 
include ('constant/constant.php');
include ('constant/function.php');
require 'library/filter/is_loging.php';
include ('constant/managers.php');

// die();
// si le formulaire est soumis
if(isset($_POST['connect'])){
    
    extract($_POST);
    $errors=[];
   // var_dump(remplie(['names','email','pass','pass_confirm','pseudo']));
    
    
    //on verifie que tour les champs sont remplie
    if(remplie(['login','pass'])){
        //on authentifie l'utilisateur
        $data=auth_user($login, $pass );
        //var_dump($data);
        if( $data!=null && password_verify(strtolower($pass), $data->password) ){
            
            $_SESSION['auth_id'] = $data->id;
            //avant de rediriger l'utilisateur 
            //si le champ connet de la table users est a un
            //on le redirige vers la page d'accueill
            //sinon il doit mettre a jour sont profil

            if($data->etats =="1")
            {

                header('location:accueil.php?id='.$data->id); 
                exit();
            }

           // redirect('edit_profil.php/?id='.$data->id); 
           header('location:edit_profil.php?id='.$data->id); 
           exit();
        }            
        
        save_input();

            $errors[]="login ou mot de passe incorrect";       

    }else{
         save_input();
            $errors[]="Entrer vos identifiants";
    }
}else{
        //ici l'utilisateur arrive sur le formulaire pour sa premiere fois
        //dont on efface tous ce qui est contenue dans le formulaire
        clear_form();

}

include ('view/login.view.php');
