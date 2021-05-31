<?php
//POST
/*
    query=berloDelete
    berloId=5
*/

namespace queries;

class MacskaoltasaiDelete extends \core\ParentDelete{

    public function __construct($params){
        parent::__construct($params);
        $this->sql = "DELETE FROM macskaoltasai
                        WHERE macskaOltasId = ?";
        $this->typesString = "i";
        $this->paramVariables = [$params["macskaOltasId"]];
        $this->title = "Macska oltasai törlés";

    }

}