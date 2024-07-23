<?php
    /*echo '<div class="el_humburger"><!--ハンバーガーボタン-->';
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
    echo '<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>';*/
?>
<link rel="stylesheet" href="../css/humburger.css">
    <title>ハンバーガーメニュー専用</title>
</head>
<!--ヘッダー↓-->
<header>
  <!-- spハンバーガーメニュー ↓ -->
  <div class="sp_nav">
    <div class="overlay" id="js_overlay"></div>
    <div class="hamburger" id="js_hamburger">
      <span class="hamburger_linetop"></span>
      <span class="hamburger_linecenter"></span>
      <span class="hamburger_linebottom"></span>
    </div>
    <div class="sidemenu">

      <?php $user_id = isset($_SESSION['User']['id']) ? $_SESSION['User']['id'] : ''; ?>

      <nav>
        <ul>
          <li><a href="mypage.php"><i class="fa-solid fa-anchor" style="color: #ffffff;"></i>マイページ</a></li>
          <li><a href="friend.php"><i class="fa-solid fa-user-group" style="color: #aed6f4;"></i>フレンドリスト</a></li>
          <li><a href="Explanationofrules.php"><i class="fa-regular fa-envelope" style="color: #5291ff;"></i>フレンドリクエスト</a></li>
        </ul>
      </nav>
    </div>
  </div>
  <!-- spハンバーガーメニュー ↑ -->
</header>
<!--ヘッダー↑-->

<!-- ハンバーガーメニューを表示させたいときは、bodyの中にhamburger.phpを呼ぶんだ。 -->
<!-- ハンバーガーメニューを表示させたいときは、/bodyから下を消してfooter.phpを呼ぶんだ。 -->