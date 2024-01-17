<body>
  <header class="header">
  <!-- ヘッダーロゴ -->
  <div class="logo">タイトル</div>
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
            <li><a href="Top.php">トップ</a></li>
            <li><a href="C_browsing.php">新規登録</a></li>
            <li><a href="mypage.php?id=<?php $user_id ?>">マイページ</a></li>
            <li><a href="uzer_update_input.php?id=<?php $user_id ?>">アカウント情報更新</a></li>
            <li><a href="login.php">ログイン</a></li>
            <li><a href="logout-check.php">ログアウト</a></li>
          </ul>
        </nav>
      </div>
    </div>
  <!-- spハンバーガーメニュー ↑ -->
  </header>
