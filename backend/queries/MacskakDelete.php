<?php
//POST
/*
    query=berloDelete
    berloId=5
*/

namespace queries;

class MacskakDelete extends \core\ParentDelete{

    public function __construct($params){
        parent::__construct($params);
        $this->sql = "DELETE FROM macskak
                        WHERE macskaId = ?";
        $this->typesString = "i";
        $this->paramVariables = [$params["macskaId"]];
        $this->title = "Macskak törlés";

    }

}