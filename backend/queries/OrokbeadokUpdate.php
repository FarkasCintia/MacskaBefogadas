<?php
//?query=autokRendszamKolcsonozheto

namespace queries;

class OrokbeadokUpdate extends \core\ParentUpdate {
    public function __construct($params){
        parent::__construct($params);
        $this->sql = "UPDATE orokbeadok SET 
                    Onev=?, telefon=?, email=?, password=?
                    WHERE orokbeAdoId = ?";
        $this->typesString = "isiss";
        $this->title = "Örökbeadók update";
        $this->paramVariables = [
            $params["orokbeAdoId"],
            $params["Onev"],
            $params["telefon"],
            $params["email"],
            $params["password"]
        ];
    }
}
