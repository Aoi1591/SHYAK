function noevent(event){
    location.href="top.php?logout=1";
}

document.addEventListener("DOMContentLoaded", function() {
    const logout = document.getElementById("logout");
    const confirmationDialog = document.getElementById("confirmationDialog");
    const confirmationDialogCon = document.getElementById("confirmationDialogCon");
    const yesbutton = document.getElementById("yes-button");
    const okbutton = document.getElementById("ok");
    const ok = document.getElementById("ok");
    //const confirmNoButton = document.getElementById("no-button");


    const btn = document.getElementById("yes-button");
    const okButton = document.getElementById("modal-ok-button");

    // 　「はい」を押下したとき
    btn.addEventListener('click', function(event) {
        event.preventDefault(); // デフォルトのリンク動作を無効にする
        confirmationDialog.style.display = "flex";
        confirmationDialogCon.style.display = "block";
    });
       // モーダルの OK ボタンをクリックしたときの動作
    okButton.onclick = function() {
        window.location.href = 'logout-output.php'; // リダイレクト先を指定
    }



    // logout.addEventListener("click", function() {
    //     confirmationDialog.style.display = "flex";
    //     confirmationDialogCon.style.display = "block";
    // });

    // yesbutton.addEventListener("click", function() {
    //     document.getElementById("ok").submit(); // フォームを送信
    // });
    // okbutton.addEventListener("click", function() {
    //     document.getElementById("ok").submit(); // フォームを送信
    // });

});

/*if (nagasu) {
    // 戻るボタンの処理
    nagasu.addEventListener("click", () => {
        confirmationDialog.style.display = "flex";
        confirmationDialogCon.style.display = "block";
    });*/

// if (ok) {
//    ok.addEventListener("click", () => {
//         // 情報を保存して top.php に遷移
//         document.getElementById("yesbutton").submit(); // フォームを送信
//     });
// }