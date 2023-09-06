<?php
include_once '../config.php';
class UserC {

   
    public function addUser($c){

        $db=config::getConnection();
        try{
            

            $req=$db->prepare('INSERT INTO `user` (`id`, `nom`, `prenom`, `email`, `mot_de_passe`,`role`) 
            VALUES (NULL, :nom, :prenom,  :email, :pass, :et )');

         $req->execute(
            [
                'nom' => $c->getNom(),
                'prenom' =>$c->getPrenom(),
                'email' =>$c->getEmail(),
                'pass' =>$c->getPass(),
                'et' => 1,
             
            ]
            );   
        }
        catch (Exception $e)
  { die ('Error : '.$e->getMessage());}
    }

   

    public function listUsers(){
        $db=config::getConnection();
        try 
        {
            $list = $db->query('SELECT * FROM user');
            return $list;
        }
        catch (Exception $e)
        {
            die('Error : '. $e->getMessage());
        }
    }
    //////////////Supression/////////////
    public function deleteUser($id){
        $db=config::getConnection();
        try 
        {
        $req=$db->prepare(' DELETE FROM `user` WHERE `user`.`id` = :id');
       
        $req->execute(
            [
                'id' => $id
                
            ]
            ); 
    }

catch (Exception $e)
{
    die('Error : '. $e->getMessage());
}
}

public function updateUser($id,$c){
    $db=config::getConnection();
    try 
    {
    $req=$db->prepare('UPDATE user SET nom=:n, prenom=:p, email=:e, mot_de_passe=:pass, role=:r WHERE `User`.`id` = :id');

    $req->execute(
        [
            'id' =>$id,
            'n' =>$c->getNom(),
            'p' =>$c->getPrenom(),
            'e' =>$c->getEmail(),
            'pass'=>$c->getPass(),
            'r'=>$c->getRole(),
          
        ]
        ); 
}

catch (Exception $e)
{
die('Error : '. $e->getMessage());
}
}

///////////////////////////////////
public function getUser($id){
    $db=config::getConnection();
    try 
    {
        $req = $db->prepare('SELECT * FROM user where id=:id');
        $req->execute(
            [
                'id' => $id
                
            ]
            ); 
        return $req->fetch();
    }
    catch (Exception $e)
    {
        die('Error : '. $e->getMessage());
    }
}




////////////////////compter - login
public function verifUser($email){
    $db=config::getConnection();
    try {
        $req = $db->prepare('SELECT * FROM user WHERE email=:email');
        $req->execute([
            'email' => $email
        ]); 
        return $req->fetch();
        }
    catch (Exception $e)
    {
        die('Error : '. $e->getMessage());
    }
}
}
?>