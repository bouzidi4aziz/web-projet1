<?php
include_once '../config.php';

  
class CommentaireC {	

    public function addCommentaire($C){

        $db=config::getConnection();
        try{
            $C->setContenu($this->filterComment($C->getContenu()));
            $req=$db->prepare('INSERT INTO `commentaire` (`id`, `Contenu`,`publication_id`,`user_id`,  `Date`) 
            VALUES (NULL , :Contenu , :publication_id , :user_id, :Date )');

         $req->execute(
            [
                'Contenu' =>$C->getContenu(),
                'publication_id' =>$C->getPublicationId(),
                'user_id' =>$C->getUserId(),
                'Date' =>$C->getDate(),
            ]
            );   
        }
        catch (Exception $e)
  { die ('Error : '.$e->getMessage());}
    }


    public function updateComm($c){
        $db=config::getConnection();
        try 
        {
            $c->setContenu($this->filterComment($c->getContenu()));
        $req=$db->prepare('UPDATE commentaire SET Contenu=:c, Date=:d WHERE `Commentaire`.`id` = :id');
    
        $req->execute(
            [
                
                'c' =>$c->getContenu(),
                'd' =>$c->getDate(),
                'id' =>$c->getId()
              
            ]
            ); 
    }
    
    catch (Exception $e)
    {
    die('Error : '. $e->getMessage());
    }
    }

    ///
    function filterComment($comment) {
        // Define a list of bad words (you can customize this list to your needs)
        $badWords = array('test', 'badword', 'zeydaa');
        
        // Loop through each word in the comment
        $words = explode(' ', $comment);
        foreach ($words as &$word) {
            // Remove any punctuation from the word
            $word = preg_replace('/[^a-zA-Z0-9]/', '', $word);
            
            // Check if the word is a bad word (case insensitive)
            $found = false;
            foreach ($badWords as $badWord) {
                $similarity = 0;
                similar_text(strtolower($word), strtolower($badWord), $similarity);
                if ($similarity >= 80) {
                    $found = true;
                    break;
                }
            }
          
            // Replace the word with a censored version if it's a bad word
            if ($found) {
                $censoredWord = '';
                for ($i = 0; $i < strlen($word); $i++) {
                    if (ctype_upper($word[$i])) {
                        // If the character is an uppercase letter, use an uppercase asterisk
                        $censoredWord .= '*';
                    } else {
                        // Otherwise, use a lowercase asterisk
                        $censoredWord .= '*';
                    }
                }
                $word = $censoredWord;
            }
        }
        
        // Combine the words back into a comment and return it
        return implode(' ', $words);
    }
    

      ///

    public function listCommentaire($id){
        $db=config::getConnection();
        $sqlQuery = "
        SELECT  c.id, c.Contenu, c.user_id, c.publication_id, p.Categorie_id, c.Date, u.nom		
				FROM commentaire as c 
				LEFT JOIN publication as p ON p.id = c.publication_id
                LEFT JOIN user as u ON c.user_id = u.id
				WHERE c.publication_id = ".$id."
				ORDER BY c.Date DESC";
    
    $stmt = $db->prepare($sqlQuery);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);		
    return $result;	
    }


    public function deleteCommentaire($id){
        $db=config::getConnection();
        try 
        {
        $req=$db->prepare(' DELETE FROM `commentaire` WHERE `commentaire`.`id` = :id');
       
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
        }
        
        ?>