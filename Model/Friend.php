<?php
namespace Model;

use JsonSerializable;

class Friend implements JsonSerializable
{
    // ...
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
    //
    private $username;
    private $status;

    public function __construct($username = null){
        //initialisierung über $this-> 
        $this->username = $username;
        $this->status = null;

    }

    public function getUsername(){
        return $this->username;
    }

    public function getStatus(){
        return $this->status;
    }

    public function setAccepted() {
        $this->status = 'accepted';
    }

    public function setDismissed() {
        $this->status = 'dismissed';
    }
    //statische Methode fromJson
    public static function fromJson($data){
        $friend = new Friend();
        foreach($data as $key => $value){
            $friend->{$key} = $value;
        }
        return $friend;
    }
}
?>