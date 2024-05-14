<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>ログイン画面</title>
    </head>
    <body>
        <form action = "login" method="post">
            <input type="text" id="username" name="username" placeholder="USERNAME" required><br>

            <input type="password" id="password" name="password" placeholder="PASSWORD" required><br>

            <input type="submit" value="LOGIN">

            <br><br>

        <button onclick="window.location.href='signup-input.php';">SIGN-UP</button>
        </form>
        <img src="#" class="button" ondblclick="check()" id="promptBtn"><!--srcには飛行機とかの画像を入れてね-->
        <script>
        document.getElementById("promptBtn").addEventListener("dbclick", function() {
            // ユーザーに管理者ログインページへ遷移するためのパス入力を求める
            const userInput = prompt("Secret Pass"); 
            // ユーザーがパスを入力したときの処理
            if(userInput !== null){
                // フォームを作成
                const form = docment.createElement("form");
                form.method = "POST";
                form.action = "AdminLogin-check.php";// 入力値を指定のページへ飛ばす

                // 入力値送信用のテキストフィールド(非表示)を追加
                const inputField =document.createElement("input");
                inputField.type = "hidden";// 非表示指定
                inputField.name = "userInput";// 遷移先でデータを受け取るための名前指定
                inputField.value = userInput;// promptで取得した値を代入
                form.appendChild(inputField);// このテキストフィールドをフォームに追加

                // フォームをドキュメントに追加
                document.body.appendChild(form); // フォームをドキュメントのボディに追加
                form.submit();// 送信！
            }
        });
        </script>
    </body>
</html>