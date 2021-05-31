<?php
//?query=autokRendszamKolcsonozheto

namespace queries;

class OltasokUpdate extends \core\ParentUpdate {
    public function __construct($params){
        parent::__construct($params);
        $this->sql = "UPDATE oltasok SET 
                    oltasokId=?, oltasNev=?
                    WHERE oltasokId = ?";
        $this->typesString = "is";
        $this->title = "oltás update";
        $this->paramVariables = [
            $params["oltasNev"],
            $params["oltasokId"]
        ];
    }
}
