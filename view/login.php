<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login.php</title>
    <link rel="stylesheet" type="text/css" href="css/import.css">
</head>

<body>
    <aside>
        <ul>
            <li><a href="login.php">login.php</a></li>
            <li><a href="entry.php">entry.php</a></li>
        </ul>
    </aside>
    <header>
        <div class="c-flex c-justify-content-between">
            <h1>課題 No.2</h1>
        </div>
    </header>
    <main>
        <article>
            <form method="post">
                <p><?php echo errMsg[$errCode] ?></p>
                <label for="login_id-L">ログインID</label>
                <input type="text" name="login_id" id="login_id-L">
                <label for="password-L">パスワード</label>
                <input type="text" name="password" id="password-L">
                <button type="submit" name="submit">ログイン</button>
            </form>
        </article>
    </main>
    <footer>
        <nav>
            <ul>
                <li><a href="index.php">index.php</a></li>
                <li><a href="login.php">login.php</a></li>
                <li><a href="entry.php">entry.php</a></li>
            </ul>
        </nav>
        <address>ph23</address>
    </footer>
</body>

</html>