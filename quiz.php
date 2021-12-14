<?php
require_once('./question.php');

class Quiz{
    private $quizNum;
    private $quizzes = [];
    private $userAnswers;
    private $correctNum = 0;
    private $inCorrectNum;
    
    public function __construct($quizNum, $userAnswers = null)
    {
      $this->quizNum = $quizNum;
                       $this->quizzes = [
        new Question('背包', ['リュックサック', 'りんご', 'きのこ', 'くだもの'],'リュックサック'),
        new Question('蛋糕', ['もち', 'たまご', 'ケーキ', 'ちまき'], 'ケーキ'),
        new Question('退烧药', ['アスピリン', '風邪薬', '痛み止め', '解熱剤'], '解熱剤'),
        new Question('蜈蚣', ['ムカデ', 'カタツムリ', 'ミミズ', 'アリ'], 'ムカデ'),
        new Question('扣子', ['ボタン', 'ポケット', '裾', '襟'], '襟'),
        new Question('手刹', ['ブレーキ', 'アクセル', 'サイドブレーキ', 'ワイパー'], 'サイドブレーキ'),
        new Question('萝卜', ['かぶ', 'にんじん', 'だいこん', 'れんこん'], 'だいこん'),
        new Question('药方', ['診断書', 'カルテ', '処方箋', '保険証'], '処方箋'),
        new Question('考拉', ['アリクイ', 'コアラ', 'ナマケモノ', 'カンガルー'], 'コアラ'),
        new Question('争端', ['紛争', 'テロ', 'デモ', '暴動'], '紛争')
      ];

      if ($userAnswers !== null) {
        $this->userAnswers = $userAnswers;
      }
    }

public function getQuiz()
{
  return $this->quizzes[$this->quizNum];
}    

public function getCorrectNum()
{
  return $this->correctNum;
}

public function getInCorrectNum()
{
  return $this->inCorrectNum;
}

public function getTotalQuizNum()
{
  return count($this->quizzes);
}

public function getQuizzez()
{
  return $this->quizzes;
}

public function nextQuiz()
{
  if ($this->quizNum < count($this->quizzes) - 1) {
      return true;
  } else {
      return false;
  }
}

public function calculateQuizGrade()
{ 
  foreach ($this->userAnswers as $quizNum => $userAnswer) {
    $quiz = $this->quizzes[$quizNum];

    if ($userAnswer == $quiz->getCorrectAnswer()) {
      $this->correctNum++;
    }

  }
  
  //不正解数カウント
  $this->inCorrectNum = count($this->quizzes) - $this->correctNum;

 //正答率算出
  return floor($this->correctNum / count($this->quizzes) * 100);

} 

}
?>