<?php
    class CursoModelo {
        private $id;
        private $nome;
        private $area;
        private $cargaHoraria;
        private $dataFundacao;

        public function __construct ($nome, $area, $cargaHoraria, $dataFundacao) {
            $this -> nome = $nome;
            $this -> area = $area;
            $this -> cargaHoraria = $cargaHoraria;
            $this -> dataFundacao = $dataFundacao; 
        }
        public function getID () {
            return $this -> id;
        }
        public function getNome () {
            return $this -> nome;
        }
        public function getArea () {
            return $this -> area;
        }
        public function getCargaHoraria () {
            return $this -> cargaHoraria;
        }
        public function getDataFundacao () {
            return $this -> dataFundacao;
        }
        public function setID ($id) {
            $this -> id = $id;
        }
        public function setNome ($nome) {
            $this -> nome = $nome;
        }

        public function setArea ($area) {
            $this -> area = $area;
        }
        public function setCargaHoraria ($cargaHoraria) {
            $this -> cargaHoraria = $cargaHoraria;
        }
        public function setDataFundacao ($dataFundacao) {
            $this -> dataFundacao = $dataFundacao;
        }
    }
