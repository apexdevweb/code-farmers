<?php
require("proClass.php");
class Publicationpro extends Professionel
{

    private string $pupr_name;


    public function __construct(string $puprName, string $proName)
    {
        parent::__construct($proName);
        $this->pupr_name = $puprName;
    }

    public function getUsrName(): string
    {
        return $this->pupr_name;
    }
    public function setUsrName(string $puprNwName): string
    {
        return $this->pupr_name = $puprNwName;
    }
}
