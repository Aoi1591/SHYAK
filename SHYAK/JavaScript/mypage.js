document.addEventListener("DOMContentLoaded", () => {
    const nameElement = document.getElementById("name");
    const descriptionElement = document.getElementById("description");
    const backButton = document.getElementById("backButton");
    const confirmationDialog = document.getElementById("confirmationDialog");
    const confirmationDialogCon = document.getElementById("confirmationDialogCon");
    const confirmYesButton = document.getElementById("confirmYes");
    const confirmNoButton = document.getElementById("confirmNo");
    const languageChoice = document.getElementById("LanguageChoice-all");
    const nameInput = document.getElementById("nameInput");
    const descriptionInput = document.getElementById("descriptionInput");

    // 戻るボタンの処理
    backButton.addEventListener("click", () => {

        confirmationDialog.style.display = "block";
        confirmationDialogCon.style.display = "block";

    });

    confirmYesButton.addEventListener("click", () => {
        // 情報を保存して top.php に遷移
        initialName = nameElement.textContent;
        initialDescription = descriptionElement.textContent;
        nameInput.value = initialName;
        descriptionInput.value = initialDescription;
        confirmationDialog.style.display = "none";
        document.querySelector('form').submit();//何かわからない
    });

    confirmNoButton.addEventListener("click", () => {
        // 情報を保存せずに top.php に遷移
        confirmationDialog.style.display = "none";
        confirmationDialogCon.style.display = "none";
    });
});

// ファイルから画像をアップロードするためのスクリプト
document.getElementById('image').addEventListener('click', function() {
    document.getElementById('fileInput').click();

});

// ファイルからアップロード
document.getElementById('fileInput').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('image').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
    // ファイルをフォームに設定し、サーバーに送信
    /*const formData = new FormData();
    formData.append('file', file);

    fetch('img-upload.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
    })
    .catch(error => {
        console.error('Error:', error);
    });*/
});
