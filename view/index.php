<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index.php</title>
    <link rel="stylesheet" type="text/css" href="css/import.css">
</head>

<body>
    <aside>
        <ul>
            <li class="c-transform-bottom">
                <div id="aside-nav"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#FFF" stroke-width="0.5" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg></div>
            </li>
            <li class="c-transform-bottom">
                <form method="post">
                    <button type="submit" name="logout"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M10 3H6a2 2 0 0 0-2 2v14c0 1.1.9 2 2 2h4M16 17l5-5-5-5M19.8 12H9" />
                        </svg>
                        <!-- <span>ログアウト</span> -->
                    </button>
                </form>
            </li>
            <!--
            <li class="c-transform-bottom"><a href="login.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4M10 17l5-5-5-5M13.8 12H3" />
                    </svg>

                </a></li>
            <li class="c-transform-bottom"><a href="entry.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 3h18v18H3zM12 8v8m-4-4h8" />
                    </svg>

                </a></li> -->
        </ul>
    </aside>
    <header class="c-padding-bottom_50">
        <div class="c-flex c-justify-content-between">
            <div class="p-header-title c-flex">
                <h1 class="c-transform-bottom">
                    <form method='post'>
                        <button type="submit" name="reset">課題No.2</button>
                    </form>
                </h1>
                <p>ログイン</p>
            </div>
            <div class="c-input-type-text">
                <form method='post'>
                    <input type="text" name="title">
                    <button class="c-transform-bottom" type="submit" name="search"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.33333 12.6667C10.2789 12.6667 12.6667 10.2789 12.6667 7.33333C12.6667 4.38781 10.2789 2 7.33333 2C4.38781 2 2 4.38781 2 7.33333C2 10.2789 4.38781 12.6667 7.33333 12.6667Z" stroke="#AEAEAE" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M13.9996 14L11.0996 11.1" stroke="#AEAEAE" stroke-linecap="round" stroke-linejoin="round" />
                        </svg></button>
                </form>
            </div>
        </div>
    </header>
    <main class="c-padding-bottom_50">
        <article>
            <h2>ようこそ<?php echo escape($_SESSION['name']) ?>さん</h2>
            <section class="c-padding-bottom_100">
                <h3>&nbsp;</h3>
                <div class="<?php echo $search_none ?> c-text-center">
                    <p><?php echo escape($title) ?></p>
                    <p>No data</p>
                    <p>該当のデータがありませんでした</p>
                    <form method='post'>
                        <button class="c-error-button" type="submit" name="reset">HOME</button>
                    </form>
                </div>
                <div class="c-flex c-flex-wrap <?php echo $display_none ?>">
                    <?php foreach ($nowPageElement as $user) : ?>
                        <ul class="c-flex-basis_33 c-card c-padding-bottom_10">
                            <li>
                                <p><img src="" alt="画像"></p>
                            </li>
                            <div class="c-flex">
                                <li>title:<?php echo $user['title'] ?></li>
                                <li>volume:<?php echo $user['volume'] ?></li>
                                <li>price:<?php echo $user['price'] ?></li>
                            </div>
                            <li>release_date:<?php echo $user['release_date'] ?></li>
                            <li>purchase_date:<?php echo $user['purchase_date'] ?></li>
                        </ul>
                    <?php endforeach; ?>
                </div>
            </section>
            <!-- ページネーションリンク -->
            <div class="c-flex c-justify-content-center" id="u-pageNav">
                <div class="c-label-bottom-hover">
                    <a href=" index.php?<?php echo 'page=' . $nowPage - 1 ?>" class="<?php echo $top ?> c-label-bottom-text">前へ</a>
                </div>
                <ul class="c-flex p-list-label-bottom-hover">
                    <?php foreach ($pageLinkNum as $key => $val) : ?>
                        <li class="c-margin-right_5">
                            <a href="index.php?<?php echo 'page=' . $key ?>" class="<?php echo $val ?>"><?php echo $key ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <div class="c-label-bottom-hover">
                    <a href="index.php?<?php echo 'page=' . $nowPage + 1 ?>" class="<?php echo $last ?> c-label-bottom-text">次へ</a>
                </div>
            </div>
        </article>
    </main>
    <footer class="c-padding-bottom_50">
        <div class="l-container">
            <nav class="c-padding-bottom_10">
                <ul class="p-footer-nav p-list-label-bottom-hover">
                    <li><a href="index.php">INDEX.PHP</a></li>
                    <li><a href="login.php">LOGIN.PHP</a></li>
                    <li><a href="entry.php">ENTRY.PHP</a></li>
                </ul>
            </nav>
            <address class="c-text-center">ph23</address>
        </div>
    </footer>
</body>

</html>