<?php
require_once 'model/escape/escape.php';
///********************************************************
// paging
//********************************************************
session_start();
//********************* ログインしているか否か **************************
if (isset($_COOKIE['id'])) {
    //********************* ログアウト処理 **************************
    if (isset($_POST['logout'])) {
        setcookie('id', '', time(), -100);
        unset($_SESSION['name']);
        header('Location:index.php');
        exit;
    }
    //********************* 設定 **************************
    // *** page内の配列要素数 ***
    $show = 5;
    //********************* 初期化 **************************
    // *** pageLink初期化 ***
    $top = '';
    $last = '';
    // table index初期化
    $tableIndex = [
        'タイトル', '巻数', '値段', '発売日', '購入日'
    ];
    $search_none = '';
    $display_none = '';
    // 検索時の max 初期化
    $sqlSearch = false;
    //********************* sql接続 **************************
    // DB configの階層を指定
    require_once '../../const.php';
    $dsn = 'mysql:dbname=' . DB_NAME . ';host=' . HOST . ';charset=utf8';
    // configに各定数を記述
    try {
        $link = new PDO($dsn, USER_ID, PASSWORD);
    }
    // DB接続失敗
    catch (PDOException $err) {
        // エラー内容
        exit('DB接続エラー:' . $err->getMessage());
    }
    //********************* pageaer **************************
    // 現在のページ番号と表示する要素の番号
    if (isset($_GET['page'])) {
        $nowPage = $_GET['page'];
        $nowPageElement = $nowPage * $show;
    } else {
        // 最初のページ
        $nowPage = 0;
        $nowPageElement = 0;
    }
    //********************* 表示する要素の条件 **************************
    //********************* 検索値あり(sql文準備),なし,初回(sql文準備) **************************
    if (isset($_POST['reset'])) {
        // 検索値 cookieに 前の値がある場合削除
        setcookie("search", "", time() - 100);
        $title = '';
        $sql = "SELECT * FROM m_book
    WHERE del_date IS NULL
    ORDER BY purchase_date DESC
    LIMIT :start,:num";
        // sqlインジェクション
        $data = $link->prepare($sql);
        $sqlExe = true;
    }
    //  検索ボタン押下 || cookieに検索値あり
    elseif (isset($_POST['search']) || isset($_COOKIE['search'])) {
        // ボタン押していてかつ空文字
        if (isset($_POST['search']) && $_POST['title'] == '') {
            // 検索 element初期化
            $nowPageElement = [
                [
                    'title' => '',
                    'volume' => '',
                    'price' => '',
                    'release_date' => '',
                    'purchase_date' => ''
                ]
            ];
            setcookie("search", "", time() - 100);
            $title = '';
            $sqlExe = false;
        } // 検索文字アリ
        else {
            if (isset($_COOKIE['search'])) {
                $title = $_COOKIE['search'];
            }
            if (isset($_POST['title'])) {
                $title = $_POST['title'];
            }
            // 検索値 cookieに 前の値がある場合削除
            setcookie("search", "", time() - 100);
            // 検索時のsql文
            $sql = "SELECT * FROM m_book
        WHERE del_date IS NULL AND title LIKE :postTitle
        ORDER BY purchase_date DESC
        LIMIT :start,:num";
            // sqlインジェクション
            $data = $link->prepare($sql);
            $data->bindValue(':postTitle', "%{$title}%", PDO::PARAM_STR);
            $sqlExe = true;
            $sqlSearch = true;
            setcookie("search", $title);
        }
    }
    // 全表示
    else {
        $title = '';
        $sql = "SELECT * FROM m_book
    WHERE del_date IS NULL
    ORDER BY purchase_date DESC
    LIMIT :start,:num";
        // sqlインジェクション
        $data = $link->prepare($sql);
        $sqlExe = true;
    }
    //********************* sql文ありの場合 クエリ実行 **************************
    if ($sqlExe === true) {
        $data->bindValue(':start', $nowPageElement, PDO::PARAM_INT);
        $data->bindValue(':num', $show, PDO::PARAM_INT);
        // クエリ実行
        $data->execute();
        $nowPageElement = $data->fetchAll(PDO::FETCH_NAMED);
        // *** 現在のページの要素 ***
        foreach ($nowPageElement as $key => $val) {
            unset($nowPageElement[$key]['id']);
            unset($nowPageElement[$key]['del_date']);
        }

        //********************* 下部リンクの為の最大ページ数 **************************
        //検索値あり || 全検索でsql文割り振り
        if ($sqlSearch === true) {
            $sql = "SELECT count(*) FROM m_book
        WHERE del_date IS NULL AND title LIKE :postTitle";
            $max = $link->prepare($sql);
            $max->execute(array(':postTitle' => "%{$title}%"));
        } elseif ($sqlExe === true) {
            $max = $link->query("select count(*) from m_book");
        }
        $userList = $max->fetch(PDO::FETCH_ASSOC);
        $userList = intval($userList['count(*)']);
    }

    //********************* リンク表示 on off **************************
    // a 検索値なし&&検索結果なし || b 検索値アリ,初回
    // a リンクを非表示
    if ($sqlExe === false || empty($nowPageElement[0])) {
        $top = 'p-link_none';
        $last = 'p-link_none';
        $pageLinkNum[] = 'p-link_none';
        $display_none = 'u-display_none';
        $search_none = 'u-search_none';
    }
    // b リンクを表示
    else {
        // 最大ページ求める
        if ($userList % $show === 0) {
            $maxPage = intval($userList / $show) - 1;
        } else {
            $maxPage = intval($userList / $show);
        }
        // *** 最初のページ ***
        if ($nowPage == 0) {
            $top = 'p-link_none';
        }
        // *** 最後のページ ***
        if ($nowPage == $maxPage) {
            $last = 'p-link_none';
        }
        // *** 現在のページ ***
        for ($i = 0; $i < $maxPage + 1; $i++) {
            if ($i  == $nowPage) {
                $pageLinkNum[] = 'p-link_none';
            } else {
                $pageLinkNum[] = '';
            }
        }
    }
    require_once 'view/index.php';

    // DB接続子 停止 メモリ解放
    $link = NULL;
} else {
    // *** ログインしていなければentry.phpへ ***
    header('Location:entry.php');
    exit;
}
