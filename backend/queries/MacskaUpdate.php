<?php
//?query=autokRendszamKolcsonozheto

namespace queries;

class MacskaUpdate extends \core\ParentUpdate {
    public function __construct($params){
        parent::__construct($params);
        $this->sql = "UPDATE macskak SET 
                    nev=?, ivartalanitott=?, fajtaId=?, orokbeAdoId=?, neme=?, szuletesiDatum=?, kep=?
                    WHERE macskaId = ?";
        $this->typesString = "siiiissi";
        $this->title = "Macska update";
        $this->paramVariables = [
            $params["nev"],
            $params["ivartalanitott"],
            $params["fajtaId"],
            $params["orokbeAdoId"],
            $params["neme"],
            $params["szuletesiDatum"],
            $params["kep"],
            $params["macskaId"]
        ];
    }
}
