<?php
//********************************************************
// m_memberの情報登録
//********************************************************
$err = [];
//********************* 送信ボタン押した **************************
if (isset($_POST['submit'])) {
    //********************* 氏名 ID PASS受け取り && バリデーション **************************
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
    }
    if (isset($_POST['login_id'])) {
        $login_id = $_POST['login_id'];
    }
    if (isset($_POST['password'])) {
        $password = $_POST['password'];
    }
    //********************* DB登録 **************************
    if (count($err) === 0) {
        // *** sql接続 ***
        require_once '../../const.php';
        $dsn = 'mysql:dbname=' . DB_NAME . ';host=' . HOST . ';charset=utf8';
        try {
            $link = new PDO($dsn, USER_ID, PASSWORD);
            $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $err) {
            die('DB接続エラー:' . $err->getMessage());
        }
        // *** ハッシュ化 ***
        require_once 'model/hash/hash.php';
        list($hashedPass, $password_str, $password_cnt) = passwordHash($password);
        // *** SQL文準備 ***
        $sql = "INSERT INTO m_member (name,login_id,password,password_str,password_cnt)VALUES(:name,:login_id,:password,:password_str,:password_cnt)";
        // *** SQLインジェクション対策 ***
        $data = $link->prepare($sql);
        $data->bindValue(':name', $name, PDO::PARAM_STR);
        $data->bindValue(':login_id', $login_id, PDO::PARAM_STR);
        $data->bindValue(':password', $hashedPass, PDO::PARAM_STR);
        $data->bindValue(':password_str', $password_str, PDO::PARAM_STR);
        $data->bindValue(':password_cnt', $password_cnt, PDO::PARAM_INT);
        $data->execute();
        // *** complete.phpへ遷移 ***
        header('Location:complete.php');
        exit;
    }
}

require_once 'view/entry.php';
