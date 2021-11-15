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
            <h1>課題 No.2</h1>
            <form method='post'>
                <input type="text" name="title">
                <button type="submit" name="search">検索</button>
            </form>

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
        <nav>
            <ul class="c-flex">
                <li><a href="index.php">index.php</a></li>
                <li>
                    <form method="post">
                        <button type="submit" name="logout">ログアウト</button>
                    </form>
                </li>
                <li><a href="login.php">login.php</a></li>
                <li><a href="entry.php">entry.php</a></li>
            </ul>
        </nav>
        <address>ph23</address>
    </footer>

</body>

</html>