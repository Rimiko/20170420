<?php
  if (!empty($_POST)) {
  $nickname = htmlspecialchars($_POST['nickname']);
  $comment = htmlspecialchars($_POST['comment']);
  // １．データベースに接続する

  $dsn = 'mysql:dbname=oneline_bbs;host=localhost';
  $user = 'root';
  $password='';
  $dbh = new PDO($dsn, $user, $password);
  $dbh->query('SET NAMES utf8');
    // ２．SQL文を実行する
    $sql = 'INSERT INTO`posts`(`nickname`,`comment`,`created`) VALUES ("'.$nickname.'","'.$comment.'",now())';
    // SQLを実行
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
  }
  // ２．SQL文を実行する
  // ３．データベースを切断する
  $dbh = null;
  ?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>セブ掲示版</title>
</head>
<body>
    <form method="post" action="">
      <p><input type="text" name="nickname" placeholder="nickname"></p>
      <p><textarea type="text" name="comment" placeholder="comment"></textarea></p>
      <p><button type="submit" >つぶやく</button></p>
    </form>
    <!-- ここにニックネーム、つぶやいた内容、日付を表示する -->
    <div>
    <?php
  if (!empty($_POST)) {
  $nickname = $_POST['nickname'];
  $comment = $_POST['comment'];
}?>
    <h3>つぶやき内容</h3>
    <p>ニックネーム：<?php if (!empty($_POST)){echo $nickname;} ?></p>
    <p>コメント：<?php if (!empty($_POST)){echo $comment;} ?></p>
    </div>
</body>
</html>



