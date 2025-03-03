<?php

class Utilisateur
{

    protected string $user_name;
    protected string $user_mail;
    protected DateTime $user_dtn;
    protected string $user_location;
    protected string $user_avatar;
    protected string $user_skill;
    protected string $user_link_git;
    protected string $user_link_web;
    protected string $user_link_ytube;



    public function __construct(
        string $userName,
        string $userMail,
        DateTime $userDtn,
        string $userLocation,
        string $userAvatar,
        string $userSkill,
        string $userLinkGit,
        string $userLinkWeb,
        string $userLinkYtube,
    ) {

        $this->user_name = $userName;
        $this->user_mail = $userMail;
        $this->user_dtn = $userDtn;
        $this->user_location = $userLocation;
        $this->user_avatar = $userAvatar;
        $this->user_skill = $userSkill;
        $this->user_link_git = $userLinkGit;
        $this->user_link_web = $userLinkWeb;
        $this->user_link_ytube = $userLinkYtube;
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
    public function getUsrDtn(): DateTime
    {
        return $this->user_dtn;
    }
    public function getUsrLocation(): string
    {
        return $this->user_location;
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
    //setters
    public function setUsrLocation(string $newLocation): string
    {
        return $this->user_location = $newLocation;
    }
    public function setUsrAvatar(string $newAvatar): string
    {
        return $this->user_avatar = $newAvatar;
    }
    public function setUsrSkill(string $newSkill): string
    {
        return $this->user_skill = $newSkill;
    }
    public function setUsrLinkGit(string $newLinkGit): string
    {
        return $this->user_link_git = $newLinkGit;
    }
    public function setUsrLinkWeb(string $newLinkWeb): string
    {
        return $this->user_link_web = $newLinkWeb;
    }
    public function setUsrLinkYtube(string $newLinkYtube): string
    {
        return $this->user_link_ytube = $newLinkYtube;
    }
}
