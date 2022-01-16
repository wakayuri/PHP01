<?php

//フォームから送られたデータを受け取る
$name=$_POST['name'];
$mail=$_POST['mail'];
$food = $_POST['food'];


//日付を取得

$time=date('Y-m-d H:i:s');

// // txtバージョン
// //データを変数にまとめる
// $str=$time . '/' . $name. '/' . $mail. '/' . $gender;


// //file書き込み
// $file=fopen('data/data.txt','a');//ファイルを開いて読み込み
// fwrite($file,$str . "\n");//ファイルへの書き込み
// fclose($file);//ファイルを閉じる

// csvバージョン
$data = array($time,$name,$mail,$food);

$file = fopen('data/data.csv', 'a');
 
$line = implode(',' , $data);
fwrite($file, $line . "\n");

fclose($file);

?>


<html>
<head>
    <meta charset="utf-8">
    <title>File書き込み</title>
</head>
<body>

<h1>書き込みしました。</h1>
<h2>./data/data.txt を確認しましょう！</h2>

<ul>
    <li><a href="index.php">戻る</a></li>
    <li><a href="read.php">集計結果へ</a></li>
</ul>

</body>
</html>