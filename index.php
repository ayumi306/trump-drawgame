<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>trump</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/reset.css">
</head>
<body>
<?PHP

// 読み込むたびにランダムに2枚表示する

$ar_num = range(1,13);
shuffle($ar_num);
// var_dump($ar_num);
for($i = 0; $i <= 12; $i++){
  // echo "$ar_num[$i]";
  include('./cards/spade' .$ar_num[$i] .'.php');
}

// Cookieの書き込みと読み込み
// 
// setcookie("変数名",値,有効期限);
// スーパーグローバル変数 $_COOKIE

setcookie("drawn-cards",$ar_num);
var_dump($_COOKIE['drawn-cards']);


?>

</body>
</html>