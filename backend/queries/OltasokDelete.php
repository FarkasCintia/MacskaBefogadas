<?php
//POST
/*
    query=berloDelete
    berloId=5
*/

namespace queries;

class OltasokDelete extends \core\ParentDelete{

    public function __construct($params){
        parent::__construct($params);
        $this->sql = "DELETE FROM oltasok
                        WHERE oltasokId = ?";
        $this->typesString = "i";
        $this->paramVariables = [$params["oltasokId"]];
        $this->title = "Oltasok törlés";

    }

}