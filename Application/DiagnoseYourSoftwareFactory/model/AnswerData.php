<?php

class AnswerData implements JsonSerializable {

    private $idAnswerData;
    private $userAnswer;
    private $answer;
    private $question;
    private $section;
    private $userAccount;

    function __construct($idAnswerData, $userAnswer, $answer, $question, $section, $userAccount) {
        $this->idAnswerData = $idAnswerData;
        $this->userAnswer = $userAnswer;
        $this->answer = $answer;
        $this->question = $question;
        $this->section = $section;
        $this->userAccount = $userAccount;
    }

    function getIdAnswerData() {
        return $this->idAnswerData;
    }

    function getUserAnswer() {
        return $this->userAnswer;
    }

    function getAnswer() {
        return $this->answer;
    }

    function getQuestion() {
        return $this->question;
    }

    function getSection() {
        return $this->section;
    }

    function getUserAccount() {
        return $this->userAccount;
    }

    function setIdAnswerData($idAnswerData) {
        $this->idAnswerData = $idAnswerData;
    }

    function setUserAnswer($userAnswer) {
        $this->userAnswer = $userAnswer;
    }

    function setAnswer($answer) {
        $this->answer = $answer;
    }

    function setQuestion($question) {
        $this->question = $question;
    }

    function setSection($section) {
        $this->section = $section;
    }

    function setUserAccount($userAccount) {
        $this->userAccount = $userAccount;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
