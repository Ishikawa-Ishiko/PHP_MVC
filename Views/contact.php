<?php
require_once("validation.php")
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
            <form id="form" action="" method="POST">
            <p><span class="required">*</span>は必須項目となります。</p>
            <dl>
                <dt>
                    <label for="name">氏名</label><span class=required>*</span>
                </dt>
                <div class="required">
                    <?php if (isset($error['name'])) {
                        echo $error['name'];
                    }?>
                </div>
                <dd>
                    <input type="text" name="name" id="name" value="<?php echo $_SESSION['name']??'' ?>" placeholder="山田太郎">
                </dd>
                <dt>
                    <label for="kana">フリガナ</label><span class="required">*</span>
                </dt>
                <div class="required">
                    <?php if (isset($error['kana'])) {
                        echo $error['kana'];
                    }?>
                </div>
                <dd>
                    <input type="text" name="kana" id="kana" value="<?php echo $_SESSION['kana']??'' ?>" placeholder="ヤマダタロウ">
                </dd>
                <dt>
                    <label for="tel">電話番号</label>
                </dt>
                <div class="required">
                    <?php if (isset($error['tel'])) {
                        echo $error['tel'];
                    }?>
                </div>
                <dd>
                    <input type="text" name="tel" id="tel" value="<?php echo $_SESSION['tel']??'' ?>" placeholder="09012345678">
                </dd>
                <dt>
                    <label for="email">メールアドレス</label><span class="required">*</span>
                </dt>
                <div class="required">
                    <?php if (isset($error['email'])) {
                        echo $error['email'];
                    }?>
                </div>
                <dd>
                    <input type="text" name="email" id="email" value="<?php echo $_SESSION['email']??'' ?>" placeholder="test@test.co.jp">
                </dd>
            </dl>
            <h3>お問い合わせ内容をご記入ください<span class="required">*</span></h3>
            <dl class=body>
                <div class="required">
                    <?php if (isset($error['body'])) {
                        echo $error['body'];
                    }?>
                </div>
                <dd><textarea name="body" id="body"><?php print($_SESSION["body"]??''); ?></textarea></dd>
                <dd><button type="submit">送　信</button></dd>
            </dl>
            </form>
        </div>
    </section>
    <script type="text/javascript" src="validation.js"></script>
</body>
</html>