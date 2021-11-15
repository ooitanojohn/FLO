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
            <li>
                <form method="post">
                    <button type="submit" name="logout">ログアウト</button>
                </form>
            </li>
            <li><a href="login.php">login.php</a></li>
            <li><a href="entry.php">entry.php</a></li>
        </ul>
    </aside>
    <header>
        <div class="c-flex c-justify-content-between">
            <h1 class="c-transform-bottom">課題 No.2<span>ログイン</span></h1>
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
    <main>
        <article>
            <table border=1>
                <tr>
                    <?php foreach ($tableIndex as $val) { ?>
                        <td><?php echo $val ?></td>
                    <?php } ?>
                </tr>
                <?php foreach ($nowPageElement as $user) : ?>
                    <tr>
                        <?php foreach ($user as $val) { ?>
                            <td><?php echo $val ?></td>
                        <?php } ?>
                    </tr>
                <?php endforeach; ?>
            </table>
            <a href=" index.php?<?php echo 'page=' . $nowPage - 1 ?>" class="<?php echo $top ?>">前へ</a>
            <?php foreach ($pageLinkNum as $key => $val) : ?>
                <a href="index.php?<?php echo 'page=' . $key ?>" class="<?php echo $val ?>"><?php echo $key ?></a>
            <?php endforeach; ?>
            <a href="index.php?<?php echo 'page=' . $nowPage + 1 ?>" class="<?php echo $last ?>">次へ</a>
        </article>
    </main>
    <footer>
        <div class="l-container">
            <nav>
                <ul class="p-footer-nav c-textLink">
                    <li><a href="index.php">index.php</a></li>
                    <li>
                        <form method="post">
                            <button type="submit" name="logout"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M10 3H6a2 2 0 0 0-2 2v14c0 1.1.9 2 2 2h4M16 17l5-5-5-5M19.8 12H9" />
                                </svg>ログアウト<span></span></button>
                        </form>
                    </li>
                    <li><a href="login.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4M10 17l5-5-5-5M13.8 12H3" />
                            </svg><span>login.php</span></a></li>
                    <li><a href="entry.php">entry.php</a></li>
                </ul>
            </nav>
            <address class="text-center">ph23</address>
        </div>
    </footer>

</body>

</html>