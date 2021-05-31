<?php
//?query=autoRekordById&autoId=1

namespace queries;

class Fajtakereses extends \core\ParentRekordById {

    public function __construct($params){
        parent::__construct($params);
        $this->title = "Fajtak";
        $this->sql = " SELECT *  FROM macskak
        INNER JOIN fajtak on fajtak.fajtaId = macskak.fajtaId
    WHERE fajtaNev LIKE ? or nev LIKE ?;";
        $this->typesString = "ss";
        $this->paramVariables = [
            '%'. $params["search"] .'%',
            '%'. $params["search"] .'%'
            ];
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
