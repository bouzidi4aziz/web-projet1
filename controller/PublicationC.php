<?php
include_once '../config.php';
class PublicationC {	

    public function addPublication($C){

        $db=config::getConnection();
     /*   $C->setCategId(strval($C->getCategId()));
        $sqlQuery = 
        'SELECT * FROM categorie WHERE Nom = '.$C->getCategId();
    
    $stmt = $db->prepare($sqlQuery);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);	
    $C->setCategId($result[0]['id'] );
    */
        try{

            $req=$db->prepare('INSERT INTO `publication` (`id`, `Categorie_id`,  `User_id`, `Contenu`,`Date`) 
            VALUES (NULL ,:categorie_id, :user_id, :Contenu, :Date )');

         $req->execute(
            [
                'categorie_id' =>$C->getCategId(),
                'user_id' =>$C->getUserId(),
                'Contenu' =>$C->getContenu(),
                'Date' =>$C->getDate(),
            ]
            );   
        }
        catch (Exception $e)
  { die ('Error : '.$e->getMessage());}
    }

    public function updatePub($p){
        $db=config::getConnection();
        try 
        {
        $req=$db->prepare('UPDATE publication SET Contenu=:c, Date=:d WHERE `Publication`.`id` = :id');
    
        $req->execute(
            [
                
                'c' =>$p->getContenu(),
                'd' =>$p->getDate(),
                'id' =>$p->getId()
              
            ]
            ); 
    }
    
    catch (Exception $e)
    {
    die('Error : '. $e->getMessage());
    }
    }

    public function getTopicList($id){
        $db=config::getConnection();
        $sqlQuery = "
        SELECT  p.id, p.Contenu, p.User_id, p.Date		
				FROM publication as p 
				LEFT JOIN categorie as c ON p.id = c.id
				WHERE p.Categorie_id = ".$id."
				ORDER BY c.id DESC";
    
    $stmt = $db->prepare($sqlQuery);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);		
    return $result;	
    }

    public function getFilteredTopicList($id, $searchQuery) {
        $db = config::getConnection();
        
        // Prepare the base SQL query
        $sqlQuery = "
            SELECT p.id, p.Contenu, p.User_id, p.Date
            FROM publication AS p
            LEFT JOIN categorie AS c ON p.id = c.id
            WHERE p.Categorie_id = :category_id";
        
        // If a search query is provided, add the search condition
        if (!empty($searchQuery)) {
            $sqlQuery .= " AND p.Contenu LIKE :search_query";
        }
    
        $sqlQuery .= " ORDER BY c.id DESC";
        
        // Prepare and execute the query
        $stmt = $db->prepare($sqlQuery);
        $stmt->bindValue(':category_id', $id, PDO::PARAM_INT);
        
        if (!empty($searchQuery)) {
            $stmt->bindValue(':search_query', '%' . $searchQuery . '%', PDO::PARAM_STR);
        }
    
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $result;
    }
    public function GetPub($id){
        $db=config::getConnection();
        $sqlQuery = "
        SELECT *
        FROM publication WHERE id = ".$id;
    
    $stmt = $db->prepare($sqlQuery);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);		
    return $result;	
    }

    public function GetAllPub(){
        $db=config::getConnection();
        $sqlQuery = "
        SELECT *
        FROM publication ";
    
    $stmt = $db->prepare($sqlQuery);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);		
    return $result;	
    }


    public function deletePublication($id){
        $db=config::getConnection();
        try 
        {
        $req=$db->prepare(' DELETE FROM `publication` WHERE `publication`.`id` = :id');
       
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

        public function GetPubnbcomm($id)
        {   
            $db=config::getConnection();
        
            $sqlQuery = "
            SELECT count(*) as total_comm
				FROM commentaire
				WHERE publication_id = ".$id;
        
        $stmt = $db->prepare($sqlQuery);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $categoryDetails = $result[0];	
        return $categoryDetails['total_comm'];	
        
        
        }

        }
        
        ?>