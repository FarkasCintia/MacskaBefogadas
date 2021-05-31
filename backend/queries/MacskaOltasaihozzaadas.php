<?php
//?query=autokRendszamKolcsonozheto

namespace queries;

class MacskaOltasaihozzaadas extends \core\ParentInsert {
    public function __construct($params){
        parent::__construct($params);
        $this->title = "Macska hozzáadás";

        $nev = $params->nev;
        $this->sql = "INSERT INTO macskaoltasai(
                macskaOltasaId, 
                macskaId, 
                oltasId
            )
            VALUE(?, ?, ?)";
        $this->typesString = "iii";
        $this->paramVariables = [
            $params["macskaOltasaId"],
            $params["macskaId"],
            $params["oltasId"]
        ];
    }
}
