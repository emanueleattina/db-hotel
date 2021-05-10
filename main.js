Vue.config.devtools = true;

var app = new Vue ({
    el: '#root',
    data: {
        stanze: [],
        stanza: []
    },
    mounted() {
        axios.get('http://localhost:8888/db-hotel/stanze.php')
        .then((response) => {
            this.stanze = response.data.response;
            // console.log(response.data.response);
            console.log(this.stanze);
        });
    },
    methods: {
        details: function (id) {
            axios.get('http://localhost:8888/db-hotel/stanze.php?='+id)
            .then((response) => {
                this.stanza = response.data.response;
            });
        }
    }
});