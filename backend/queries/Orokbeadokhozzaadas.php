<?php
//?query=autokRendszamKolcsonozheto

namespace queries;

class Orokbeadokhozzaadas extends \core\ParentInsert {
    public function __construct($params){
        parent::__construct($params);
        $this->title = "Örökbeadó hozzáadás";

        $nev = $params->nev;
        $this->sql = "INSERT INTO orokbeadok(
                orokbeAdoId, 
                Onev, 
                telefon,
                email,
                password
            )
            VALUE(?, ?, ?, ?, ?)";
        $this->typesString = "isiss";
        $this->paramVariables = [
            $params["orokbeAdoId"],
            $params["Onev"],
            $params["telefon"],
            $params["email"],
            $params["password"]
        ];
    }
}
