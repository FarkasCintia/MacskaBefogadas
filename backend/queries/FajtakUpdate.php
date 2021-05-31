<?php
//?query=autokRendszamKolcsonozheto

namespace queries;

class FajtakUpdate extends \core\ParentUpdate {
    public function __construct($params){
        parent::__construct($params);
        $this->sql = "UPDATE fajtak SET 
                    fajtaId=?, fajtaNev=?
                    WHERE fajtaId = ?";
        $this->typesString = "is";
        $this->title = "Fajta update";
        $this->paramVariables = [
            $params["fajtaNev"],
            $params["fajtaId"]
        ];
    }
}
