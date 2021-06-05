<script>
import axios from 'axios';
import TableComponent from 'vue-table-component/src/components/TableComponent';
import TableColumn from 'vue-table-component/src/components/TableColumn';

export default {
    mounted() {},
    data() {
        return {
            mydata: null,
            table_title: 'المباريات',
            add_btn_name: 'إضافة مباراة',
        };
    },
    components: {
        TableComponent,
        TableColumn,
    },
    methods: {
        async fetchData ({ page, filter, sort }) {
            const response = await axios.get('/matches/getData', { params: { page, filter, sort } });
            let data = {
                data: response.data.matches.data,
                pagination: {
                    currentPage: response.data.matches.current_page,
                    totalPages: response.data.matches.last_page,
                }
            };
            return data;
        },
        changeDateFormat(date){
            var timestamp = parseInt(date);
            var date_not_formatted = new Date(timestamp);

            var formatted_string = date_not_formatted.getFullYear() + '/';

            if (date_not_formatted.getMonth() < 9) {
                formatted_string += '0';
            }
            formatted_string += (date_not_formatted.getMonth() + 1);
            formatted_string += '/';

            if(date_not_formatted.getDate() < 10) {
                formatted_string += '0';
            }
            formatted_string += date_not_formatted.getDate();
            return formatted_string;
        },
        changeTimeFormat(time){
            var timestamp = parseInt(time);
            var time_not_formatted = new Date(timestamp);
            console.log(time_not_formatted);
            var formatted_time = time_not_formatted.toLocaleTimeString('en-US', {hour: '2-digit', minute: '2-digit', hour12: true});
            return formatted_time;
        },
        deleteMatch(id){
            this.$swal({
                title: "هل أنت متأكد ؟",
                text: "! لن تكون قادراً على استرجاع هذه البيانات في حال حذفها",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                showCancelButton: true,
                confirmButtonText: "حذف",
                cancelButtonText: "إلغاء",
                focusCancel: true,
            }).then((response) => {
                    if (response.value) {
                         axios.delete(`/match/${id}`)
                            .then(response => {
                                this.$refs.table.refresh();
                                this.$swal({
                                    title: response.data.message,
                                    text: "",
                                    icon: "success",
                                    buttons: false,
                                    timer: 2000,
                                    showCancelButton: false,
                                    showConfirmButton: false,
                                });
                            }).catch(error => {
                             this.$swal({
                                 title: response.data.message,
                                 text: "",
                                 icon: "error",
                                 buttons: false,
                             });
                        });
                    }
            });
        }
    }
}
</script>
