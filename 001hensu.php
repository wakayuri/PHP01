<html>
    <head>
        <meta charset="utf-8">
        <title>変数</title>
    </head>
<body>

<!-- 以下にPHPを記述 -->
<?php
//変数
$name='若尾';
$last_name='祐里花';
echo $name;
echo $last_name; //concole.logの意味

//数値の変数
$age=28;
echo $age;

//改行
echo'<br>';
echo $name;

//簡単なおみくじ
$num=rand(1,2); //randomな整数を作る
if($num ==1){
    echo'当たり';
}else{
    echo'ハズレ';
}

?>



<ul>
    <li><a href="index.php">戻る</a></li>
</ul>
</body>
</html>