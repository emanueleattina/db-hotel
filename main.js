Vue.config.devtools = true;

var app = new Vue ({
    el: '#root',
    data: {
        stanze: [],
        stanzaInfo: null
    },
    mounted() {
        axios.get('http://localhost:8888/db-hotel/stanze.php')
        .then((response) => {
            this.stanze = response.data.response;
            console.log(response.data.response);
        });
    },
    methods: {
        details: function (id) {
            axios.get('http://localhost:8888/db-hotel/stanze.php?id='+id)
            .then((response) => {
                this.stanzaInfo = response.data.response[0];
            });
        },
        clear: function () {
            this.stanzaInfo = null;
        }
    }
});