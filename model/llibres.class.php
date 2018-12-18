<?php
$base = __DIR__ . '/..';
require_once("$base/lib/resposta.class.php");
require_once("$base/lib/database.class.php");

class llibre {

    private $conn;       //connexió a la base de dades (PDO)
    private $resposta;   // resposta
    
    public function __CONSTRUCT()
    {
        $this->conn = Database::getInstance()->getConnection();      
        $this->resposta = new Resposta();
    }

    public function getAll($orderby="ID_LLIB")
    {
		try{
			$result = array();                        
            $stm = $this->conn->prepare("SELECT id_llib,titol,numedicio,llocedicio,anyedicio,descrip_llib,isbn FROM llibres ORDER BY :orderby");
            $stm->bindValue(':orderby',$orderby);
			$stm->execute();
            $tuples=$stm->fetchAll();
            $this->resposta->setDades($tuples);    // array de tuples
			$this->resposta->setCorrecta(true);       // La resposta es correcta        
            return $this->resposta;
        }
        
        catch(Exception $e){   // hi ha un error posam la resposta a fals i tornam missatge d'error
			$this->resposta->setCorrecta(false, $e->getMessage());
            return $this->resposta;
		}
    } 
        
    public function getOne($id)
    {
        // TODO
        
    }

    public function filter($where, $orderby) 
    {
        // TODO

    }

    public function create()
    {
        // TODO

    }

    public function update($id)
    {

        // TODO
    }

    public function delete($id)
    {
        // TODO

    }

    public function getAutors($id)
    {

        // TODO
    }

    public function assignAutor($idLlibre, $idAutor)
    {
        // TODO

    }

    public function unassignAutor($idLlibre, $idAutor)
    {
        // TODO
    }

    
}

?>