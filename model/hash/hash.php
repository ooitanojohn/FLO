<?php

/**
 * ハッシュ化 md5でソルト,ストレチングランダム
 * @param string $password ハッシュ化したいパスワード
 * @return string $password ハッシュ化されたパスワード
 * @return string $solt 使用したソルト
 * @return int $cost ストレッチング
 */
function passwordHash($password)
{
    // ランダム生成
    // ソルト
    $solt = chr(mt_rand(65, 90)) . chr(mt_rand(65, 90)) . chr(mt_rand(65, 90)) .
        chr(mt_rand(65, 90)) . chr(mt_rand(65, 90)) . chr(mt_rand(65, 90));
    // 繰り返し回数
    $cost = rand(10000, 100000);
    // 繰り返し hash
    for ($i = 0; $i < $cost; $i++) {
        $password = md5($solt . $password);
    }
    $hashedPass = $password;
    return [$hashedPass, $solt, $cost];
}
/** パスワードリハッシュ
 * @param string $password 入力値のパス
 * @param string $solt ソルト
 * @param string $cost ストレッチング
 * @return string $reHashedPass ハッシュ化されたパス
 */
function passwordReHash($password, $solt, $cost)
{
    // 繰り返し hash
    for ($i = 0; $i < $cost; $i++) {
        $password = md5($solt . $password);
    }
    $reHashedPass = $password;
    return $reHashedPass;
}
