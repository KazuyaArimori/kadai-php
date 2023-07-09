<!DOCTYPE html>
<html>
<head>
  <title>アンケート結果</title>
  <link rel="stylesheet" href="css/read.css">
</head>
<body>
  <h1>アンケート結果</h1>
  <table>
    <tr>
      <th>名前</th>
      <th>E-mail</th>
      <th>あなたの好きなNBA球団は？</th>
      <th>あなたの好きなNBA選手は？</th>
      <th>あなたの好きなドラフト年は？</th>
      <th>最も印象に残っているプレーオフの試合は？</th>
    </tr>

<?php
// データベースへの接続情報
$servername = "localhost";
$username = "KAZUYAARIMORI";
$password = "1582kazuya";
$dbname = "kadai230710";

// データベースに接続
$conn = new mysqli($servername, $username, $password, $dbname);

// 接続エラーチェック
if ($conn->connect_error) {
  die("接続エラー: " . $conn->connect_error);
}

// 各質問の回答数をカウントする配列を初期化
$question1Count = array();
$question2Count = array();
$question3Count = array();
$question4Count = array();

// データを取得
$sql = "SELECT * FROM survey";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table>";
  //echo "<tr><th>名前</th><th>E-mail</th><th>質問1</th><th>質問2</th></tr>";
  while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['question1'] . "</td>";
    echo "<td>" . $row['question2'] . "</td>";
    echo "<td>" . $row['question3'] . "</td>";
    echo "<td>" . $row['question4'] . "</td>";
    echo "</tr>";

        // 回答をカウント
        $question1 = $row['question1'];
        if (isset($question1Count[$question1])) {
          $question1Count[$question1]++;
        } else {
          $question1Count[$question1] = 1;
        }
    
        $question2 = $row['question2'];
        if (isset($question2Count[$question2])) {
          $question2Count[$question2]++;
        } else {
          $question2Count[$question2] = 1;
        }
    
        $question3 = $row['question3'];
        if (isset($question3Count[$question3])) {
          $question3Count[$question3]++;
        } else {
          $question3Count[$question3] = 1;
        }
    
        $question4 = $row['question4'];
        if (isset($question4Count[$question4])) {
          $question4Count[$question4]++;
        } else {
          $question4Count[$question4] = 1;
        }

    // グラフを表示する要素を作成
      echo "<td><div id='chart1'></div></td>";
      echo "<td><div id='chart2'></div></td>";
      echo "<td><div id='chart3'></div></td>";
      echo "<td><div id='chart4'></div></td>";

        }
        echo "</table>";  
      } else {
        echo "データがありません。";    
    }

// データベース接続を閉じる
$conn->close();
?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawCharts);

  function drawCharts() {
    // グラフのデータを作成
    var question1Data = google.visualization.arrayToDataTable([
      ['回答', '回答数'],
      <?php
      foreach ($question1Count as $answer => $count) {
        echo "['$answer', $count],";
      }
      ?>
    ]);

    var question2Data = google.visualization.arrayToDataTable([
      ['回答', '回答数'],
      <?php
      foreach ($question2Count as $answer => $count) {
        echo "['$answer', $count],";
      }
      ?>
    ]);

    var question3Data = google.visualization.arrayToDataTable([
      ['回答', '回答数'],
      <?php
      foreach ($question3Count as $answer => $count) {
        echo "['$answer', $count],";
      }
      ?>
    ]);

    var question4Data = google.visualization.arrayToDataTable([
      ['回答', '回答数'],
      <?php
      foreach ($question4Count as $answer => $count) {
        echo "['$answer', $count],";
      }
      ?>
    ]);

    // グラフのオプションを設定
    var options = {
      'width': 400,
      'height': 300
    };

    // グラフを描画
    var chart1 = new google.visualization.PieChart(document.getElementById('chart1'));
    chart1.draw(question1Data, options);

    var chart2 = new google.visualization.PieChart(document.getElementById('chart2'));
    chart2.draw(question2Data, options);

    var chart3 = new google.visualization.PieChart(document.getElementById('chart3'));
    chart3.draw(question3Data, options);

    var chart4 = new google.visualization.PieChart(document.getElementById('chart4'));
    chart4.draw(question4Data, options);
  }
</script>
