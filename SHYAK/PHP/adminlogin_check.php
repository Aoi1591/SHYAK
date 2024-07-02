<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // PHPの処理を実行
    $secretDate = date('Ymd');
    if ($_POST['userInput'] === $secretDate) {
        echo '<script>
            alert("Correct answer. Redirecting to login page.");
            window.location.href = "./admin_login_input.php";
        </script>';
        exit;
    } else {
        echo '<script>
            alert("Error: Incorrect answer to the secret question.");
            window.location.href = "./login.php?flag=fail";
        </script>';
        exit;
    }
} else {
    // 初回アクセス時のJavaScriptの処理
    echo '<script>
        var userInput = prompt("秘密の質問を入力してください:");
        if (userInput !== null) {
            var form = document.createElement("form");
            form.method = "POST";
            form.action = "";
            
            var input = document.createElement("input");
            input.type = "hidden";
            input.name = "userInput";
            input.value = userInput;
            
            form.appendChild(input);
            document.body.appendChild(form);
            form.submit();
        }
    </script>';
}
?>
