<?php
require 'validation.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<section>
      <div class="contact_box">
        <h2>お問い合わせ</h2>
        <form action="complete.php" method="post">
          <p>下記の内容をご確認の上送信ボタンを押してください</p>
          <p>内容を訂正する場合は戻るを押してください。</p>
          <dl class="confirm">
            <dt>
              <label for="name">氏名</label>
            </dt>
            <dd>
              <?php echo $_SESSION['name']; ?>
            </dd>
            <dt>
              <label for="kana">フリガナ</label>
            </dt>
            <dd>
              <?php echo $_SESSION['kana']; ?>
            </dd>
            <dt>
              <label for="tel">電話番号</label>
            </dt>
            <dd>
              <?php echo $_SESSION['tel']; ?>
            </dd>
            <dt>
              <label for="email">メールアドレス</label>
            </dt>
            <dd>
              <?php echo $_SESSION['email']; ?>
            </dd>
            <dt>
              <label for="body">お問い合わせ内容：</label>
            </dt>
            <dd>
              <?php echo nl2br($_SESSION['body']); ?>
            </dd>
            <dd class="confirm_btn">
              <button type="submit">送　信</button>
              <a href="contact.php">戻　る</a>
            </dd>
          </dl>
        </form>
      </div>
    </section>
</body>
</html>