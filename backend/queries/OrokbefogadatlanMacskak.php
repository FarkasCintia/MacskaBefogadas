<?php
//?query=autokRendszamKolcsonozheto

namespace queries;

class OrokbefogadatlanMacskak extends \core\ParentTabla {
    public function __construct($params){
        parent::__construct($params);
        $this->title = "Örökbefogadatlan Macskák";
        $this->sql = "SELECT macskaId, macskak.nev as macskaNev, ivartalanitott, neme, szuletesiDatum, fajtaNev, orokbeadok.nev as orokbeAdoNev 
            FROM macskak 
            INNER JOIN fajtak ON macskak.fajtaId = fajtak.fajtaId 
            INNER JOIN orokbeadok ON macskak.orokbeAdoId = orokbeadok.orokbeAdoId 
            WHERE Orogbefogadott = 0";
        $this->columns = [
            "macskaId"=> "id",
            "macskaNev"=> "Macska neve",
            "ivartalanitott"=> "0 / 1 (Nem / igen)",
            "neme"=> "0 / 1 (Fiú / lány)",
            "fajtaNev"=> "Fajta neve",
            "orokbeAdoNev"=> "Örökbeadó neve",
            "szuletesiDatum"=> "Macska születési dátuma"
        ];
    }
}
