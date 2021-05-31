<?php
//?query=autokRendszamKolcsonozheto

namespace queries;

class MacskaoltasaiUpdate extends \core\ParentUpdate {
    public function __construct($params){
        parent::__construct($params);
        $this->sql = "UPDATE macskaoltasai SET 
                    macskaId=?, oltasId=?
                    WHERE macskaOltasaId = ?";
        $this->typesString = "iii";
        $this->title = "Macskaoltasai update";
        $this->paramVariables = [
            $params["Macskaoltasai"],
            $params["macskaId"],
            $params["oltasId"]
        ];
    }
}
