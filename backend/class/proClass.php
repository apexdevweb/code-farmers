<?php

class Professionel
{

    private int $pro_id;
    protected string $pro_name;
    protected string $pro_mail;
    private int $pro_number;
    protected string $pro_descript;
    protected int $pro_banner;
    protected string $pro_location;
    protected DateTime $pro_dte_insc;



    public function __construct(
        int $proId,
        string $proName,
        string $proMail,
        int $proNumber,
        string $proDescript,
        int $proBanner,
        string $proLocation,
        DateTime $proDteInsc
    ) {
        $this->pro_id = $proId;
        $this->pro_name = $proName;
        $this->pro_mail = $proMail;
        $this->pro_number = $proNumber;
        $this->pro_descript = $proDescript;
        $this->pro_banner = $proBanner;
        $this->pro_location = $proLocation;
        $this->pro_dte_insc = $proDteInsc;
    }


    public function getProId(): int
    {
        return $this->pro_id;
    }
    public function getProName(): string
    {
        return $this->pro_name;
    }
    public function getProMail(): string
    {
        return $this->pro_mail;
    }
    public function getProNumber(): int
    {
        return $this->pro_number;
    }
    public function getProDescript(): string
    {
        return $this->pro_descript;
    }
    public function getProBanner(): int
    {
        return $this->pro_banner;
    }
    public function getProLocation(): string
    {
        return $this->pro_location;
    }
    public function getProInsc(): DateTime
    {
        return $this->pro_dte_insc;
    }
}
