<?php

class Question implements JsonSerializable {

    private $idQuestion;
    private $question;
    private $groupofanswer;

    function getIdQuestion() {
        return $this->idQuestion;
    }

    function getQuestion() {
        return $this->question;
    }

    function getGroupofanswer() {
        return $this->groupofanswer;
    }

    function setIdQuestion($idQuestion) {
        $this->idQuestion = $idQuestion;
    }

    function setQuestion($question) {
        $this->question = $question;
    }

    function setGroupofanswer($groupofanswer) {
        $this->groupofanswer = $groupofanswer;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
