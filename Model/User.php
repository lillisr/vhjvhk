<?php
namespace Model;

use JsonSerializable;

class User implements JsonSerializable
{

    // Teilaufgabe i:

    private $firstName;
    private $lastName;
    private $coffeeOrTea;

    //getter für diese Attribute

    public function getFirstName()
    {
        return $this->firstName;
    }
    public function getLasttName()
    {
        return $this->lastName;
    }
    public function getCoffeeorTea()
    {
        return $this->coffeeOrTea;
    }

    //setter für diese atribute

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function setLastName($lastname)
    {
        $this->lastName = $lastName;
    }
    public function setCoffeeOrTea($coffeeOrTea)
    {
        $this->coffeeOrTea = $coffeeOrTea;
    }

// ende Teilaufgabe i
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