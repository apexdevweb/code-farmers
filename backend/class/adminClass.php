<?php

class Administrateur
{
    private string $admin_name;
    private string $admin_mail;
    private  int $admin_age;

    public function __construct(string $admName, string $admMail, int $admAge)
    {
        $this->admin_name = $admName;
        $this->admin_mail = $admMail;
        $this->admin_age = $admAge;
    }

    public function get_name_admin(): string
    {
        return $this->admin_name;
    }
    public function get_mail_admin(): string
    {
        return $this->admin_mail;
    }
    public function get_age_admin(): int
    {
        return $this->admin_age;
    }
}


$admName = "scriptenjoyer";
$admMail = "scriptenjoyer@gmail.com";
$admAge = $date->diff($date_naiss)->y;


$supremeAdmin = new Administrateur($admName, $admin_mail, $admAge);
