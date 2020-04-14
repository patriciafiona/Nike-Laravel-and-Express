@extends('layouts.app')

@section('content')
    @include('layouts.headers.blank')
    
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1">Photos</h6>
                                <h2 class="mb-0">Insert Multiple Photos</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <div class="row form-mv">
                                <div class="col col-md-3">
                                    <label>Product ID</label>
                                </div>
                                <div class="col col-md-6">
                                    {{$stock->id}}
                                </div>
                            </div>
                            <div class="row form-mv">
                                <div class="col col-md-3">
                                    <label>Product Name</label>
                                </div>
                                <div class="col col-md-6">
                                    {{$stock->name}}
                                </div>
                            </div>
                        </div>
                        <form method="post" action="{{url('/photos/new')}}" 
                            enctype="multipart/form-data" class="dropzone" id="dropzone">
                            @csrf
                            <input type="hidden" name="stock_id" value="{{$stock->id}}"/>
                        </form>   
                        <div class="row form-mv">
                            <a href="/photos" class="btn btn-danger">Finish</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection