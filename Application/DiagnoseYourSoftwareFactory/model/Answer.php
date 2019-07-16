<?php

class Answer implements JsonSerializable {

    private $idAnswer;
    private $answer;


    function getIdAnswer() {
        return $this->idAnswer;
    }

    function getAnswer() {
        return $this->answer;
    }

    function setIdAnswer($idAnswer) {
        $this->idAnswer = $idAnswer;
    }

    function setAnswer($answer) {
        $this->answer = $answer;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
