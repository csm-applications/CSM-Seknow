<?php

class Permission {

    private $idPermission;
    private $role;

    function getIdPermission() {
        return $this->idPermission;
    }

    function getRole() {
        return $this->role;
    }

    function setIdPermission($idPermission) {
        $this->idPermission = $idPermission;
    }

    function setRole($role) {
        $this->role = $role;
    }

}
