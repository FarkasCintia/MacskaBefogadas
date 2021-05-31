<?php
//?query=autokRendszamKolcsonozheto

namespace queries;

class MacskakT extends \core\ParentTabla {
    public function __construct($params){
        parent::__construct($params);
        $this->title = "Macskák tábla";
        $this->sql = "SELECT *  FROM macskak
        INNER JOIN fajtak on fajtak.fajtaId = macskak.fajtaId";
        $this->columns = [
            "macskaId"=> "id",
            "macskaNev"=> "Macska neve",
            "ivartalanitott"=> "ivartalanitott",
            "fajtaId"=> "FajtaId",
            "orokbeAdoId"=> "orokbeAdoId ",
            "Orogbefogadott"=> "Orogbefogadott",
            "neme"=> "neme",
            "szuletesiDatum"=> "szuletesiDatum",
            "kep" => "kép",
            "fajtaId"=> "id",
            "fajtaNev"=> "fajta neve"
        ];
    }
}
