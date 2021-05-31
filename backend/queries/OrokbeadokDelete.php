<?php
//POST
/*
    query=berloDelete
    berloId=5
*/

namespace queries;

class OrokbeadokDelete extends \core\ParentDelete{

    public function __construct($params){
        parent::__construct($params);
        $this->sql = "DELETE FROM orokbeadok
                        WHERE orokbeadokId = ?";
        $this->typesString = "i";
        $this->paramVariables = [$params["orokbeadokId"]];
        $this->title = "Orokbeadok törlés";

    }

}