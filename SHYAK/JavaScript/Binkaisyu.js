document.addEventListener("DOMContentLoaded", function() {
    const kaisyu = document.getElementById("kaisyu");
    const confirmationDialog = document.getElementById("confirmationDialog");
    const confirmationDialogCon = document.getElementById("confirmationDialogCon");
    const confirmYesButton = document.getElementById("confirmYes");
    const confirmNoButton = document.getElementById("confirmNo");

    nagasu.addEventListener("click", function() {
        confirmationDialog.style.display = "flex";
        confirmationDialogCon.style.display = "block";
    });

    confirmYes.addEventListener("click", function() {
        document.getElementById("binnagasuForm").submit(); // フォームを送信
    });

    confirmNo.addEventListener("click", function() {
        confirmationDialog.style.display = "none";
        confirmationDialogCon.style.display = "none";
    });
});

if (kaisyu) {
    // 戻るボタンの処理
    kaisyu.addEventListener("click", () => {
        confirmationDialog.style.display = "flex";
        confirmationDialogCon.style.display = "block";
    });
}

if (confirmYesButton) {
    confirmYesButton.addEventListener("click", () => {
        // 情報を保存して top.php に遷移
        document.getElementById("binkaisyuForm").submit(); // フォームを送信
    });
}

if (confirmNoButton) {
    confirmNoButton.addEventListener("click", () => {
        confirmationDialog.style.display = "none";
        confirmationDialogCon.style.display = "none";
    });
}
