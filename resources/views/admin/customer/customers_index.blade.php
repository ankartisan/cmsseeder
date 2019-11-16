@extends('admin/master_admin')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading list-page-header">
        <div class="col-lg-8">
            <h2>Customers</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('admin.dashboard') }}">Home</a>
                </li>
                <li class="active">
                    <strong>Customers</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-4 pos-rel">
            <div class="row action-btn-container">
                <a href="{{ route('admin.customer', ['id' => 'new']) }}" type="button" class="btn btn-primary pull-right btn-new-entity">New Customer</a>
            </div>
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
                    @include('admin/customer/customers_list')
                </div>
            </div>
        </div>
    </div>
@stop
