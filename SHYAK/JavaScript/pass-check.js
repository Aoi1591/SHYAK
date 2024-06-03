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
            const username =docment.getElementById("username").value;
            const password =docment.getElementById("password").value;
            const choice = docment.querySelector(".LanguageChoice").value;
            // 取得したデータをパラメータとしてURLに付加
            var url = "signup-output.php?username=" + encodeURIComponent(username) + "&password=" + encodeURIComponent(password) 
            + "&choice=" + encodeURIComponent(choice);
        }
    }
})