<?php
namespace Model;

use JsonSerializable;

class User implements JsonSerializable
{
    // ...
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    //
    private $username;

    public function __construct($username = null){
        //initialisierung über $this-> default 0??
        $this->username = $username;

    }

    public function getUsername(){
        return $this->username;
    }


    //statische Methode fromJson
    public static function fromJson($data){
        $user = new User();
        foreach($data as $key => $value){
            $user->{$key} = $value;
        }
        return $user;
    }
}
?>