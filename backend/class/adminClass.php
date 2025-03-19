<?php

class Administrateur
{
    private string $admin_name;
    private string $admin_mail;
    private string $admin_pass;

    public function __construct(string $admName, string $admMail, string $admPass)
    {
        $this->admin_name = $admName;
        $this->admin_mail = $admMail;
        $this->admin_pass = $admPass;
    }

    public function get_name_admin(): string
    {
        return $this->admin_name;
    }
    public function get_mail_admin(): string
    {
        return $this->admin_mail;
    }
    public function get_pass_admin(): string
    {
        return $this->admin_pass;
    }
}


// $admName = "scriptenjoyer";
// $admMail = "scriptenjoyer@gmail.com";
// $admPass = "%K4l2mV4ZdrTv5#10";


// $supremeAdmin = new Administrateur($admName, $admMail, $admPass);

// $_SESSION["admin"] = $supremeAdmin->get_name_admin();
