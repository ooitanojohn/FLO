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
            <li class="c-transform-bottom">
                <div id="aside-nav"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#FFF" stroke-width="0.5" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg></div>
            </li>
            <!-- <li class="c-transform-bottom">
                <form method="post">
                    <button type="submit" name="logout"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M10 3H6a2 2 0 0 0-2 2v14c0 1.1.9 2 2 2h4M16 17l5-5-5-5M19.8 12H9" />
                        </svg>
                        <span>ログアウト</span>
                    </button>
                </form>
            </li> -->
            <li class="c-transform-bottom"><a href="login.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4M10 17l5-5-5-5M13.8 12H3" />
                    </svg>
                    <!-- <span>login.php</span> -->
                </a></li>
            <li class="c-transform-bottom"><a href="entry.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 3h18v18H3zM12 8v8m-4-4h8" />
                    </svg>
                    <!-- <span>entry.php</span> -->
                </a></li>
        </ul>
    </aside>
    <header class="c-padding-bottom_100">
        <div class="c-flex c-justify-content-between">
            <div class="p-header-title c-flex">
                <h1 class="c-transform-bottom"><a href="login.php">課題 No.2</a></h1>
                <p>ログイン</p>
            </div>
            <div class="c-input-type-text">
                <!-- <form method='post'>
                    <input type="text" name="title">
                    <button class="c-transform-bottom" type="submit" name="search"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.33333 12.6667C10.2789 12.6667 12.6667 10.2789 12.6667 7.33333C12.6667 4.38781 10.2789 2 7.33333 2C4.38781 2 2 4.38781 2 7.33333C2 10.2789 4.38781 12.6667 7.33333 12.6667Z" stroke="#AEAEAE" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M13.9996 14L11.0996 11.1" stroke="#AEAEAE" stroke-linecap="round" stroke-linejoin="round" />
                        </svg></button>
                </form> -->
            </div>
        </div>
    </header>
    <main>
        <article>
            <div class="u-complete-form-size c-padding-bottom_100">
                <div>
                    <h2 class="u-font-config-h2">ログイン</h2>
                </div>
                <div>
                    <p><?php echo errMsg[$errCode] ?></p>
                </div>
                <form method="post">
                    <div class="c-input-type-text-entry">
                        <label for="login_id-L">ログインID</label>
                        <input type="text" name="login_id" id="login_id-L">
                    </div>
                    <div class="c-input-type-text-entry">
                        <label for="password-L">パスワード</label>
                        <input type="text" name="password" id="password-L">
                    </div>
                    <div class="c-flex c-justify-content-center c-padding-top_50">
                        <button type="submit" name="submit" class="c-entry-button">ログイン</button>
                    </div>
                </form>
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