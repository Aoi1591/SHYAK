document.addEventListener("DOMContentLoaded", function() {
    const nagasu = document.getElementById("nagasu");
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

if (nagasu) {
    // 戻るボタンの処理
    nagasu.addEventListener("click", () => {
        confirmationDialog.style.display = "flex";
        confirmationDialogCon.style.display = "block";
    });
}

if (confirmYesButton) {
    confirmYesButton.addEventListener("click", () => {
        // 情報を保存して top.php に遷移
        document.getElementById("binnagasuForm").submit(); // フォームを送信
    });
}

if (confirmNoButton) {
    confirmNoButton.addEventListener("click", () => {
        confirmationDialog.style.display = "none";
        confirmationDialogCon.style.display = "none";
    });
}
