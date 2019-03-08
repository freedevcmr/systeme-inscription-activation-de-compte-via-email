<?php
session_start(); 
include ('constant/constant.php');
include ('constant/function.php');
require 'library/filter/is_loging.php';
include ('constant/managers.php');

// die();
// si le formulaire est soumis
if(isset($_POST['inscrire'])){
    
    extract($_POST);
    $errors=[];
   // var_dump(remplie(['names','email','pass','pass_confirm','pseudo']));
    
    
    //on verifie que tour les champs sont remplie
    if(remplie(['names','email','pseudo','pass','pass_confirm'])){
        
        //on verifie le format de l'adress email
        if(!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#",$email )){
            $errors[]="votre adress email est invalide";
        }

        //on verifie la longeur du mot de passe
        if(mb_strlen($pass) < 5){
             $errors[]="Mot de passe tres court minimum 5 caratères";
        }else{
            //on verifie que les deux mots de passe sont identique
            if($pass!=$pass_confirm){
                 $errors[]="vos deux mot de passe sont differents";
            }
        }

        //on verifie la longueur du pseudo
        if(mb_strlen($pseudo) < 4){
            $errors[]="pseudo tres court minimuim 4 caractere";
        }

        //on verifie l'unicité du pseudo
        if(is_unique($pseudo, 'pseudo', 'users')){
             $errors[]="Desolé ce pseudo est deja Pris";
         }

        //on verifie l'unicitee de l'adress email 
        if(is_unique($email, 'email', 'users')){
             $errors[]="Adress email est deja Pris";
         }

        //en cas d'erreur on sauvegade le contenu du formulaire
            save_input();
         //var_dump($_SESSION);
         //s'il n'y pas d'erreur on continue 
         if(count($errors)==0){
            
             //on hash le mot de passe
             $password=password_hash(strtolower($pass), PASSWORD_BCRYPT);
             //on insert l'utilisateur en base de donné et on recupere son id
              $user_id = add_user($names, $email, $pseudo, $password);
              //on creer un token unique 
              $token =token($email,$pseudo,$pass);
             //on insert le token dans la table des token 
             add_user_token($user_id, $token);

             
            //  //on envoi le message de confirmation de compte
            $id =$user_id; //cette variable est utilisers dans l'email
            $to = $email;
            $nom = $names; //cette variable est utilisers dans l'email
            $subject = WEB_SITE_NAME.'- ACTIVATION DE COMPTE';
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

            ob_start();
            require('library/template/activationCompte.php');
            $messages = ob_get_clean();

              mail($to,$subject,$messages, $headers);


             //le message flash 

    flash('Un mail d\'activation de compte a eté envoyer dans votre adress email', 'success');

   // var_dump($_SESSION);
             //on le redirige vers a page login
             
            
             header('location:login.php');
             exit();
             
             
            }
            
        }else{
            //on sauvegarde le contenue des input (puis on les pre-remplie dans le fichier view)
            //tous les champs sont oubligatoires
            save_input();
            $errors[]="Tous les champs sont oubligatoires";
            //var_dump($_SESSION);
    }

}else{
        //ici l'utilisateur arrive sur le formulaire pour sa premiere fois
        //dont on efface tous ce qui est contenue dans le formulaire
        clear_form();

}

include ('view/register.view.php');
