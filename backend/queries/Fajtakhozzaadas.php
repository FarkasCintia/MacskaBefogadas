<?php
//?query=autokRendszamKolcsonozheto

namespace queries;

class Fajtakhozzaadas extends \core\ParentInsert {
    public function __construct($params){
        parent::__construct($params);
        $this->title = "Fajta hozzáadás";

        $nev = $params->nev;
        $this->sql = "INSERT INTO fajtak(
                fajtaId,
                fajtaNev
            )
            VALUE(?, ?)";
        $this->typesString = "is";
        $this->paramVariables = [
            $params["fajtaId"],
            $params["fajtaNev"]
        ];
    }
}
