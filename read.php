<?php


// // // txtバージョン
// // ファイルを開く
// $file=fopen('data/data.txt','r');

// // ファイル内容を1行ずつ読み込んで出力
// while($str=fgets($file)){
//     echo nl2br($str);
// }

// // ファイルを閉じる
// fclose($file);

//csvバージョン
$file = "data/data.csv";
if ( ( $handle = fopen ( $file, "r" ) ) !== FALSE ) {
    echo "<table>\n";
    while ( ( $data = fgetcsv ( $handle, 1000, ",", '"' ) ) !== FALSE ) {
        echo "\t<tr>\n";
        for ( $i = 0; $i < count( $data ); $i++ ) {
            echo "\t<td>{$data[$i]}</td>\n";
        }
        echo "\t</tr>\n";
    }
    echo "</table>\n";
    fclose ( $handle );
}




?>