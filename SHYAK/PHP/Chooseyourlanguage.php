<?php
    require 'header.php';
    ?>
    <title>Choose your language</title>
</head>
<link rel="stylesheet" href="Chooseyourlanguage.css">
<body>
    <?php
    echo '<h1>Choose your language</h1>';

    echo '<form action="Chooseyourlanguage-output.php" method="post">';
        echo '<button type="submit" name="language" value="jp">日本語</button>';
        echo '<button type="submit" name="language" value="fr">Français</button>';
        echo '<button type="submit" name="language" value="ru">Русский</button>';
        echo '<button type="submit" name="language" value="cn">中文</button>';
        echo '<button type="submit" name="language" value="en">English</button>';
        echo '<button type="submit" name="language" value="pt">Português</button>';
    echo '</form>';
    ?>
</body>
</html>

