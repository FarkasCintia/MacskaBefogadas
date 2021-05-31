<?php
//POST
/*
    query=berloDelete
    berloId=5
*/

namespace queries;

class FajtakDelete extends \core\ParentDelete{

    public function __construct($params){
        parent::__construct($params);
        $this->sql = "DELETE FROM fajtak
                        WHERE fajtaId = ?";
        $this->typesString = "i";
        $this->paramVariables = [$params["fajtaId"]];
        $this->title = "Fajtak törlés";

    }

}