<script>
export default {
    data() {
        return {
            title : "إضافة مباراة جديدة",
            buttonName: "إضــافــة",
            match_time: '',
            match_date: '',
            default_date: '',
            data_changed: false,
            align: 'right',
            onOpen: "5:16 PM",
            leagueName: "",
            disabledButton : false,
            validations: null,
            selectedLeague: '',
            selectedTeam1: '',
            selectedTeam2: '',
            matchID: '',
            teamsInDB:[{
                "id":'#',
                "team_name":"يجب التأكد من اختيار دوري",
                'disabled':true,
            }],
            leaguesInDB: [],
        }
    },
    props: {
        match: null,
        teams: null,
        leagues: null,
    },
    mounted() {
        // waits until the whole view is rendered
        this.$nextTick(() => { //with this we skip the first change
            this.data_changed = true;
        });
    },
    watch: {
        match_date: function(val){
            if(this.data_changed){
                this.match_time= '';
            }
            this.default_date = this.changeDateFormat(parseInt(val));
        }
    },
    methods: {
        changeDateFormat: function(val){
            var date_not_formatted = new Date(val);
            var formatted_string = date_not_formatted.getFullYear() + '/';
            // e.g. : 2016/
            if (date_not_formatted.getMonth() < 9) {
                formatted_string += '0';
            }
            // e.g. : 2 -> 02
            formatted_string += (date_not_formatted.getMonth() + 1);
            // e.g. : 0 = January -> 1 = January
            formatted_string += '/';
            // e.g. : 2016/02/
            if(date_not_formatted.getDate() < 10) {
                formatted_string += '0';
            }
            // e.g. : 8 -> 08
            formatted_string += date_not_formatted.getDate();
            // e.g. : 2016/02/08
            return formatted_string;
        },
        insertTeams: function (selected) {
            this.teamsInDB = [];
            for(var i = 0; i < this.teams.length; i++) {
                if(this.teams[i]['league_id'] == selected){
                    this.teamsInDB.push(this.teams[i]);
                    this.teams[i]['disabled'] = false;
                }else{
                    continue;
                }
            }
            this.selectedTeam1 = '';
            this.selectedTeam2 = '';

        },
        update: function (selected) {
            for(var i = 0; i < this.teamsInDB.length; i++) {
                if(this.teamsInDB[i]['id'] == this.selectedTeam1 || this.teamsInDB[i]['id'] == this.selectedTeam2){
                    this.teamsInDB[i]['disabled'] = true;
                }else{
                    this.teamsInDB[i]['disabled'] = false;
                }
            }
        },
        saveMatch(){
            this.disabledButton = true;
            let url = '/match';
            if(this.matchID){
                url = '/match/'+this.matchID;
            }
            let formData = new FormData();
            formData.append('league_id', this.selectedLeague);
            formData.append('team_1', this.selectedTeam1);
            formData.append('team_2', this.selectedTeam2);
            formData.append('match_time', this.match_time);
            formData.append('match_date', this.match_date);
            axios.post( url, formData).then(response => {
                this.disabledButton = false;
                this.$swal({
                    title: response.data.message,
                    text: "",
                    icon: "success",
                    buttons: false,
                    timer: 3000,
                    showCancelButton: false,
                    showConfirmButton: false,
                });
                setTimeout(function(){
                    location.href = '/match';
                }, 2500);
            }).catch(error => {
                this.disabledButton = false;
                this.validations = error.response.data.errors;
                this.message = error.response.data.message;
                this.$swal('ERROR !', error.response.data.message, 'error');
            });
        }
    },
    created() {
        if (this.leagues){
            this.leaguesInDB = this.leagues;
        }
        if(this.match){
            this.teamsInDB = [];
            //for inserting the teams in teamsInDB for the first time
            // when editing, so we get all the teams playing in that league
            for(var i = 0; i < this.teams.length; i++) {
                if(this.teams[i]['league_id'] == this.match.league_id){
                    this.teamsInDB.push(this.teams[i]);
                }else{
                    continue;
                }
            }
            this.title = "تعديل مباراة";
            this.buttonName= "تعديل";
            this.matchID = this.match.id;
            this.selectedLeague = this.match.league_id;
            this.selectedTeam1 = this.match.team_1;
            this.selectedTeam2 = this.match.team_2;
            this.default_date = this.changeDateFormat(parseInt(this.match.match_date));
            this.match_time = this.match.match_time;
            this.match_date = this.match.match_date;
            for(var i = 0; i < this.teamsInDB.length; i++) {
                if(this.teamsInDB[i]['id'] == this.selectedTeam1 || this.teamsInDB[i]['id'] == this.selectedTeam2){
                    this.teamsInDB[i]['disabled'] = true;
                }else{
                    this.teamsInDB[i]['disabled'] = false;
                }
            }
        }
    }
}
</script>
