<?php
//参照のみ
 class Question {
     private $questionText;
     private $questionChoices;
     private $correctAnswer;

    public function __construct($questionText, $questionChoices, $correctAnswer)
    {
        $this->questionText = $questionText;
        $this->questionChoices = $questionChoices;
        $this->correctAnswer = $correctAnswer;
    }
    
     public function getQuestionText()
     {
       return $this->questionText;
     }

     public function getQuestionChoices()
     {
       return $this->questionChoices;
     }

     public function getCorrectAnswer()
     {
       return $this->correctAnswer;
     }
 }

  

?>