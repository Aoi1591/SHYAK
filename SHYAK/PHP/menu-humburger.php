<?php
    echo '<div class="el_humburger"><!--ハンバーガーボタン-->';
    echo '<div class="el_humburger_wrapper">';
    echo '<span class="el_humburger_bar top"></span>';
    echo '<span class="el_humburger_bar middle"></span>';
    echo '<span class="el_humburger_bar bottom"></span>';
    echo '</div>';
    echo '</div>';
    echo '<header class="navi"><!--ナビゲーション-->';
    echo '<div class="navi_inner">';
    echo '<div class="navi_item"><a href="myPage.php"><i class="fa-solid fa-anchor" style="color: #ffffff;"></i></a></div>';//マイページへのリンク。
    echo '<div class="navi_item"><a href="friendPage.php"><i class="fa-solid fa-user-group" style="color: #aed6f4;"></i></a></div>';//フレンド表示ページへのリンク。
    echo '<div class="navi_item"><a href="Rule.php"><i class="fa-regular fa-envelope" style="color: #5291ff;"></i></a></div>';//ルール説明表示
    echo '<div class="navi_item"><a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket" style="color: #0b5fef;"></i></a></div>';//ログアウト。
    echo '</div>';
    echo '</header>';
    echo '<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>';
?>