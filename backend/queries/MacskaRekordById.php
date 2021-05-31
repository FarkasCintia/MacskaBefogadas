<?php
//?query=autoRekordById&autoId=1

namespace queries;

class MacskaRekordById extends \core\ParentRekordById {

    public function __construct($params){
        parent::__construct($params);
        $this->title = "Macska";
        $this->sql = " SELECT fajtaNev, macskak.nev, macskak.macskaId, ivartalanitott, Orogbefogadott, neme, szuletesiDatum, orokbeadok.Onev, telefon, email FROM macskak 
        INNER JOIN fajtak on fajtak.fajtaId = macskak.fajtaId
        INNER JOIN orokbeadok on orokbeadok.orokbeAdoId = macskak.orokbeAdoId
        WHERE macskak.macskaId = ?;";
        $this->typesString = "i";
        $this->paramVariables = [$params["macskaId"]];
        $this->columns = [
            "macskaId"=> "id",
            "macskaNev"=> "Macska neve",
            "ivartalanitott"=> "ivartalanitott",
            "Orogbefogadott"=> "Orogbefogadott",
            "neme"=> "neme",
            "szuletesiDatum"=> "szuletesiDatum",
            "fajtaNev"=> "fajta neve",
            "Onev"=> "orokbeado neve",
            "telefon"=> "telefonszáma",
            "email"=> "email",
        ];
    }

}
