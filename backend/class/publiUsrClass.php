<?php
require("userClass.php");

class Publicationuser extends Utilisateur
{

    private string $pusr_name;


    public function __construct(string $pusrName, string $userName)
    {
        parent::__construct($userName);
        $this->pusr_name = $pusrName;
    }

    public function getUsrName(): string
    {
        return $this->pusr_name;
    }
    public function setUsrName(string $pusrNwName): string
    {
        return $this->pusr_name = $pusrNwName;
    }
}
