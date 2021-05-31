<?php
//?query=autokRendszamKolcsonozheto

namespace queries;

class OltasokHozzaadasa extends \core\ParentInsert {
    public function __construct($params){
        parent::__construct($params);
        $this->title = "Oltasok hozzáadása";

        $nev = $params->nev;
        $this->sql = "INSERT INTO oltasok(
                oltasokId, 
                oltasNev
            )
            VALUE(?, ?)";
        $this->typesString = "is";
        $this->paramVariables = [
            $params["oltasID"],
            $params["oltasNev"]
        ];
    }
}
