<?php require "header.php";?>
<?php require "api.php";?>
<link rel="stylesheet" href="../CSS/humburger.css">
    <title>ハンバーガーメニュー専用</title>
</head>
<!--ヘッダー↓-->
<header>
  <?php
   $translator = new Translator();
   $txtArr = array('トップ','マイページ','フレンド','ルール','ログアウト');
   for($i = 0; $i < count($txtArr); $i++){
       $originalText = $txtArr[$i];
       $originalText = $translator->translate($originalText,$_SESSION['User']['lang']);
       $txtArr[$i] = $originalText;
   }
   ?>
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
          <li><a href="top.php"><i class="fa-solid fa-bottle-droplet" style="color: #ffffff;"></i>
          <?php echo $txtArr[0];?></a></li>
          <li><a href="mypage.php"><i class="fa-solid fa-anchor" style="color: #ffffff;"></i>
          <?php echo $txtArr[1];?></a></li>
          <li><a href="friend.php"><i class="fa-solid fa-user-group" style="color: #aed6f4;"></i>
          <?php echo $txtArr[2];?></a></li>
          <li><a href="Explanationofrules.php"><i class="fa-regular fa-envelope" style="color: #5291ff;"></i>
          <?php echo $txtArr[3];?></a></li>
          <li><a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket" style="color: #0b5fef;"></i>
          <?php echo $txtArr[4];?></a></li>
        </ul>
        <img src="../image/あわ.gif" alt="メニュー画像" class="menu-image">
      </nav>
    </div>
  </div>
  <script src="../JavaScript/hamburger.js"></script>
  <!-- spハンバーガーメニュー ↑ -->
</header>
<!--ヘッダー↑-->
<!-- ハンバーガーメニューを表示させたいときは、bodyの中にhamburger.phpを呼ぶんだ。 -->
<!-- ハンバーガーメニューを表示させたいときは、/bodyから下を消してfooter.phpを呼ぶんだ。 -->