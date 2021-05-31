<?php
//?query=autokRendszamKolcsonozheto

namespace queries;

class Orokbefogadas extends \core\ParentUpdate {
    public function __construct($params){
        parent::__construct($params);
        $this->title = "Örökbefogadás";
        $this->sql = " UPDATE macskak SET
        Orogbefogadott = 1
        WHERE macskaId = ?";
        $this->typesString = "i";
        $this->title = "update";
        $this->paramVariables = [
            $params["macskaId"]
        ];
    }
}
