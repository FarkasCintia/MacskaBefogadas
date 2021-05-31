<?php
//?query=autokRendszamKolcsonozheto

namespace queries;

class FajtakT extends \core\ParentTabla {
    public function __construct($params){
        parent::__construct($params);
        $this->title = "fajtak tábla";
        $this->sql = "SELECT *  FROM fajtak";
        $this->columns = [
            "fajtaId"=> "id",
            "fajtaNev"=> "fajta neve"
        ];
    }
}
