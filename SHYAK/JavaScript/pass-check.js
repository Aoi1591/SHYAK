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
            //フォームの入力値を取得
            const username =document.getElementById("username").value;
            const password =document.getElementById("password").value;
            const choice = document.querySelector(".LanguageChoice").value;
            // 取得したデータをパラメータとしてURLに付加
            var url = "signup-output.php?username=" + encodeURIComponent(username) + "&password=" + encodeURIComponent(password) 
            + "&choice=" + encodeURIComponent(choice);
        }
    }
})