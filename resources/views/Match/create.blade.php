@extends('layout.index')
@section('mainWorkspace')

    <match-create-form :match="{{isset($match) ? json_encode($match) : 'null'}}" :teams="{{isset($teams) ? json_encode($teams) : 'null'}}" :leagues="{{isset($leagues) ? json_encode($leagues) : 'null'}}" inline-template>
        <div class="col-lg-6" style="margin: auto">
            <div class="alert alert-success text-dark text-right" id="alert" style="display: none;"></div>
            <div class="card">
                <div class="card-header" style="justify-content: center;font-size: 20px;font-weight: 600;color: #464a53;">
                    @{{ title }}
                </div>
                <div class="card-body card-block">
                    <form id="form" action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="input-group">
                                <el-select v-model="selectedLeague" name="league_id" value-key="item" clearable placeholder="اختر اسم الدوري" @change="insertTeams">
                                    <el-option
                                        v-for="(item, index) in leaguesInDB"
                                        :key="index"
                                        :label="item.name"
                                        :value="item.id"
                                        :disabled="item.disabled">
                                    </el-option>
                                </el-select>
                            </div>
                        </div>
                        <div class="alert-danger"
                             style="text-align: right;width: 100%;margin: 15px 0;padding: 0 15px;color: #822424;"
                             v-if="validations && validations.league_id">
                            @{{ validations['league_id'][0] }}
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <el-select v-model="selectedTeam1" name="team_1" value-key="item" clearable placeholder="اختر اسم الفريق الأول" @change="update">
                                    <el-option
                                        v-for="(item, index) in teamsInDB"
                                        :key="index"
                                        :label="item.team_name"
                                        :value="item.id"
                                        :disabled="item.disabled">
                                    </el-option>
                                </el-select>
                            </div>
                        </div>
                        <div class="alert-danger"
                             style="text-align: right;width: 100%;margin: 15px 0;padding: 0 15px;color: #822424;"
                             v-if="validations && validations.team_1">
                            @{{ validations['team_1'][0] }}
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <el-select v-model="selectedTeam2" name="team_2" value-key="item" clearable placeholder="اختر اسم الفريق الثاني" @change="update">
                                    <el-option
                                        v-for="(item, index) in teamsInDB"
                                        :key="index"
                                        :label="item.team_name"
                                        :value="item.id"
                                        :disabled="item.disabled">
                                    </el-option>
                                </el-select>
                            </div>
                        </div>
                        <div class="alert-danger"
                             style="text-align: right;width: 100%;margin: 15px 0;padding: 0 15px;color: #822424;"
                             v-if="validations && validations.team_2">
                            @{{ validations['team_2'][0] }}
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <el-time-picker
                                    v-model="match_time"
                                    name="match_time"
                                    :picker-options="{selectableRange: '00:00:00 - 23:59:59'}"
                                    format="hh:mm A"
                                    :align="align"
                                    :editable="false"
                                    value-format="timestamp"
                                    valueOnOpen="onOpen"
                                    placeholder="اختر وقت المباراة">
                                </el-time-picker>
                            </div>
                        </div>
                        <div class="alert-danger"
                             style="text-align: right;width: 100%;margin: 15px 0;padding: 0 15px;color: #822424;"
                             v-if="validations && validations.match_time">
                            @{{ validations['match_time'][0] }}
                        </div><div class="form-group">
                            <div class="input-group">
                                <el-date-picker
                                    v-model="match_date"
                                    name="match_date"
                                    :align="align"
                                    format="yyyy/MM/dd"
                                    value-format="timestamp"
                                    type="date"
                                    :editable="false"
                                    placeholder="اختر تاريخ المبارة">
                                </el-date-picker>
                            </div>
                        </div>
                        <div class="alert-danger"
                             style="text-align: right;width: 100%;margin: 15px 0;padding: 0 15px;color: #822424;"
                             v-if="validations && validations.match_date">
                            @{{ validations['match_date'][0] }}
                        </div>
                        <div class="form-actions form-group col-lg-4 offset-lg-4" style="margin-bottom: 0px;">
                            <button type="button" @click.prevent="saveMatch" :disabled="disabledButton" class="btn btn-secondary btn-md" style="width: 100%">
                                @{{ buttonName }}
                                <i v-if="disabledButton" class="fa fa-spinner fa-spin"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </match-create-form>

@endsection
@section('styles')
    <style>
        label{
            color: black;
            display: block;
            text-align: right;
            width: 100%;
            padding-right: 20px;
            font-size: 16px;
        }
        .avatar-uploader {
            margin-left: auto;
        }
        ::placeholder {
            color: black;
            opacity: 1;
        }

        select {
            -moz-appearance: none;
            -webkit-appearance: none;
        }

        select::-ms-expand {
            display: none;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
        }

        input[type=number] {
            -moz-appearance: textfield;
        }

        /* input date and time */
        .el-date-editor.el-input, .el-date-editor.el-input__inner {
            width: 98% !important;
            direction: rtl;
        }
        .el-input__prefix {
            right: 5px;
            width: fit-content;
            transition: all .3s;
        }
        .el-input__suffix {
            left: 5px !important;
            right: auto !important;
            width: fit-content;
            transition: all .3s;
        }

    /* select Element ui  */
        .el-select {
            width: 98%;
            text-align: right;
            direction: rtl;
        }
        .el-select-dropdown__item {
            direction: rtl;
            text-align: right;
        }
        .el-select > .el-input {
            display: block;
            width: 100% !important;
        }

    /*    input Element ui   */
        .el-input {
            width: 98% !important;
            direction: rtl;
            text-align: right;
        }
    </style>
@endsection

