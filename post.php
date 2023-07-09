<!DOCTYPE html>
<html>
<head>
  <title>アンケート入力</title>
  <link rel="stylesheet" href="css/post.css">
</head>
<body>
  <h1>アンケート入力</h1>
  <form action="write.php" method="POST">
    <label for="name">名前:</label>
    <input type="text" name="name" required><br>

    <label for="email">E-mail:</label>
    <input type="email" name="email" required><br>

    <label for="question1">あなたの好きなNBA球団は？:</label>
    <input type="text" name="question1" required><br>

    <label for="question2">あなたの好きなNBA選手は？:</label>
    <input type="text" name="question2" required><br>

    <label for="question3">あなたの好きなドラフト年は？:</label>
    <input type="text" name="question3" required><br>

    <label for="question4">最も印象に残っているプレーオフの試合は？:</label>
    <input type="text" name="question4" required><br>

    <input type="submit" value="送信">
  </form>
</body>
</html>
