<?php
//********************************************************
//  login
//********************************************************
/** 変数初期化
 *
 */
const errMsg = [
    '' => '',
    '101' => 'ログインIDまたはパスワードが違います'
];
$errCode = '';
// *** cookieがあればログイン ***
if (isset($_COOKIE['id'])) {
    header('Location:index.php');
    exit;
}
//********************* ボタン押下 **************************
if (isset($_POST['submit'])) {
    // *** ログインID パス受け取り ***
    if (isset($_POST['login_id'])) {
        $login_id = $_POST['login_id'];
    }
    if (isset($_POST['password'])) {
        $password = $_POST['password'];
    }
    //********************* ログイン合否チェック **************************
    // *** sql接続 ***
    require_once '../../const.php';
    $dsn = 'mysql:dbname=' . DB_NAME . ';host=' . HOST . ';charset=utf8';
    try {
        $link = new PDO($dsn, USER_ID, PASSWORD);
    } catch (PDOException $err) {
        die('DB接続エラー:' . $err->getMessage());
    }
    // *** SQLインジェクション対策***
    $sql = "SELECT id,password,password_str,password_cnt FROM m_member WHERE login_id = :login_id";
    $pdo = $link->prepare($sql);
    $pdo->bindValue(':login_id', $login_id, PDO::PARAM_STR);
    // *** SQL実行 ***
    $pdo->execute();
    //********************* login_id 存在チェック **************************
    if ($userData = $pdo->fetch(PDO::FETCH_ASSOC)) {
        require_once 'model/hash/hash.php';
        // *** 成功時 cookie作成***
        if ($userData['password'] === passwordReHash($password, $userData['password_str'], $userData['password_cnt'])) {
            session_start();
            setcookie('id', $userData['id']);
            header('Location:login.php');
            exit;
        }
    }
    // *** 失敗時 エラーメッセージ***
    $errCode = '101';
}

require_once 'view/login.php';
