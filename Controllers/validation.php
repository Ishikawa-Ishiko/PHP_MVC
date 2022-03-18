<?php

session_start();

$error = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 氏名
    if (empty($_POST['name'])) {
        $error['name'] = '氏名は必須入力です。';
    } else if (mb_strlen($_POST['name']) > 10) {
        $error['name'] = '10文字以内でご入力ください。';
    }
    // フリガナ
    if (empty($_POST['kana'])) {
        $error['kana'] = 'フリガナは必須入力です。';
    } else if (mb_strlen($_POST['name']) > 10) {
        $error['kana'] = '10文字以内でご入力ください。';
    }
    // 電話番号
    if($_POST['tel'] && !preg_match("/\A[0-9０-９]+\z/", $_POST["tel"])){
        $error['tel'] = "電話番号は0-9の数字のでご入力ください";
    }
    // メールアドレス
    if (empty($_POST['email'])) {
        $error['email'] = 'メールアドレスは必須入力です。';
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $error['email'] = 'メールアドレスは正しくご入力ください。';
    }
    // お問い合わせ内容
    if (empty($_POST['body'])) {
        $error['body'] = 'お問い合わせ内容は必須入力です。';
    }
    // エラーなし
    if (empty($error)) {
        $_SESSION['name'] = htmlspecialchars($_POST['name'], ENT_QUOTES, "UTF-8");
        $_SESSION['kana'] = htmlspecialchars($_POST['kana'], ENT_QUOTES, "UTF-8");
        $_SESSION['tel'] = htmlspecialchars($_POST['tel'], ENT_QUOTES, "UTF-8");
        $_SESSION['email'] = htmlspecialchars($_POST['email'], ENT_QUOTES, "UTF-8");
        $_SESSION['body'] = htmlspecialchars($_POST['body'], ENT_QUOTES, "UTF-8");
        header('Location: confirm.php');
        exit();
    }
}