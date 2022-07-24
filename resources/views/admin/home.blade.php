@extends('admin.template')

@section('main')
    <div class="row">
        <div class="col-sm-6 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h5>Details de Votre Comptes</h5>
                    <div class="row">
                        <div class="col-8 col-sm-12 col-xl-8 my-auto">
                            <div class="d-flex d-sm-block d-md-flex align-items-center">
                                <h2 class="mb-0"></h2>
                            </div>
                        </div>
                        <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                            <i class="icon-lg mdi mdi-codepen text-primary ml-auto"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-sm-6 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h5>Total To Receive</h5>
                    <div class="row">
                        <div class="col-8 col-sm-12 col-xl-8 my-auto">
                            <div class="d-flex d-sm-block d-md-flex align-items-center">
                                <h2 class="mb-0"></h2>
                            </div>
                        </div>
                        <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                            <i class="icon-lg mdi mdi-wallet-travel text-danger ml-auto"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Users</h4>
                    <div class="table-responsive">
                        <table class="table">

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
