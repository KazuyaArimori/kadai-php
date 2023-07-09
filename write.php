<!DOCTYPE html>
<html>
<head>
  <title>登録完了</title>
  <link rel="stylesheet" href="css/write.css">
</head>
<body>
  <h1>登録完了</h1>
<?php

// データベースへの接続情報
$servername = "localhost";
$username = "KAZUYAARIMORI";
$password = "1582kazuya";
$dbname = "kadai230710";

// フォームからのデータを受け取る
$name = $_POST['name'];
$email = $_POST['email'];
$question1 = $_POST['question1'];
$question2 = $_POST['question2'];
$question3 = $_POST['question3'];
$question4 = $_POST['question4'];

// データベースに接続
$conn = new mysqli($servername, $username, $password, $dbname);

// 接続エラーチェック
if ($conn->connect_error) {
  die("接続エラー: " . $conn->connect_error);
}

// データをデータベースに挿入
$sql = "INSERT INTO survey (name, email, question1, question2, question3, question4) VALUES ('$name', '$email', '$question1', '$question2','$question3','$question4')";

if ($conn->query($sql) === TRUE) {
  echo "データが正常に登録されました。";
} else {
  echo "エラー: " . $sql . "<br>" . $conn->error;
}

// データベース接続を閉じる
$conn->close();
?>
