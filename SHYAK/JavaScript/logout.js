function noevent(event){
    location.href="top.php?logout=1";
}

document.addEventListener("DOMContentLoaded", function() {
    const logout = document.getElementById("logout");
    const confirmationDialog = document.getElementById("confirmationDialog");
    const confirmationDialogCon = document.getElementById("confirmationDialogCon");
    const yesbutton = document.getElementById("yes-button");
    //const confirmNoButton = document.getElementById("no-button");

    logout.addEventListener("click", function() {
        confirmationDialog.style.display = "flex";
        confirmationDialogCon.style.display = "block";
    });

    yesbutton.addEventListener("click", function() {
        document.getElementById("yesbutton").submit(); // フォームを送信
    });

});

/*if (nagasu) {
    // 戻るボタンの処理
    nagasu.addEventListener("click", () => {
        confirmationDialog.style.display = "flex";
        confirmationDialogCon.style.display = "block";
    });*/

if (yesbutton) {
   yesbutton.addEventListener("click", () => {
        // 情報を保存して top.php に遷移
        document.getElementById("yesbutton").submit(); // フォームを送信
    });
}