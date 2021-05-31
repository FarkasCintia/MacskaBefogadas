<?php
return [
    "orokbefogadatlanMacskak" => function ($params){
        (new \queries\OrokbefogadatlanMacskak($params))->render();
    },
    "macskaOltasai" => function ($params){
        (new \queries\MacskaOltasai($params))->render();
    },
    "orokbefogadas" => function ($params){
        (new \queries\Orokbefogadas($params))->render();
    },
    "macskaHozzaadas" => function ($params){
        (new \queries\MacskaHozzaadas($params))->render();
    },
    "macskaOltasai" => function ($params){
        (new \queries\MacskaOltasai($params))->render();
    },
    "fajtakOltasai" => function ($params){
        (new \queries\FajtakDelete($params))->render();
    },
    "fajtakDelete" => function ($params){
        (new \queries\FajtakDelete($params))->render();
    },
    "fajtakT" => function ($params){
        (new \queries\FajtakT($params))->render();
    },
    "fajtakereses" => function ($params){
        (new \queries\Fajtakereses($params))->render();
    },
    "fajtakhozzaadas" => function ($params){
        (new \queries\Fajtakhozzaadas($params))->render();
    },
    "fajtakUpdate" => function ($params){
        (new \queries\FajtakUpdate($params))->render();
    },
    "macskakDelete" => function ($params){
        (new \queries\MacskakDelete($params))->render();
    },
    "macskakT" => function ($params){
        (new \queries\MacskakT($params))->render();
    },
    "macskaRekordById" => function ($params){
        (new \queries\MacskaRekordById($params))->render();
    },
    "macskaUpdate" => function ($params){
        (new \queries\MacskaUpdate($params))->render();
    },
    "macskaoltasaiDelete" => function ($params){
        (new \queries\MacskaoltasaiDelete($params))->render();
    },
    "macskaoltasaiT" => function ($params){
        (new \queries\MacskaoltasaiT($params))->render();
    },
    "macskaOltasaihozzaadas" => function ($params){
        (new \queries\MacskaOltasaihozzaadas($params))->render();
    },
    "macskaoltasaiUpdate" => function ($params){
        (new \queries\MacskaoltasaiUpdate($params))->render();
    },
    "oltasokDelete" => function ($params){
        (new \queries\OltasokDelete($params))->render();
    },
    "oltasokT" => function ($params){
        (new \queries\OltasokT($params))->render();
    },
    "oltasokUpdate" => function ($params){
        (new \queries\OltasokUpdate($params))->render();
    },
    "oltasokhozzaadas" => function ($params){
        (new \queries\Oltasokhozzaadas($params))->render();
    },
    "oltasokRekordById" => function ($params){
        (new \queries\OltasokRekordById($params))->render();
    },
    "orokbeadokDelete" => function ($params){
        (new \queries\OrokbeadokDelete($params))->render();
    },
    "orokbeadokT" => function ($params){
        (new \queries\OrokbeadokT($params))->render();
    },
    "orokbeadokhozzaadas" => function ($params){
        (new \queries\Orokbeadokhozzaadas($params))->render();
    },
    "paramsError" => function ($params){
        (new \core\ParamsError($params))->render();
    },
    "loginUser" => function ($params){
        (new \queries\LoginUser($params))->login();
    },
    "logoutUser" => function ($params){
        (new \queries\LogoutUser($params))->logout();
    },
    "getUser" => function ($params){
        (new \queries\GetUser($params))->getUser();
    }
];