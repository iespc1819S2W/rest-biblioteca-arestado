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
        try {
            $stm = $this->conn->prepare("delete from llibres where id_llib = :id_llib");
            $stm->bindValue(':id_llib',(int) $id);            
            $stm->execute();
            $this->resposta->setCorrecta(true);
            return $this->resposta;
        } catch (Exception $e) {
            $this->resposta->setCorrecta(false, $e->getMessage());
            return $this->resposta;
        }

    }

    public function getAutors($id)
    {

        // TODO
    }

    public function assignAutor($idLlibre, $idAutor)
    {
        try
        {
            $sql = "INSERT INTO LLI_AUT (FK_IDAUT) VALUES (:ID_AUT) WHERE FK_IDLLIB = :ID_LLIB";
            $stm=$this->conn->prepare($sql);
            $stm->bindValue(':ID_LLIB', $idLlibre);
            $stm->bindValue(':ID_AUT', $idAutor);
            $stm->execute();
        
            $this->resposta->setCorrecta(true);
            return $this->resposta;
        }
        catch (Exception $e) 
        {
            $this->resposta->setCorrecta(false, "Error assignant: " . $e->getMessage());
            return $this->resposta;
        } 
    }

    public function unassignAutor($idLlibre, $idAutor)
    {
        // TODO
    }


}

?>