@extends('admin/master_admin')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading list-page-header">
        <div class="col-lg-8">
            <h2>Configs</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('admin.dashboard') }}">Home</a>
                </li>
                <li class="active">
                    <strong>Config</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-4 pos-rel">
        </div>
    </div>
    <div class="row">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <div class="row m-b-md">
                    <div class="col-xs-6">
                        <form id="search-form">
                            <input type="hidden" name="page" />
                            <input type="hidden" name="sort" />
                            <input type="hidden" name="order" />
                            <input type="text" placeholder="Search" name="search" class="input-sm form-control" />
                        </form>
                    </div>
                </div>
                <div class="list-container">
                    @include('admin/config/configs_list')
                </div>
            </div>
        </div>
    </div>
@stop
