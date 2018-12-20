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
        try
        {
            $stm = $this->conn->prepare("SELECT id_llib,titol,numedicio,llocedicio,anyedicio,descrip_llib,isbn FROM llibres where ID_LLIB = :idLlib");
            $stm->bindValue(":idLlib",$id);
            $stm->execute();
            $result = $stm->fetchObject('llibre');
            $this->resposta->setDades($result);
            $this->resposta->setCorrecta(true);      
            return $this->resposta;
        }
        catch(Exception $e)
        {
            $this->resposta->setCorrecta(false, $e->getMessage());
            return $this->resposta;
        }
        
    }

    public function filter($where, $orderby) 
    {
        // TODO

    }

    public function create()
    {
        // TODO

    }

    public function update($id,$valor)
    {

        try{
			$result = array();                        
            $stm = $this->conn->prepare("UPDATE llibres SET titol = '$valor' WHERE id_llib = $id ORDER BY :orderby");
            $stm->bindValue(':orderby',$orderby);
			$stm->execute();
            $tuples=$stm->fetchAll();
            $this->resposta->setDades($tuples);    
			$this->resposta->setCorrecta(true);              
            return $this->resposta;
        }
        
        catch(Exception $e){   
			$this->resposta->setCorrecta(false, $e->getMessage());
            return $this->resposta;
        }
        
    }

    public function delete($id)
    {
        // TODO

    }

    public function getAutors($id)
    {
        try
        {
            $stm = $this->conn->prepare("SELECT autors.NOM_AUT FROM autors,lli_aut,llibres where llibres.ID_LLIB = :idLlib AND llibres.ID_LLIB = lli_aut.FK_IDLLIB AND autors.ID_AUT = lli_aut.FK_IDAUT");
            $stm->bindValue(":idLlib",$id);
            $stm->execute();
            $result = $stm->fetchAll();
            $this->resposta->setDades($result);
            $this->resposta->setCorrecta(true);      
            return $this->resposta;
        }
        catch(Exception $e)
        {
            $this->resposta->setCorrecta(false, $e->getMessage());
            return $this->resposta;
        }
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