<?php

class UserType implements JsonSerializable{

    private $idUserType;
    private $name;

    function getIdUserType() {
        return $this->idUserType;
    }

    function getName() {
        return $this->name;
    }

    function setIdUserType($idUserType) {
        $this->idUserType = $idUserType;
    }

    function setName($name) {
        $this->name = $name;
    }
    
     public function jsonSerialize() {
        return get_object_vars($this);
    }

}
