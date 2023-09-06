<?php

class Categorie {
    private $id;
    private $nom;
    private $description;
  private $user_id;

    public function __construct( $nom, $description,$user_id) {
  
      $this->nom = $nom;
      $this->description = $description;
      $this->user_id = $user_id;
    }
  
    public function getId() {
      return $this->id;
    }
  
    public function getNom() {
      return $this->nom;
    }
  
    public function getuserid() {
      return $this->user_id;
    }
  
    public function getDescription() {
      return $this->description;
    }
  
    public function setId($id) {
      $this->id = $id;
    }
  
    public function setNom($nom) {
      $this->nom = $nom;
    }
  
    public function setDescription($description) {
      $this->description = $description;
    }
  }
  ?>