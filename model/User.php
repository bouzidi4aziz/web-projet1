<?php
class User{

    private  $id;
   
   
    private  $admin;//
    private  $nom;
    private  $prenom;
  
    private  $email;
    private  $pass;

    private $role;
 
    public function __construct( $n, $p,$email, $pass)
    {  
        $this->nom = $n;
        $this->prenom = $p;
        
        $this->email=$email;
        
        $this->pass=$pass;
        
    }
    public function getId()
    {
        return $this->id;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function getPrenom()
    {
        return $this->prenom;
    }
   
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

   
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }
    public function setPass($aux)
    {
        $this->pass = $aux;
    }
    public function getAdmin()
    {
        return $this->admin;
    }
    
    public function getEmail()
    {
        return $this->email;
    }
 
    public function getPass()
    {
        return $this->pass;
    }
    ////set
  
  
    public function setAdmin($aux)
    {
        $this->admin = $aux;
    }
  
  
   
    public function setEmail($aux)
    {
        $this->email = $aux;
    }
   

	/**
	 * @return mixed
	 */
	public function getRole() {
		return $this->role;
	}
	
	/**
	 * @param mixed $role 
	 * @return self
	 */
	public function setRole($role): self {
		$this->role = $role;
		return $this;
	}
}

?>