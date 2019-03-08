<?php 

define('DRIVER', 'mysql');
define('HOST', 'localhost');
define('DB_NAME', 'id4255145_dev_social');
define('DB_USER', 'id4255145_root');
define('DB_PASS', '123456');


if(!function_exists('connect'))
{
    function connect()
    {
        try{
            
            $chr=[PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES UTF8'];
            $connect = new PDO(DRIVER.':host='.HOST.';dbname='.DB_NAME ,DB_USER ,DB_PASS,$chr);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // $connect->setAttribute[PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES UTF8'];
            return $connect;
        }catch(PDOException $e){
            die('Impossible de se connecter a la base de donnés'.$e->getMessage());
        }

    }
}


$db= connect();

//les function lies a la base de donnees

//cette function permet de verifier l'uniciter (nom pseudo email ...) en bd
if(!function_exists('is_unique'))
{
    function is_unique($value, $field, $table )
    { 
        global $db;

        if(isset($_SESSION['auth_id']))
        {
         $q=$db->prepare("SELECT id FROM $table WHERE $field=:valu  AND id <> :id");
         $q->execute([
                        'valu'=>$value,
                        'id'=>$_SESSION['auth_id']
                    ]);
        
        return (bool) $q->rowCount();

        }
        $q=$db->prepare("SELECT id FROM $table WHERE $field=?");
        $q->execute([$value]);
        
        return (bool) $q->rowCount();
    }
}



 //cette fonction ajoute un nouvel utilisateur en base de donne
 //et retourne sont id
if(!function_exists('add_user'))
{
    function  add_user($name, $mail, $pseud, $password)
    { 
        global $db;
        $q=$db->prepare('INSERT INTO users(nom, pseudo, email,password) 
                        VALUES(:nom, :pseudo, :email, :password)');
        $q->execute([
                    'nom' =>$name,
                    'pseudo' =>$pseud,
                    'email' =>$mail,
                    'password' =>$password
        ]);
            //on recuperer l'id du last user inscrit
            $id=$db->lastInsertId(); 

        return (int) $id;
    }
}


//cette fonction ajoute le token de l'utilisateur nouvellement inscrit
//a fonction de sont id
//add_user_token($user_id, $token);
if(!function_exists('add_user_token'))
{
    
    function add_user_token($user_id, $token)
    { 
        global $db;
        $q=$db->prepare('INSERT INTO tokens(users_id,email_token) 
                        VALUES(:id,:token)');
        $q->execute([
                    'id' =>$user_id,
                    'token' =>$token
        ]);
        
    }
}
//cette fonction aujout l'id de lt
//a fonction de sont id

if(!function_exists('add_iduser_info'))
{
    
    function add_iduser_info($user_id)
    { 
        global $db;
        $q=$db->prepare('INSERT INTO info_users(users_id) 
                        VALUES(?)');
        $q->execute([$user_id ]);
        
    }
}

 

//cette function permet 
if(!function_exists('valide_token'))
{
    function valide_token($id, $token)
    { 
        global $db;
        $q=$db->prepare("SELECT id FROM tokens WHERE users_id=:id  AND email_token =:token");
        $q->execute([
                    'id' =>$id,
                    'token' =>$token
        ]);
        
        return (bool) $q->rowCount();
        
    }
}

//cette function permet 
if(!function_exists('update_email_token'))
{
    function update_email_token($id)
    { 
        global $db;
        $q=$db->prepare("UPDATE tokens SET email_token =null , 
                     activation_account= NOW() 
                    WHERE users_id= ? ");
        $q->execute([$id]);
        
        
    }
}

//cette function permet  activer le compte 
if(!function_exists('active_account'))
{
    function active_account($id)
    { 
        global $db;
        $q=$db->prepare('UPDATE users SET active =\'1\' 
                    
                    WHERE id= ? ');
        $q->execute([$id]);
        
    }
}

//cette function permet de recuperer les information l'utilisateur dont le 
//compte est active (et par la suite le connecter)
if(!function_exists('auth_user'))
{
    function auth_user($login, $pwd )
    { 
        global $db;
        $q=$db->prepare("SELECT id, password,etats
                         FROM users 
                         WHERE (pseudo =:login || email=:login)
                          AND active ='1'");
        $q->execute(['login' =>$login ]);

        $data= $q->fetch(PDO::FETCH_OBJ);             
           
        if($data){
            return $data;
        }
       
    }
}

//cette function permet de modifier le nom et le pseudo d'un utilisateur
//elle elle appeller dans edit_profil
if(!function_exists('update_user'))
{
    function update_user($nom, $pseud, $id)
    { 
        global $db;
        $q=$db->prepare("UPDATE users SET nom=:name, pseudo=:pseu, etats='1' 
                            WHERE id =:id");
        $q->execute([
                       'name'=>$nom,
                       'pseu'=>$pseud,
                        'id'=>$id 
        ]);
        
        
    }
}

//cette function permet de mettre a jour le profil de l'utilisateur
//edit_profil
if(!function_exists('update_info_user'))
{
    function update_info_user($ville, $pays, $sexe, $dev, $git,
                                 $comment, $face,$tw,$emploi, $id)
    { 
        global $db;
        $q=$db->prepare('UPDATE info_users SET ville=:vil, pays=:country,
                                                sexe=:genre, profil=:dev,
                                                github=:git, biographie=:bio,
                                                facebook=:face, twitter=:tiw,
                                                emploi=:boulo
                                        WHERE users_id=:id

        ');
        $q->execute([
                     'vil'=>$ville, 
                     'country'=>$pays , 
                     'genre'=> $sexe, 
                     'dev'=>$dev , 
                     'git'=>$git , 
                     'bio'=>$comment, 
                     'face'=>$face , 
                     'tiw'=>$tw , 
                     'boulo'=>$emploi, 
                     'id'=>$id  
        ]);
        
        
    }
}

//cette function permet prendre toutes les information sur un users en bd
//pour preremplir la partie du profil
if(!function_exists('get_info_user'))
{
    function get_info_user( $id)
    { 
        global $db;
        
        $q=$db->prepare("SELECT users.nom, users.pseudo,
                                users.email, users.grade,
                               info_users.pays, info_users.ville,
                               info_users.profil, info_users.sexe,
                               info_users.facebook, info_users.twitter,
                               info_users.biographie, info_users.github,
                               info_users.emploi 
                        FROM users
                        JOIN info_users
                        ON users.id=info_users.users_id  
                        WHERE users.id=?");
        $q->execute([$id]);
        
        $data = $q->fetch(PDO::FETCH_OBJ);
        if($data){

            return $data;
        }
        return null;
    }
}

// //cette function permet 
// if(!function_exists(''))
// {
//     function ( )
//     { 
//         global $db;
//         $q=$db->prepare("");
//         $q->execute([]);
        
        
//     }
// }

// //cette function permet 
// if(!function_exists(''))
// {
//     function ( )
//     { 
//         global $db;
//         $q=$db->prepare("");
//         $q->execute([]);
        
        
//     }
// }

// //cette function permet 
// if(!function_exists(''))
// {
//     function ( )
//     { 
//         global $db;
//         $q=$db->prepare("");
//         $q->execute([]);
        
        
//     }
// }

// //cette function permet 
// if(!function_exists(''))
// {
//     function ( )
//     { 
//         global $db;
//         $q=$db->prepare("");
//         $q->execute([]);
        
        
//     }
// }

// //cette function permet 
// if(!function_exists(''))
// {
//     function ( )
//     { 
//         global $db;
//         $q=$db->prepare("");
//         $q->execute([]);
        
        
//     }
// }

// //cette function permet 
// if(!function_exists(''))
// {
//     function ( )
//     { 
//         global $db;
//         $q=$db->prepare("");
//         $q->execute([]);
        
        
//     }
// }

// //cette function permet 
// if(!function_exists(''))
// {
//     function ( )
//     { 
//         global $db;
//         $q=$db->prepare("");
//         $q->execute([]);
        
        
//     }
// }

// //cette function permet 
// if(!function_exists(''))
// {
//     function ( )
//     { 
//         global $db;
//         $q=$db->prepare("");
//         $q->execute([]);
        
        
//     }
// }

// //cette function permet 
// if(!function_exists(''))
// {
//     function ( )
//     { 
//         global $db;
//         $q=$db->prepare("");
//         $q->execute([]);
        
        
//     }
// }

// //cette function permet 
// if(!function_exists(''))
// {
//     function ( )
//     { 
//         global $db;
//         $q=$db->prepare("");
//         $q->execute([]);
        
        
//     }
// }

// //cette function permet 
// if(!function_exists(''))
// {
//     function ( )
//     { 
//         global $db;
//         $q=$db->prepare("");
//         $q->execute([]);
        
        
//     }
// }

// //cette function permet 
// if(!function_exists(''))
// {
//     function ( )
//     { 
//         global $db;
//         $q=$db->prepare("");
//         $q->execute([]);
        
        
//     }
// }

// //cette function permet 
// if(!function_exists(''))
// {
//     function ( )
//     { 
//         global $db;
//         $q=$db->prepare("");
//         $q->execute([]);
        
        
//     }
// }



