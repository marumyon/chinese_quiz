<?php
require_once('./quiz.php');
session_start();

//ユーザーの答えを受け取る
$userAnswer = htmlspecialchars($_POST['answer'], ENT_QUOTES, 'UTF-8');

//ユーザーの答えを配列にいれてセッションで管理
if (isset($_SESSION['userAnswers'])) {
   array_push($_SESSION['userAnswers'], $userAnswer);
} else {
   $_SESSION['userAnswers'] = [$userAnswer];
}

$quiz = new Quiz($_SESSION['pageNum'] - 1);
 
// 質問数終わったら解答ページへ
if ($quiz->nextQuiz()) 
{
   $_SESSION['pageNum']++;
   header("Location:index.php");
   exit;
} else {
   header("Location:result.php");
   exit;
}

?>
