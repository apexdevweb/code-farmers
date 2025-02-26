<?php

class Utilisateur
{

    protected string $user_name;


    public function __construct(string $userName)
    {

        $this->user_name = $userName;
    }

    public function getUsrName(): string
    {
        return $this->user_name;
    }
    public function setUsrName(string $newName): string
    {
        return $this->user_name = $newName;
    }
}
