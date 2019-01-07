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

    public function update($data) 
    {
            if (isset($data['ID_LLIB'])) {
                $id = $data['ID_LLIB'];
            } else {
                $id = null;
            }

            if (isset($data['TITOL'])) {
                $titol = $data['TITOL'];
            } else {
                $titol = null;
            }

            if (isset($data['NUMEDICIO'])) {
                $num = $data['NUMEDICIO'];
            } else {
                $num = null;
            }

            if (isset($data['LLOCEDICIO'])) {
                $lloc = $data['LLOCEDICIO'];
            } else {
                $lloc = null;
            }

            if (isset($data['ANYEDICIO'])) {
                $any = $data['ANYEDICIO'];
            } else {
                $any = null;
            }

            if (isset($data['DESCRIP_LLIB'])) {
                $descripcio = $data['DESCRIP_LLIB'];
            } else {
                $descripcio = null;
            }

            if (isset($data['ISBN'])) {
                $isbn = $data['ISBN'];
            } else {
                $isbn = null;
            }

            if (isset($data['DEPLEGAL'])) {
                $deplegal = $data['DEPLEGAL'];
            } else {
                $deplegal = null;
            }

            if (isset($data['SIGNTOP'])) {
                $signtop = $data['SIGNTOP'];
            } else {
                $signtop = null;
            }

            if (isset($data['DATBAIXA_LLIB'])) {
                $dbaixa = $data['DATBAIXA_LLIB'];
            } else {
                $dbaixa = null;
            }

            if (isset($data['MOTIUBAIXA'])) {
                $motiuBaixa = $data['MOTIUBAIXA'];
            } else {
                $motiuBaixa = null;
            }

            if (isset($data['FK_DEPARTAMENT'])) {
                $fkdep = $data['FK_DEPARTAMENT'];
            } else {
                $fkdep = null;
            }

            if (isset($data['FK_COLLECCIO'])) {
                $fkcolleccio = $data['FK_COLLECCIO'];
            } else {
                $fkcolleccio = null;
            }

            if (isset($data['FK_IDEDIT'])) {
                $fkidedit = $data['FK_IDEDIT'];
            } else {
                $fkidedit = null;
            }

            if (isset($data['FK_LLENGUA'])) {
                $fkllengua = $data['FK_LLENGUA'];
            } else {
                $fkllengua = null;
            }

            if (isset($data['IMG_LLIB'])) {
                $imgllib = $data['IMG_LLIB'];
            } else {
                $imgllib = null;
            }

            try{
                foreach ($data as $key => $llibres) {
                $result = array();                        
                $stm = $this->conn->prepare("UPDATE llibres SET titol = :titol , numedicio = :numedicio , 
                llocedicio = :llocedicio , anyedicio = :anyedicio ,
                descrip_llib = :descrip_llib , isbn = :isbn , deplegal = :deplegal , 
                signtop = :signtop , datbaixa_llib = :datbaixa_llib ,
                motiubaixa = :motiubaixa  , fk_colleccio = :fk_colleccio  ,
                img_llib = :img_llib WHERE id_llib = :id_llib ");
                $stm->bindValue(':titol',$titol);
                $stm->bindValue(':numedicio',$num);
                $stm->bindValue(':llocedicio',$lloc);
                $stm->bindValue(':anyedicio',$any);
                $stm->bindValue(':descrip_llib',$descripcio);
                $stm->bindValue(':isbn',$isbn);
                $stm->bindValue(':deplegal',$deplegal);
                $stm->bindValue(':signtop',$signtop);
                $stm->bindValue(':datbaixa_llib',$dbaixa);
                $stm->bindValue(':motiubaixa',$motiuBaixa);
                $stm->bindValue(':fk_colleccio',$fkcolleccio);
                $stm->bindValue(':img_llib',$imgllib);
                $stm->bindValue(':id_llib',$id);
                $stm->execute();
                    
                $this->resposta->setCorrecta(true);              
                return $this->resposta;

                }
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