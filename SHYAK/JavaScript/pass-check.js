new Vue({
    el: '#app',
    data: {
        pass1: "",
        pass2: ""
    },
    computed: {
        isSamePass: function () {
            return this.pass1 === this.pass2;
        }
    },
    methods: {
        submitForm: function() {
            console.log('送信用のjsに飛んだよ');
            //フォームの入力値を取得
            const username =document.getElementById("username").value;
            const password =document.getElementById("password").value;
            const choice = document.querySelector(".LanguageChoice").value;
            console.log(username);
            // 取得したデータをオブジェクトにまとめる
            const formData = new FormData();
            formData.append("username", username);
            formData.append("password", password);
            formData.append("choice", choice);
            // fetch APIを使用し、フォームをPOSTメソッドで送信
            fetch('signup-output.php',{
                method: 'POST',
                body: formData

            }).then(response => {
                if(response){
                    // フォームの送信が成功したときの処理
                    console.log('アウトプットに遷移する');
                    window.location.href = 'signup-output.php';
                }else{
                    // フォームの送信が失敗したときの処理
                    alert('送信に失敗しました。');
                }
            }).catch(error => {
                console.error('Error',error);
                alert('フォームの送信中にエラーが発生しました');
            });
        }
    }
})