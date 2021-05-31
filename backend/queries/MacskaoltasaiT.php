<?php
//?query=autokRendszamKolcsonozheto

namespace queries;

class MacskaoltasaiT extends \core\ParentTabla {
    public function __construct($params){
        parent::__construct($params);
        $this->title = "macska oltasai tábla";
        $this->sql = "SELECT *  FROM macskaoltasai";
        $this->columns = [
            "macskaOltasaId"=> "id",
            "macskaId"=> "macska id",
            "oltasId"=> "oltas is"
        ];
    }
}
