<?php
//?query=autokRendszamKolcsonozheto

namespace queries;

class Macskahozzaadas extends \core\ParentInsert {
    public function __construct($params){
        parent::__construct($params);
        $this->title = "Macska hozzáadás";

        $nev = $params->nev;
        $this->sql = "INSERT INTO macskak(
                nev, 
                ivartalanitott, 
                fajtaId,
                orokbeAdoId,
                neme,
                szuletesiDatum
            )
            VALUE(?, ?, ?, ?, ?, ?)";
        $this->typesString = "siiiis";
        $this->paramVariables = [
            $params["nev"],
            $params["ivartalanitott"],
            $params["fajtaId"],
            $params["orokbeAdoId"],
            $params["neme"],
            $params["szuletesiDatum"]
        ];
    }
}
