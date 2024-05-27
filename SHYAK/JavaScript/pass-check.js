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
    }
})