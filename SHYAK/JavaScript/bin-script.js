new Vue({
    el: '#app',
    data() {
        return{
            text: '願いや祝福を入力してください'
        };
    },
    computed: {
        isInvalidText(){
            return this.text.length === 0;
        }
    }
});