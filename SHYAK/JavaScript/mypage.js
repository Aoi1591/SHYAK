document.addEventListener("DOMContentLoaded", () => {
    const nameElement = document.getElementById("name");
    const descriptionElement = document.getElementById("description");
    const backButton = document.getElementById("backButton");
    const confirmationDialog = document.getElementById("confirmationDialog");
    const confirmYesButton = document.getElementById("confirmYes");
    const confirmNoButton = document.getElementById("confirmNo");
    const languageChoice = document.getElementById("LanguageChoice-all");
    const nameInput = document.getElementById("nameInput");
    const descriptionInput = document.getElementById("descriptionInput");

    // ローカルストレージから名前と自己紹介文を取得
    const storedName = localStorage.getItem("name");
    if (storedName) {
        nameElement.textContent = storedName;
    }
    const storedDescription = localStorage.getItem("description");
    if (storedDescription) {
        descriptionElement.textContent = storedDescription;
    }

    // ローカルストレージから選択した言語を取得
    const storedLanguage = localStorage.getItem("LanguageChoice-all");
    if (storedLanguage) {
        languageChoice.value = storedLanguage;
    }

    let initialName = nameElement.textContent;
    let initialDescription = descriptionElement.textContent;

    // 言語選択を保存
    languageChoice.addEventListener("change", () => {
        localStorage.setItem("LanguageChoice-all", languageChoice.value);
    });

    // 編集可能にする関数
    const makeEditable = (element, storageKey) => {
        element.addEventListener("click", () => {
            element.setAttribute("contenteditable", "true");
            element.focus();
        });

        element.addEventListener("blur", () => {
            element.removeAttribute("contenteditable");
            const newValue = element.textContent.trim() || (element === nameElement ? "名前をクリック" : "自己紹介文をクリックして編集");
            localStorage.setItem(storageKey, newValue);
            element.textContent = newValue;
        });

        element.addEventListener("keydown", (event) => {
            if (event.key === "Enter") {
                event.preventDefault();
                element.blur();
            }
        });
    };

    // 名前と自己紹介文を編集可能にする
    makeEditable(nameElement, "name");
    makeEditable(descriptionElement, "description");

    // 戻るボタンの処理
    backButton.addEventListener("click", () => {
        const currentName = nameElement.textContent;
        const currentDescription = descriptionElement.textContent;

        if (currentName !== initialName || currentDescription !== initialDescription) {
            confirmationDialog.style.display = "block";
        } else {
            // 情報が変更されていない場合は top.php に遷移
            window.location.href = "../php/top.php";
        }
    });

    confirmYesButton.addEventListener("click", () => {
        // 情報を保存して top.php に遷移
        initialName = nameElement.textContent;
        initialDescription = descriptionElement.textContent;
        nameInput.value = initialName;
        descriptionInput.value = initialDescription;
        confirmationDialog.style.display = "none";
    });

    confirmNoButton.addEventListener("click", () => {
        // 情報を保存せずに top.php に遷移
        nameElement.textContent = initialName;
        descriptionElement.textContent = initialDescription;
        confirmationDialog.style.display = "none";
        window.location.href = "../php/top.php";
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
});
