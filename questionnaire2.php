<h1>アンケート結果</h1>
<?php
//入力値に不正なデータがないかなどをチェックする関数
function checkInput($var){
  if(is_array($var)){
    //$var が配列の場合、checkInput()関数をそれぞれの要素について呼び出す
    return array_map('checkInput', $var);
  }else{
    //PHP 7.4.x で get_magic_quotes_gpc() は非推奨になりました
    //php.iniでmagic_quotes_gpcが「on」の場合の対策
    /*if(get_magic_quotes_gpc()){  
      $var = stripslashes($var);
    }*/
    //NULLバイト攻撃対策
    if(preg_match('/\0/', $var)){  
      die('不正な入力（NULLバイト）です。');
    }
    //文字エンコードのチェック
    if(!mb_check_encoding($var, 'UTF-8')){ 
      die('不正な文字エンコードです。');
    }
    //数値かどうかのチェック 
    if(!ctype_digit($var)) {  
      die('不正な入力です。');
    }
    return (int)$var;
  }
}
 
//POSTされた全てのデータをチェック
$_POST = checkInput($_POST);
 
$error = 0;  //変数の初期化
 
//性別の入力の検証
if(isset($_POST['gender'])) {
  $gender = $_POST['gender'];
  if($gender == 1) {
    $gendername = '男性';
  }elseif($gender == 2) {
    $gendername = '女性';
  }else{
    $error = 1;  //入力エラー（値が 1 または 2 以外）
  }
}else{
  $error = 1;  //入力エラー（値が未定義）
}
 
//年齢の入力の検証
if(isset($_POST['age'])) {
  $age = $_POST['age'];
  if($age < 1 || $age > 8 ) {
    $error = 1;  //入力エラー（値が1-8以外）
  }
}else{
   $error = 1;  //入力エラー（値が未定義）
}
 
//趣味の入力の検証
if(isset($_POST['hobby'])) {
  $hobby = $_POST['hobby'];
  if(is_array($hobby)) {
    foreach($hobby as $value) {
      if($value < 0 || $value > 7) {
        $error = 1;  //入力エラー（値が0-7以外）
      }
    }
  }else{
    $error = 1;  //入力エラー（値が配列ではない）
  }
}else{
  $error = 1;  //入力エラー（値が未定義）
}
 
//エラーがない場合の処理（結果の表示）
if($error == 0) {
  echo '<dl>';
  echo '<dt>性別：</dt><dd>' . $gendername . '</dd>';  
  
  //年齢の値で分岐
  if($age != 8) {
    echo '<dt>年齢：</dt><dd>' . $age . '0代</dd>';
  }else{
    echo '<dt>年齢：</dt><dd>80代以上</dd>';
  }
  
  //foreach で配列の数だけ繰り返し処理
  echo '<dt>趣味：</dt>';
  echo '<dd>';
  foreach($hobby as $value) {
    switch($value) {
      case 0:
        echo '音楽<br>';
        break;
      case 1:
        echo 'スポーツ<br>';
        break;
      case 2:
        echo '車<br>';
        break;
      case 3:
        echo 'アート<br>';
        break;
      case 4:
        echo '旅行<br>';
        break;
      case 5:
        echo 'カメラ<br>';
        break;
      case 6:
        echo '読書<br>';
        break;
      case 7:
        echo 'その他<br>';
        break;
    }
  }
  echo '</dd></dl>';
  
  //アンケート結果を保存する処理（省略→次項に記載）
　・・・・・・
 
  echo '<p class="message sucess">以上の内容を保存しました。<br>アンケートにご協力いただきありがとうございました！</p>'; 
}else{
  echo '<p class="message error">恐れ入りますがアンケート入力ページに戻り、アンケートの項目全てにお答えください。</p>';
}
?>
