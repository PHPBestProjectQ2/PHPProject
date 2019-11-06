
 <?php 
 require_once (File::build_path(array("model","Model.php")));
 class ModelVoiture {
  private $marque;
  private $couleur;
  private $immatriculation;

          // un getter      
  public function getMarque() {
   return $this->marque;  
 }

          // un setter 
 public function setMarque($marque2) {
   $this->marque = $marque2;
 }

 public function getCouleur() {
   return $this->couleur;  
 }

 public function setCouleur($couleur2) {
  $this->couleur = $couleur2;
}

public function getImmatriculation() {
 return $this->immatriculation;  
}

public function setimmatriculation($immatriculation2){
  if (strlen($immatriculation2<=8)){
    $this->immatriculation = $immatriculation2;
  }
}


          // un constructeur

// La syntaxe ... = NULL signifie que l'argument est optionel
// Si un argument optionnel n'est pas fourni,
//   alors il prend la valeur par défaut, NULL dans notre cas
public function __construct($m = NULL, $c = NULL, $i = NULL) {
  if (!is_null($m) && !is_null($c) && !is_null($i)) {
    // Si aucun de $m, $c et $i sont nuls,
    // c'est forcement qu'on les a fournis
    // donc on retombe sur le constructeur à 3 arguments
    $this->marque = $m;
    $this->couleur = $c;
    $this->immatriculation = $i;
  }
}

          // une methode d'affichage.
//public function afficher() {
  //echo "Voiture $this->immatriculation de la marque $this->marque (couleur $this->couleur)";
//
//}
public static function getAllVoitures(){
  $rep = Model::$pdo->query("select * from voiture");
  $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelVoiture');
  $tab_voit = $rep->fetchAll();
  return $tab_voit;
}

public static function getVoitureByImmat($immat) {
  $sql = "SELECT * from voiture WHERE immatriculation=:nom_tag";
    // Préparation de la requête
  $req_prep = Model::$pdo->prepare($sql);

  $values = array(
    "nom_tag" => $immat,
        //nomdutag => valeur, ...
  );
    // On donne les valeurs et on exécute la requête   
  $req_prep->execute($values);

    // On récupère les résultats comme précédemment
  $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelVoiture');
  $tab_voit = $req_prep->fetchAll();
  return $tab_voit;
    // Attention, si il n'y a pas de résultats, on renvoie false
  if (empty($tab_voit))
    return false;
  return $tab_voit[0];
}

public function save() {
    $sql = "INSERT INTO voiture (immatriculation, marque,couleur) VALUES (:immat,:marque,:couleur)";
    $req_prep = Model::$pdo->prepare($sql);

    $values = array(
              "immat" => $this->immatriculation,
              "marque" => $this->marque,
              "couleur" => $this->couleur);

    $req_prep->execute($values);


  }

public static function delete($immat){
  $sql = "DELETE FROM `voiture` WHERE `voiture`.`immatriculation` = :immat ";
  $req_prep = Model::$pdo->prepare($sql);
  $values = array("immat" => $immat);
  $req_prep->execute($values);
}

public function update($marque,$couleur,$immatriculation){
  $sql = "UPDATE `voiture` SET `marque` = :marque, `couleur` = :couleur WHERE `voiture`.`immatriculation` = :immat ";
  $req_prep = Model::$pdo->prepare($sql);
  $values = array("immat" => $this->immatriculation,
                    "marque" => $marque,
                    "couleur" => $couleur);
  $req_prep->execute($values);
}



}
?>
