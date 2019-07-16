<?php

class Company implements JsonSerializable {

    private $idCompany;
    private $name;
    private $phone;
    private $foundationDate;
    private $description;
    private $owner;
    private $employees;

    function getIdCompany() {
        return $this->idCompany;
    }

    function getName() {
        return $this->name;
    }

    function getPhone() {
        return $this->phone;
    }

    function getFoundationDate() {
        return $this->foundationDate;
    }

    function getDescription() {
        return $this->description;
    }

    function getOwner() {
        return $this->owner;
    }

    function getEmployees() {
        return $this->employees;
    }

    function setIdCompany($idCompany) {
        $this->idCompany = $idCompany;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setPhone($phone) {
        $this->phone = $phone;
    }

    function setFoundationDate($foundationDate) {
        $this->foundationDate = $foundationDate;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setOwner($owner) {
        $this->owner = $owner;
    }

    function setEmployees($employees) {
        $this->employees = $employees;
    }

    
    
    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
