@extends('layout.index')
@section('mainWorkspace')

    <match-table inline-template>
        <div class="col-lg-12" style="
        direction: rtl;
        text-align: center;">
            <div class="alert alert-success text-dark text-right" id="alert" style="display: none;"></div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" style="
                    text-align: center;
                    width: 100%;
                    font-size: 20px;
                    font-weight: bold;">@{{ table_title }}</h4>
                    <a href="{{ route('match.create') }}" style="margin-left: 6px;width: 110px;">
                        <button type="button" class="btn btn-outline-primary btn-lg" style="white-space: nowrap;">
                            <i class="far fa-user-plus"></i>
                            &nbsp;@{{ add_btn_name }}
                        </button>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table-component :data="fetchData" sort-by="id" sort-order="asc" ref="table" table-class="table table-bordered table-hover table-striped table-responsive-sm"
                                         show-caption="false" thead-class="thead-primary" filter-no-results="لا يوجد بيانات"
                                         filter-placeholder="بحث عن اسم دوري" filter-input-class="form-control form-control-lg">
                            <table-column show="matches.id" label="#">
                                <template scope="row">
                                    @{{ row.id }}
                                </template>
                            </table-column>
                            <table-column show="leagues.name" label="اسم الدوري">
                                <template scope="row">
                                    @{{ row.league_name }}
                                </template>
                            </table-column>
                            <table-column show="t1.team_name" label="اسم الفريق الأول">
                                <template scope="row">
                                    @{{ row.Team_1_name }}
                                </template>
                            </table-column>
                            <table-column show="t2.team_name" label="اسم الفريق الثاني">
                                <template scope="row">
                                    @{{ row.Team_2_name }}
                                </template>
                            </table-column>
                            <table-column show="matches.match_date" label="تاريخ المباراة">
                                <template scope="row">
                                    @{{ changeDateFormat(row.match_date) }}
                                </template>
                            </table-column>
                            <table-column show="matches.match_time" label="وقت المباراة">
                                <template scope="row">
                                    @{{ changeTimeFormat(row.match_time) }}
                                </template>
                            </table-column>
                            <table-column label="العمليات" :sortable="false" :filterable="false">
                                <template scope="row">
                                    <a :href="'/match/'+row.id+'/edit'" style="color: #2794ff;padding-left: 10px;">
                                        <i class="far fa-edit"></i>
                                    </a> |
                                    <button type="button" @click="deleteMatch(row.id)" class="deleteButton" style="background-color: transparent;color: red;padding-right: 10px; border: none; outline: none;">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </template>
                            </table-column>
                        </table-component>
                    </div>
                </div>
            </div>
        </div>
    </match-table>

@endsection
@section('styles')
    <style>
        caption {
            display: none;
        }
        .swal2-icon-warning__body, .swal2-icon-warning__dot {
            background-color: #ff0000;
        }

        .swal2-icon.swal2-warning {
            border-color: #ff0000;
            color: #ff0000;
            animation: pulseWarning 1s linear infinite;
        }
        .swal2-styled.swal2-confirm{
            background-color: #ff0000 !important;
        }
        .swal2-button-danger {
            background-color: #ff0000;
        }

        @keyframes pulseWarning {
            0% {
                border-color: #ff0000;
                color: #ff0000;
            }
            100% {
                border-color: #ffffff;
                color: #ffffff;
            }
        }
        .table-component__filter {
            position: relative;
        }
        a.table-component__filter__clear {
            position: absolute;
            top: calc(50% - 14px);
            left: 12px;
            width: 20px;
            font-size: 20px;
            cursor: pointer;
        }
        .table .thead-primary th {
            cursor: pointer;
        }
        .table-div{
            display: flex;
            justify-content: end;
            align-items: center;
        }
        .table-images{
            width: 70px;
            height: 70px;
            object-fit: cover;
        }
        .table-p{
            margin-right: 15px;
            display: inline-block;
            font-size: 18px;
        }

        .form-control {
            background: #fff;
            color: black;
            margin-bottom: 1rem;
            border: 1px solid #593bdb;
        }

    </style>
@endsection
