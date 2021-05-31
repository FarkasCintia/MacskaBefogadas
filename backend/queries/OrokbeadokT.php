<?php
//?query=autokRendszamKolcsonozheto

namespace queries;

class OrokbeadokT extends \core\ParentTabla {
    public function __construct($params){
        parent::__construct($params);
        $this->title = "Orokbeadok tábla";
        $this->sql = "SELECT orokbeadoId, Onev, telefon, email FROM orokbeadok";
        $this->columns = [
            "orokbeadoId"=> "id",
            "Onev"=> "orokbeado neve",
            "telefon"=> "telefonszáma",
            "email"=> "email",
            "password"=> "password "
        ];
    }
}
