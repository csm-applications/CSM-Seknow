<?php

class Grouping {

    private $idGroup;
    private $name;
    private $permissionList;

    function getIdGroup() {
        return $this->idGroup;
    }

    function getName() {
        return $this->name;
    }

    function getPermissionList() {
        return $this->permissionList;
    }

    function setIdGroup($idGroup) {
        $this->idGroup = $idGroup;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setPermissionList($permissionList) {
        $this->permissionList = $permissionList;
    }

}
