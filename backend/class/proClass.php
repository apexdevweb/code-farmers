<?php

class Professionel
{

    protected string $pro_name;


    public function __construct(string $proName)
    {
        $this->pro_name = $proName;
    }


    public function getUsrName(): string
    {
        return $this->pro_name;
    }
    public function setUsrName(string $proNwName): string
    {
        return $this->pro_name = $proNwName;
    }
}
