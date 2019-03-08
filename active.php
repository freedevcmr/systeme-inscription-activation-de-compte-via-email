<?php 
session_start(); 
include ('constant/constant.php');
include ('constant/function.php');
include ('constant/managers.php');

if(isset($_GET['id'])){
    
    $id=(int) $_GET['id'];
    
    //pour l'activation du compte
    if(isset($_GET['token_email'])){
        
        $token= $_GET['token_email'];
        
        //on cherche dans la table token s'il y un user_id==$_get['id']
        //et un token qui get(token)
        if(valide_token($id, $token))
        {
            //on met a jour les table users est token 
            //dont active =1 et le token = null
           update_email_token($id);
            active_account($id);
            //on fait signe a  la table user info pour ses autre information 
            add_iduser_info($id);

                flash('Feliciation!!!vous venez d\'activer votre compte... 
                vous povez vous connecter');
            //on le redirige vers la page login 
           redirect('../login.php');
           
        }else{
            //message flash vous parametre sont invalide 
            flash('parametre invalide...impossible d\' activé ce compte','danger');
            redirect('../login.php');
            
            
        }
    }
    
    // //pour la reinitiallisation du mot de passe 
    //  if(isset($_GET['pass_token'])){
        //     $token= $_GET['pass_token'];
        // }
        
        
    }else{
        // echo 'il n y a pas de variable dans l url';
        flash('<h1>ATTENTION !!!!</h1>','danger');
        redirect('../register.php');
    // vous parametre sont ivalide
}