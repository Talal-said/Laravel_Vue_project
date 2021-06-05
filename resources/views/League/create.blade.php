@extends('layout.index')
@section('mainWorkspace')

    <league-create-form :league="{{isset($league) ? json_encode($league) : 'null'}}" inline-template>
        <div class="col-lg-6" style="margin: auto">
            <div class="alert alert-success text-dark text-right" id="alert" style="display: none;"></div>
            <div class="card">
                <div class="card-header" style="justify-content: center;font-size: 20px;font-weight: 600;color: #464a53;">
                    @{{ title }}
                </div>
                <div class="card-body card-block">
                    <form id="form" action="" method="post" >
                        <div class="form-group">
                            <div class="input-group">
                                <el-input
                                    placeholder="إسم الدوري"
                                    v-model="leagueName"
                                    name="name"
                                    clearable>
                                </el-input>
                            </div>
                        </div>
                        <div class="alert-danger"
                             style="text-align: right;width: 100%;margin: 15px 0;padding: 0 15px;color: #822424;"
                             v-if="validations && validations.name">
                            @{{ validations['name'][0] }}
                        </div>
                        <div class="form-actions form-group col-lg-4 offset-lg-4" style="margin-bottom: 0px;">
                            <button type="button" @click.prevent="saveLeague" :disabled="disabledButton" class="btn btn-secondary btn-md" style="width: 100%">
                                @{{ buttonName }}
                                <i v-if="disabledButton" class="fa fa-spinner fa-spin"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </league-create-form>

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

        /*    input Element ui   */
        .el-input {
            width: 98% !important;
            direction: rtl;
            text-align: right;
        }
        .el-input .el-input__clear {
            font-size: 16px !important;
            color: #000000 !important;
            width: 25px !important;
            line-height: 42px !important;
            transition: all .3s;
        }
        .el-input__suffix {
            left: 5px !important;
            color: #000000 !important;
            right: auto !important;
            width: fit-content;
            transition: all .3s;
        }
    </style>
@endsection

