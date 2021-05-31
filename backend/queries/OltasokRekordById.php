<?php
//?query=autoRekordById&autoId=1

namespace queries;

class OltasokRekordById extends \core\ParentRekordById {

    public function __construct($params){
        parent::__construct($params);
        $this->title = "Macska";
        $this->sql = " SELECT * FROM macskaoltasai
        INNER JOIN oltasok on oltasokId = oltasId
        WHERE macskaId = ?;";
        $this->typesString = "i";
        $this->paramVariables = [$params["macskaId"]];
        $this->columns = [
            "macskaOltasaId"=> "id",
            "macskaId"=> "macska id",
            "oltasId"=> "oltas is",
            "oltasokId"=> "oltas id",
            "oltasNev"=> "oltasok neve"
        ];
    }

}
