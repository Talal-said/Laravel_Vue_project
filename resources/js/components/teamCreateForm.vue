<script>
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
export default {
    mounted() {

    },
    data() {
        return {
            title : "إضافة نادي جديد",
            buttonName: "إضــافــة",
            fileList: [{name: 'food.jpeg', url: 'https://fuss10.elemecdn.com/3/63/4e7f3a15429bfda99bce42a18cdd1jpeg.jpeg?imageMogr2/thumbnail/360x360/format/webp/quality/100'}, {name: 'food2.jpeg', url: 'https://fuss10.elemecdn.com/3/63/4e7f3a15429bfda99bce42a18cdd1jpeg.jpeg?imageMogr2/thumbnail/360x360/format/webp/quality/100'}],
            image: '',
            imageUrl: '',
            myImageUrl: null,
            myImageName: null,
            // editor: ClassicEditor,
            // editorData: '<p>Type here...</p>',
            // editorConfig: {
            //     // The configuration of the editor.
            // },
            teamID: null,
            teamName: "",
            teamLogo: "",
            leagueID: "",
            leaguesInDB: [],
            disabledButton : false,
            validations: null,
        };
    },
    props: {
        team: null,
        leagues: null,
    },
    methods: {
        handleAvatarSuccess(res, file) {
            this.imageUrl = URL.createObjectURL(file.raw);
            this.myImageUrl = res.path;
            this.myImageName = res.name;
            //for handling the update, we use this.teamLogo for
            // checking if the image was updated or not
            this.teamLogo = '';
            this.image = file.raw;
        },
        beforeAvatarUpload(file) {
            const isJPEG = file.type === 'image/jpeg';
            const isJPG = file.type === 'image/jpg';
            const isPNG = file.type === 'image/png';
            const isLt2M = file.size / 1024 / 1024 < 2;
            if (!isJPEG && !isJPG && !isPNG) {
                this.$message.error('Avatar picture must be JPG or PNG format!');
            }
            if (!isLt2M) {
                this.$message.error('Avatar picture size can not exceed 2MB!');
            }
            return isJPG && isLt2M || isJPEG && isLt2M || isPNG && isLt2M;
        },
        handleRemove(file, fileList) {
            console.log(file, fileList);
        },
        handlePreview(file) {
            console.log(file);
        },
        saveTeam(){
            this.disabledButton = true;
            let url = '/team';
            if(this.teamID){
                url = '/team/'+this.teamID;
            }
            let formData = new FormData();
            formData.append('team_name', this.teamName);
            if(!this.teamLogo){
                formData.append('team_logo', this.image);
                formData.append('image_name', this.myImageUrl);
            }
            formData.append('league_id', this.leagueID);
            axios.post( url, formData , {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then(response => {
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
                    location.href = '/team';
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
        if (this.team){
            this.title = "تعديل بيانات النادي";
            this.teamID = this.team.id;
            this.teamName = this.team.team_name;
            this.teamLogo = this.team.team_logo;
            this.imageUrl = this.team.team_logo;
            this.myImageUrl = this.team.team_logo;
            this.leagueID = this.team.league_id;
            this.buttonName = "تعديل";
        }
        if (this.leagues){
            this.leaguesInDB = this.leagues;
        }
    }
}
</script>
