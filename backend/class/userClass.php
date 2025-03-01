<?php

class Utilisateur
{

    protected string $user_name;
    protected string $user_mail;
    protected string $user_password;
    protected DateTime $user_dtn;
    protected string $user_location;
    protected DateTime $user_dt_insc;
    protected int $user_statut;
    protected string $user_avatar;
    protected string $user_skill;
    protected string $user_link_git;
    protected string $user_link_web;
    protected string $user_link_ytube;
    protected string $user_confirm_key;



    public function __construct(
        string $userName,
        string $userMail,
        string $userPassword,
        DateTime $userDtn,
        string $userLocation,
        DateTime $userDtInsc,
        int $userStatut,
        string $userAvatar,
        string $userSkill,
        string $userLinkGit,
        string $userLinkWeb,
        string $userLinkYtube,
        string $userConfirmKey
    ) {

        $this->user_name = $userName;
        $this->user_mail = $userMail;
        $this->user_password = $userPassword;
        $this->user_dtn = $userDtn;
        $this->user_location = $userLocation;
        $this->user_dt_insc = $userDtInsc;
        $this->user_statut = $userStatut;
        $this->user_avatar = $userAvatar;
        $this->user_skill = $userSkill;
        $this->user_link_git = $userLinkGit;
        $this->user_link_web = $userLinkWeb;
        $this->user_link_ytube = $userLinkYtube;
        $this->user_confirm_key = $userConfirmKey;
    }
    //getters
    public function getUsrName(): string
    {
        return $this->user_name;
    }
    public function getUsrMail(): string
    {
        return $this->user_mail;
    }
    public function getUsrPass(): string
    {
        return $this->user_password;
    }
    public function getUsrDtn(): DateTime
    {
        return $this->user_dtn;
    }
    public function getUsrLocation(): string
    {
        return $this->user_location;
    }
    public function getUsrDtInsc(): DateTime
    {
        return $this->user_dt_insc;
    }
    public function getUsrStatut(): int
    {
        return $this->user_statut;
    }
    public function getUsrAvatar(): string
    {
        return $this->user_avatar;
    }
    public function getUsrSkill(): string
    {
        return $this->user_skill;
    }
    public function getUsrLinkGit(): string
    {
        return $this->user_link_git;
    }
    public function getUsrLinkWeb(): string
    {
        return $this->user_link_web;
    }
    public function getUsrLinkYtube(): string
    {
        return $this->user_link_ytube;
    }
    public function getUsrConfirmkey(): string
    {
        return $this->user_confirm_key;
    }
    //setters
    public function setUsrName(string $newName): string
    {
        return $this->user_name = $newName;
    }
}
