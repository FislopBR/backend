<?php

class Livro {
    private $titulo;
    private $autor;
    private $ano;
    private $genero;
    private $qtde;

    public function __construct($titulo, $autor, $ano, $genero, $qtde){
    $this->titulo = $titulo;
    $this->autor = $autor;
    $this->ano = $ano;
    $this->genero = $genero;
    $this->qtde = $qtde;
}

    /**
     * Get the value of titulo
     */ 
    public function gettitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     *
     * @return  self
     */ 
    public function settitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get the value of autor
     */ 
    public function getautor()
    {
        return $this->autor;
    }

    /**
     * Set the value of autor
     *
     * @return  self
     */ 
    public function setautor($autor)
    {
        $this->autor = $autor;

        return $this;
    }

    /**
     * Get the value of ano
     */ 
    public function getano()
    {
        return $this->ano;
    }

    /**
     * Set the value of ano
     *
     * @return  self
     */ 
    public function setano($ano)
    {
        $this->ano = $ano;

        return $this;
    }

    /**
     * Get the value of genero
     */ 
    public function getgenero()
    {
        return $this->genero;
    }

    /**
     * Set the value of genero
     *
     * @return  self
     */ 
    public function setgenero($genero)
    {
        $this->genero = $genero;

        return $this;
    }
    /**
     * Get the value of qtde
     */ 
    public function getQtde()
    {
        return $this->qtde;
    }

    /**
     * Set the value of qtde
     *
     * @return  self
     */ 
    public function setQtde($qtde)
    {
        $this->qtde = $qtde;

        return $this;
    }
}