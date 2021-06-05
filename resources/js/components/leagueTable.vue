<script>
import axios from 'axios';
import TableComponent from 'vue-table-component/src/components/TableComponent';
import TableColumn from 'vue-table-component/src/components/TableColumn';

export default {
    mounted() {},
    data() {
        return {
            mydata: null,
            table_title: 'الدوريات',
            add_btn_name: 'إضافة دوري',
        };
    },
    components: {
        TableComponent,
        TableColumn,
    },
    methods: {
        async fetchData ({ page, filter, sort }) {
            const response = await axios.get('/leagues/get-data', { params: { page, filter, sort } });
            let data = {
                data: response.data.leagues.data,
                pagination: {
                    currentPage: response.data.leagues.current_page,
                    totalPages: response.data.leagues.last_page,
                }
            };
            return data;
        },
        deleteLeague(id){
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
                         axios.delete(`/league/${id}`)
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
