<?php
session_start();
require_once('./quiz.php');

//最初から解くときセッション空にする
if (!empty($_SESSION['reAnswer'])) {
  $_SESSION = [];
}

//ページ数管理
if (!isset($_SESSION['pageNum'])) {
  $_SESSION['pageNum'] = 1;
}

//エラーメッセージを表示するか？
if (isset($_SESSION["errorMessage"])) {
   $error = $_SESSION["errorMessage"];
   unset($_SESSION["errorMessage"]);
} else {
  $error = "";
}

//どの問題を出題するか？
$quizObject = new Quiz($_SESSION['pageNum'] - 1);
$quiz = $quizObject->getQuiz();
?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <!-- CSS only -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
</head>
<body class="container-sm mt-5 bg-info">
  <form method="POST" action="./confirm.php" id="form">
  <h2 class="text-center"><?php echo $_SESSION['pageNum'] ?>問目</h2>
    <h3 class="text-danger"><?php echo $error; ?></h3>
    <div class="form-group">
    <h2>問題:<?php echo $quiz->getQuestionText(); ?></h2>
    <div class="form-check">
    <?php foreach ($quiz->getQuestionChoices() as $key => $answer) : ?>
      <input class="form-check-input" type="radio" name="answer" value="<?php echo $answer ?>" id="answer<?php echo $key; ?>">
      <label class="form-check-label" for="answer<?php echo $key; ?>">
      <?php echo $answer ?>
      </label>
      <br>
      <?php endforeach; ?>
    </div>
      <button type="submit" class="btn btn-primary">決定</button>
    </div>
  </form>
</body>
</html>


