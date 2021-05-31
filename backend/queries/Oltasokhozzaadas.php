<?php
//?query=autokRendszamKolcsonozheto

namespace queries;

class Oltasokhozzaadas extends \core\ParentInsert {
    public function __construct($params){
        parent::__construct($params);
        $this->title = "Oltás hozzáadás";

        $nev = $params->nev;
        $this->sql = "INSERT INTO oltasok(
                oltasokId,
                oltasNev
            )
            VALUE(?, ?)";
        $this->typesString = "is";
        $this->paramVariables = [
            $params["oltasokId"],
            $params["oltasNev"]
        ];
    }
}
