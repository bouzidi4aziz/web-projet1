<?php

class Commentaire {
    private $id;
    private $publication_id;
    private $user_id;
    private $Contenu;
    private $Date;
  
    public function __construct( $publication_id, $user_id, $Contenu, $Date) {
      
      $this->publication_id = $publication_id;
      $this->user_id = $user_id;
      $this->Contenu = $Contenu;
      $this->Date = $Date;
    }
  
    public function getId() {
      return $this->id;
    }
  
    public function getPublicationId() {
      return $this->publication_id;
    }
  
    public function getUserId() {
      return $this->user_id;
    }
  
    public function getContenu() {
      return $this->Contenu;
    }
  
    public function getDate() {
      return $this->Date;
    }
  
    public function setId($id) {
      $this->id = $id;
    }
  
    public function setPublicationId($publication_id) {
      $this->publication_id = $publication_id;
    }
  
    public function setUserId($user_id) {
      $this->user_id = $user_id;
    }
  
    public function setContenu($Contenu) {
      $this->Contenu = $Contenu;
    }
  
    public function setDate($Date) {
      $this->Date = $Date;
    }
  }
  


?>