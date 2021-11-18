<?php

function pageLink($userList, $show, $nowPage)
{
    // 最大ページ求める
    if ($userList % $show === 0) {
        $maxPage = intval($userList / $show) - 1;
    } else {
        $maxPage = intval($userList / $show);
    }
    // *** 最初のページ ***
    if ($nowPage == 0) {
        $top = 'none';
    }
    // *** 最後のページ ***
    if ($nowPage == $maxPage) {
        $last = 'none';
    }
    // *** 現在のページ ***
    for ($i = 0; $i < $maxPage + 1; $i++) {
        if ($i  == $nowPage) {
            $pageLinkNum[] = 'none';
        } else {
            $pageLinkNum[] = '';
        }
    }
    return [$maxPage, $top, $last, $pageLinkNum];
}
