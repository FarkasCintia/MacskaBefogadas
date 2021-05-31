<?php
//?query=autokRendszamKolcsonozheto

namespace queries;

class OltasokT extends \core\ParentTabla {
    public function __construct($params){
        parent::__construct($params);
        $this->title = "oltasok tábla";
        $this->sql = "SELECT *  FROM oltasok";
        $this->columns = [
            "oltasokId"=> "oltas id",
            "oltasNev"=> "oltasok neve"
        ];
    }
}
