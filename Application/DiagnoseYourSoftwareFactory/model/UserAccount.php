<?php

class UserAccount implements JsonSerializable {

    private $idUserAccount;
    private $nome;
    private $email;
    private $password;
    private $phone;
    private $gender;
    private $active;
    private $birthDate;
    private $companyId;
    private $startWork;
    private $grouping;
    private $userType;

    function getIdUserAccount() {
        return $this->idUserAccount;
    }

    function getNome() {
        return $this->nome;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function getPhone() {
        return $this->phone;
    }

    function getGender() {
        return $this->gender;
    }

    function getActive() {
        return $this->active;
    }

    function getBirthDate() {
        return $this->birthDate;
    }

    function getStartWork() {
        return $this->startWork;
    }

    function getGrouping() {
        return $this->grouping;
    }

    function getUserType() {
        return $this->userType;
    }

    function setIdUserAccount($idUserAccount) {
        $this->idUserAccount = $idUserAccount;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setPhone($phone) {
        $this->phone = $phone;
    }

    function setGender($gender) {
        $this->gender = $gender;
    }

    function setActive($active) {
        $this->active = $active;
    }

    function setBirthDate($birthDate) {
        $this->birthDate = $birthDate;
    }

    function setStartWork($startWork) {
        $this->startWork = $startWork;
    }

    function setGrouping($grouping) {
        $this->grouping = $grouping;
    }

    function setUserType($userType) {
        $this->userType = $userType;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }
    
    function getCompanyId() {
        return $this->companyId;
    }

    function setCompanyId($companyId) {
        $this->companyId = $companyId;
    }



}
