<?php
    class CursoDao {
        private function getConexao () {
            $con = new PDO("pgsql:host=localhost;dbname=postgres;port=5432", "postgres", "postgres");
            return $con;
        }

        public function inserir ($curso) {
            $con = $this -> getConexao();

            $sql ='INSERT INTO "Curso" ("nome", "area", "cargaHoraria", "dataFundacao") 
                    VALUES (?,?,?,?) RETURNING "id"';

            $stm = $con->prepare($sql);
            $stm->bindValue(1,$curso->getNome());
            $stm->bindValue(2,$curso->getArea());
            $stm->bindValue(3,$curso->getCargaHoraria());
            $stm->bindValue(4,$curso->getDataFundacao());

            
            $res = $stm->execute();

            if($res){	
                $linha = $stm->fetch(PDO::FETCH_ASSOC);
                $curso->setID(intval($linha['id']));
            }
            else{
                echo $stm->queryString;
                var_dump($stm->errorInfo());
            }
            $stm->closeCursor();
            $stm = NULL;
            $con = NULL;
            return $res;
        }

        public function excluir ($id){
            $con = $this -> getConexao();
            $sql = 'DELETE FROM "Curso" WHERE "id" = ?';
            $stm = $con->prepare($sql);
            $stm->bindValue(1,$id);
            $res = $stm->execute();
            if(!$res){
                echo $stm->queryString;
                var_dump($stm->errorInfo());
            }
            $stm->closeCursor();
            $stm = NULL;
            $con = NULL;
            return $res;
        }

        public function busca ($id){
            $con = $this -> getConexao();
            $sql = 'SELECT * FROM "Curso" WHERE "id" = ?';
            $stm = $con->prepare($sql);
            $stm -> bindValue(1, $id);
    
            $res = $stm->execute();
            if($res){	
                $linha = $stm->fetch(PDO::FETCH_ASSOC);
                $curso = new CursoModelo($linha['nome'],$linha['area'],$linha['cargaHoraria'], $linha['dataFundacao']);
                $curso->setID(intval($linha['id']));
            }
            else{
                $curso=$res;
                echo $stm->queryString;
                var_dump($stm->errorInfo());
            }
            $stm->closeCursor();
            $stm=NULL;
            $con = NULL;
            return $curso;
        }
    
        public function lista ($limit, $offset){
            $con = $this -> getConexao();
            $sql = 'SELECT * FROM "Curso" LIMIT ? OFFSET ?';
            $stm = $con->prepare($sql);
            $stm -> bindValue(1,$limit);
            $stm -> bindValue(2,$offset);
            $res= $stm -> execute();
            $listCurso = array();
            if($res){	
                while($linha = $stm->fetch(PDO::FETCH_ASSOC)){
                    $curso = new CursoModelo($linha['nome'],$linha['area'],$linha['cargaHoraria'], $linha['dataFundacao']);
                    $curso->setID(intval($linha['id']));
                    array_push($listCurso,$curso);
                }
            }
            $stm->closeCursor();
            $stm=NULL;
            $con = NULL;
            return $listCurso;
        }

        public function altera ($curso){
            $con = $this->getConexao();
            $sql='UPDATE "Curso" SET "nome" = ?, "area" = ?, "cargaHoraria" = ?, "dataFundacao" = ? WHERE "id" = ? ';
            $stm = $con->prepare($sql);
            $stm->bindValue(1,$curso->getNome());
            $stm->bindValue(2,$curso->getArea());
            $stm->bindValue(3,$curso->getCargaHoraria());
            $stm->bindValue(4,$curso->getDataFundacao());
            $stm->bindValue(5,$curso->getID(), PDO::PARAM_INT);
            $res = $stm->execute();
            if(!$res){
                echo $stm->queryString;
                var_dump($stm->errorInfo());
            }
            $stm->closeCursor();
            $stm = NULL;
            $con = NULL;
            return $res;
        }

        public function salva ($curso, $method) {
            if ($method == 'altera') {
                return $this -> altera ($curso);
            } else if ($method === 'cria') {
                return $this -> inserir ($curso);
            }
        }
    }
