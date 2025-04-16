<?php 
interface ReservableInterface {
	
	public function reserver(Client $client, DateTime $dateDebut, int $nbJours);

}

abstract class Vehicule{
	
	private $id;
	private $immatriculation;
	private $marque;
	private $modele;
	private $prixJour;
	private $disponible;
	
    public function estDisponible(){}
    
    public function calculerPrix(){}
    
    public function afficherDetails(){}
    
     public abstract function getType();
}

class Voiture extends Vehicule implements ReservableInterface  {
	
	private $nbPortes;
	private $transmission;
	private $Type ;


    public function getNbPortes(){
    	return $this->nbPortes;
	}
	
    public function getTransmission(){
    	return $this->transmission;
	}
    public function getType(){
    	return $this->Type;
	}
	
	public function reserver(Client $client, DateTime $dateDebut, int $nbJours){}

	public function afficherDetails(){
		echo 'nbPortes = '.$this->getNbPortes();
		echo 'transmission = '.$this->getTransmission();
		echo 'Type = '.$this->getType();	
	}

}

class Moto extends Vehicule implements ReservableInterface  {
	
	private $cylindree;
	private $Type ;

    public function getCylindree(){
		return $this->cylindree;
		
	}
	
	public function reserver(Client $client, DateTime $dateDebut, int $nbJours){}
	
	public function getType(){
		return $this->Type;
		
	}

	public function afficherDetails(){
		
		echo 'cylindree = '.$this->getCylindree();
		echo 'Type = '.$this->getType();
			
	}

	
}
class Camion extends Vehicule implements ReservableInterface  {
    private $nbPortes;
	private $transmission;
	private $Type ;

    public function getNbPortes(){
		return $this->nbPortes;
	}
    public function getTransmission(){
		return $this->transmission;
	}
    public function getType(){
		return $this->Type;
	}
	public function reserver(Client $client, DateTime $dateDebut, int $nbJours){}
	
	public function afficherDetails(){
		echo 'nbPortes = '.$this->getNbPortes();
		echo 'transmission = '.$this->getTransmission();
		echo 'Type = '.$this->getType();
	}
}


 //Partie 3 – Client et Personne

 abstract class Personne {
 	
 	private $nom;
 	private $prenom;
 	private $email;

    public function getNom(){
        return $this->nom;
    } 
    public function getPrenom(){
        return $this->prenom;
    } 
    public function getEmail(){
        return $this->email;
    } 
 	
 	public abstract function afficherProfil();
 }
 
 class Client extends Personne{
 	
 	 private $numeroClient;
 	 private $reservations = [];

      public function getHistorique(){
        return $this->reservations;
    }
 	 
 	 public function ajouterReservation($reservation){
 	 	$this->reservations = $reservation;
 	 }

 	 public function afficherProfil(){
 	 	echo 'nom = '. $this->getNom();
		echo 'prenom = '.$this->getPrenom();
		echo 'email = '.$this->getEmail();
		
 	 }
 	 
 	

 }
 
 
  //Partie 4 – Agence & Réservatio
  
  class Agence{
  	
  	private $nom;
  	private $ville;
  	private $vehicules = [];
  	private $clients =[];

    public function setville($ville){
        $this->ville =$ville;
       
    }
    public function setNom($nom){
        $this->nom = $nom;
       
    }
    public function setVehicules($nom){
        $this->vehicules = $nom;
       
    }
  	
  	public function ajouterVehicule( $v){
  		$this->vehicules =  $v;
  		
  	}
  	
  	public function rechercherVehiculeDisponible(string $type){
  		foreach($this->vehicules as $vehicule ){
  			if($vehicule == $type ){
  				$resulta = $vehicule ;
  				break;
  			}
  		}
  		return $resulta;
  	}
  	
  	public function enregistrerClient(Client $c){
  		$this->clients = $c;
  	}
  	
  	public function faireReservation(Client $client, Vehicule $v, DateTime $dateDebut, int $nbJours){
  		$faireReservation = [
                            'client'=>$client,
                            'Vehicule'=>$v,
                            "DateTime"=>$dateDebut,
                            'nbJours'=>$nbJours
         ];
  	}
  	
  	
  }
  
  class Reservation {
  	private $vehicule;
  	private $client;
  	private $dateDeb;
  	private $nbJours;
  	private $statut;

    public function getNbJours(){
        return $this->nbJours;
    }
  	
  	public function calculerMontant($price){
  		
  	 $Montant = $price  *  $this->getNbJours();
  	 
  	 return $Montant;
  		
  		
  	}
  	public function annuler(){
  		
  	}
  	public function confirmer(){
  		
  	}

  }
  
 //Partie 5 – Trait + Logger
 class Logger {
 	
 }
 $agence1 = new Agence('bmw','casablanca');
 $agence2 = new Agence('MR','PARISE');







