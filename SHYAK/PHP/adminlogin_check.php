<script>
        function adminLogin(){
            var userInput = prompt("秘密の質問を入力してください");
            if(userInput){
                var form = document.createElement("form");
                form.method = "POST";
                form.action = "admin_login_input.php";

                var input = document.createElement("input");
                input.type = "hidden";
                input.name = "userInput";
                input.value = userInput;

                form.appendChild(input);
                document.body.appendChild(form);
                form.submit();
        }
    }
    </script>