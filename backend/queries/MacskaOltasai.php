<?php
//?query=autokRendszamKolcsonozheto

namespace queries;

class MacskaOltasai extends \core\ParentTabla {
    public function __construct($params){
        parent::__construct($params);
        $this->title = "Macska Oltásai";
        $this->sql = "SELECT oltasNev
            FROM  macskaoltasai
            INNER JOIN oltasok ON macskaoltasai.oltasId = oltasok.oltasokId 
            WHERE macskaId=".$params["macskaId"];
        $this->columns = [
            "oltasNev"=> "Otlás neve",
        ];
    }
}
