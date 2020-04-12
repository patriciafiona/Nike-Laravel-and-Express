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
                                <h6 class="text-uppercase text-muted ls-1 mb-1">Stock</h6>
                                <h2 class="mb-0">View Detail Stock</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row form-mv">
                            <div class="col col-md-3">
                                <label>Name</label>
                            </div>
                            <div class="col col-md-6">
                                {{$stock->name}}
                            </div>
                        </div>

                        <div class="row form-mv">
                            <div class="col col-md-3">
                                <label>Category</label>
                            </div>
                            <div class="col col-md-6">
                                {{$stock->category->name}}
                            </div>
                        </div>

                        <div class="row form-mv">
                            <div class="col col-md-3">
                                <label>Total</label>
                            </div>
                            <div class="col col-md-6">
                                {{$stock->total}}
                            </div>
                        </div>

                        <div class="row form-mv">
                            <div class="col col-md-3">
                                <label>Price</label>
                            </div>
                            <div class="col col-md-6">
                                {{$stock->price}}
                            </div>
                        </div>

                        <div class="row form-mv">
                            <div class="col col-md-3">
                                <label>Tag</label>
                            </div>
                            <div class="col col-md-6">
                                {{$stock->tag->name}}
                            </div>
                        </div>

                        <div class="row form-mv">
                            <div class="col col-md-3">
                                <label>Describe</label>
                            </div>
                            <div class="col col-md-6">
                                <textarea name="describe" class="form-control" style="min-height:300px;" disabled>{{$stock->describe}}</textarea>
                            </div>
                        </div>

                        <div class="row form-mv">
                            <div class="col col-md-3"></div>
                            <div class="col col-md-6">
                                <div class="form-group">
                                    <a href="/stock" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection