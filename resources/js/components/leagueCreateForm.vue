<script>
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
export default {
    mounted() {

    },
    data() {
        return {
            title : "إضافة دوري جديد",
            buttonName: "إضــافــة",
            // fileList: [],
            // image: '',
            // imageUrl: '',
            // myImageUrl: null,
            // myImageName: null,
            // editor: ClassicEditor,
            // editorData: '<p>Type here...</p>',
            // editorConfig: {
            //     // The configuration of the editor.
            // },
            leagueID: null,
            leagueName: "",
            disabledButton : false,
            validations: null,
        };
    },
    props: {league: null},
    methods: {
        handleAvatarSuccess(res, file) {
            this.imageUrl = URL.createObjectURL(file.raw);
            this.myImageUrl = res.path;
            this.myImageName = res.name;
            this.image = file.raw;
        },
        beforeAvatarUpload(file) {
            const isJPG = file.type === 'image/jpeg';
            const isLt2M = file.size / 1024 / 1024 < 2;

            if (!isJPG) {
                this.$message.error('Avatar picture must be JPG format!');
            }
            if (!isLt2M) {
                this.$message.error('Avatar picture size can not exceed 2MB!');
            }
            return isJPG && isLt2M;
        },
        saveLeague(){
            this.disabledButton = true;
            let url = '/league';
            if(this.leagueID){
                url = '/league/'+this.leagueID;
            }
            let formData = new FormData();
            formData.append('name', this.leagueName);
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
                    location.href = '/league';
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
        if (this.league){
            this.title = "تعديل بيانات الدوري";
            this.leagueID = this.league.id;
            this.leagueName = this.league.name;
            this.buttonName = "تعديل";
        }
    }
}
</script>
