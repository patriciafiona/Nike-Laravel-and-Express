@extends('layouts.app')

@section('content')
    @include('layouts.headers.blank')
    
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-8">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1">Category</h6>
                                <h2 class="mb-0">Insert New Category</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!--Form Tambah Tag-->
                        <form action="{{ url('/categories/new')}}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Category Name</label>
                                <input type="text" name="name" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <a href="/categories" class="btn btn-danger">Cancel</a>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1">List</h6>
                                <h2 class="mb-0">Categories List</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!--Tombol Shortcut Category-->
                        @foreach($cat as $c)
                        <span class="badge badge-primary">{{$c->name}}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection