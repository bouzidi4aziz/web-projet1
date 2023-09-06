<?php
include_once '../config.php';
class CategoryC {	

    public function addCateg($C){

        $db=config::getConnection();
        try{

            $req=$db->prepare('INSERT INTO `categorie` (`id`, `nom`,  `description`,`user_id`) 
            VALUES (NULL,:nom, :description,:user_id )');

         $req->execute(
            [
                'nom' =>$C->getNom(),
                'description' =>$C->getDescription(),
                'user_id' =>$C->getuserid(),
            ]
            );   
        }
        catch (Exception $e)
  { die ('Error : '.$e->getMessage());}
    }

    public function updateCateg($c){
        $db=config::getConnection();
        try 
        {
        $req=$db->prepare('UPDATE Categorie SET Nom=:n, Description=:d WHERE `Categorie`.`id` = :id');
    
        $req->execute(
            [
                
                'n' =>$c->getNom(),
                'd' =>$c->getDescription(),
                'id' =>$c->getId()
              
            ]
            ); 
    }
    
    catch (Exception $e)
    {
    die('Error : '. $e->getMessage());
    }
    }

    public function listCateg(){
        $db=config::getConnection();
        $sqlQuery = "
        SELECT *
        FROM categorie ORDER BY id ASC";
    
    $stmt = $db->prepare($sqlQuery);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);		
    return $result;	
    }
    public function listCategs($searchQuery = '') {
        $db = config::getConnection();
        $sqlQuery = "
            SELECT *
            FROM categorie
            WHERE nom LIKE :searchQuery
            ORDER BY id ASC";
        
        $stmt = $db->prepare($sqlQuery);
        $stmt->bindValue(':searchQuery', '%' . $searchQuery . '%', PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    

    public function GetCateg($id){
        $db=config::getConnection();
        $sqlQuery = "
        SELECT *
        FROM categorie WHERE id = ".$id;
    
    $stmt = $db->prepare($sqlQuery);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);		
    return $result;	
    }


    public function deleteCateg($id){
        $db=config::getConnection();
        try 
        {
        $req=$db->prepare(' DELETE FROM `categorie` WHERE `categorie`.`id` = :id');
       
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

public function GetCategnbpub($id)
{   
    $db=config::getConnection();

    $sqlQuery = "
    SELECT count(*) as nb_publication
    FROM publication 
    WHERE Categorie_id = ".$id;

$stmt = $db->prepare($sqlQuery);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$categoryDetails = $result[0];	
return $categoryDetails['nb_publication'];	


}

public function GetCategnbcomm($id)
{   
    $db=config::getConnection();

    $sqlQuery = "
    SELECT count(*) as total_comm
    FROM commentaire as co
    LEFT JOIN publication as p ON co.publication_id = p.id
    LEFT JOIN categorie as c ON p.Categorie_id = c.id				
    WHERE c.id = ".$id;	

$stmt = $db->prepare($sqlQuery);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$categoryDetails = $result[0];	
return $categoryDetails['total_comm'];	


}
}

?>