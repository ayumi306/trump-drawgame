<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
  <title>trump</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/reset.css">
  <script language="javascript" type="text/javascript">
    function OnLinkClick () {
      document.cardForm.submit()
      return false
    }
  </script>
</head>
<body>
  
  <?PHP
  session_start();
  
  if(!isset($_SESSION['cards']) || isset($_POST['reset'])){
    $_SESSION['cards'] = [];
  }
  
  
  // クリックすると山札から1枚ずつ引いていき、既存のカードも表示されるようにする
    
  $deck = range(0,52);
  // セッションに入っているものを除いた山札を作る
  $drawnDeck = array_diff($deck, $_SESSION['cards']);
  if(isset($_POST['draw'])){
    shuffle($drawnDeck);
    // sort($drawnDeck);
    array_push($_SESSION['cards'], $drawnDeck[0]);
  }
  ?>

  <div class="card-area">
    <?PHP
    foreach ($_SESSION['cards'] as $existingCard){
      include('./cards/'.$existingCard .'.php' );
  }  ?>
  </div>

  <div class="deck-area">
    <div class="explanation">
      山札をクリックすると53枚（&spades;1~13、&hearts;1~13、&clubs;1~13、&diams;1~13、JOKER）のカードの中からランダムに1枚表示されます。</br>
      カードがなくなるか、最初からやり直したいときはリセットボタンをクリックしてください。
    </div>
    <div>
      <form method="post">
        <input type="submit" name="reset" value="リセット" class="reset-button">
      </form>
    </div>
    <div>
    <form method="post" name="cardForm" id="cardForm">
      <input type="hidden" name="draw" value="山札をめくる">
      <?PHP 
      if (!$drawnDeck == []): ?>
      <a href="javascript:OnLinkClick()" style="display: inline-block" class="deck">
        <?PHP include('./cards/53.php');?>
      </a>
      <?PHP endif; ?>
    </form>
    </div>
  </div>
</body>
</html>