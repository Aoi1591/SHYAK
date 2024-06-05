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
    methods:{//國場君明日来たらファイル名のこという！
        submitForm: function() {
            if(this.isSamePass) {
                console.log('パスワード一致。フォーム送信許可');
                // フォーム送信を行う前に re-enter-password フィールドを削除する
                document.getElementById('re-enter-password').remove();
                // フォーム送信を行う
                this.$el.querySelector('form').submit();
            }else{
                console.log('パスワード不一致。フォーム送信却下');
            }
        }
    }
    /*methods: {
        submitForm: function() {
            console.log('送信用のjsに飛んだよ');
            //フォームの入力値を取得
            const username = document.getElementById("username").value;
            const password = document.getElementById("password").value;
            const choice = document.querySelector(".LanguageChoice").value;
            console.log(username);
            // 取得したデータをオブジェクトにまとめる
            const formData = new FormData();
            formData.append("username", username);
            formData.append("password", password);
            formData.append("choice", choice);
            console.log(formData);

            // fetch APIを使用し、フォームをPOSTメソッドで送信
            fetch('../PHP/signup-output.php',{
                method: 'POST',
                body: formData

            }).then(response => {
                if(response){
                    // フォームの送信が成功したときの処理
                    console.log('フォームを送信しました');
                }
            }).catch(error => {
                console.error('Error',error);
                alert('フォームの送信中にエラーが発生しました');
            });
        }
    }*/
})