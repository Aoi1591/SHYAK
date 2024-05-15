<?php
    require 'header.php';
    ?>
    <title>Choose your language</title>
</head>
<link rel="stylesheet" href="Chooseyourlanguage.css">
<body>
    <?php
    echo '<h1>Choose your language</h1>';

    echo '<form action="Choose your language.php" method="post">';
        echo '<button type="submit" name="language" value="JP">日本語</button>';
        echo '<button type="submit" name="language" value="FR">Français</button>';
        echo '<button type="submit" name="language" value="RU">Русский</button>';
        echo '<button type="submit" name="language" value="CN">中文</button>';
        echo '<button type="submit" name="language" value="EN">English</button>';
        echo '<button type="submit" name="language" value="PT">Português</button>';
    echo '</form>';
    ?>
</body>
</html>

