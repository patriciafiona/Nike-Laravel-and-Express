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
                        <form action="{{ url('/photos/input_photo')}}" method="post">
                            {{ csrf_field() }}
                            <div class="row form-mv">
                                <div class="col col-md-3">
                                    <label>Product Name</label>
                                </div>
                                <div class="col col-md-6">
                                    <select id="select_2" name="stock_id" class="form-control" requied>
                                        <option>Insert Product Name Here</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-mv">
                                <div class="col col-md-3"></div>
                                <div class="col col-md-6">
                                    <div class="form-group">
                                        <a href="/photos" class="btn btn-danger">Cancel</a>
                                        <button type="submit" class="btn btn-success">Next</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection