<?php

class Administrateur
{
    private int $admin_id;
    private string $admin_name;
    private string $admin_mail;
    private string $admin_pass;

    public function __construct(int $admId, string $admName, string $admMail, string $admPass)
    {
        $this->admin_id = $admId;
        $this->admin_name = $admName;
        $this->admin_mail = $admMail;
        $this->admin_pass = $admPass;
    }

    public function get_id_admin(): int
    {
        return $this->admin_id;
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
