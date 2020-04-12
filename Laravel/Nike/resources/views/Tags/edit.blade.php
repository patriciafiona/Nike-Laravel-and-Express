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
                                <h6 class="text-uppercase text-muted ls-1 mb-1">Tags</h6>
                                <h2 class="mb-0">Update Tags</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!--Form Ubah Tag-->
                        <form action="{{ url('/tags/edit/' . $tag->id )}}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Tag Name</label>
                                <input type="text" name="tag" class="form-control" value = "{{$tag->name}}"/>
                            </div>
                            <div class="form-group">
                                <a href="/tags" class="btn btn-danger">Cancel</a>
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
                                <h2 class="mb-0">Tags List</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!--Tombol Shortcut Stock-->
                        <span class="badge badge-primary">Men</span>
                        <span class="badge badge-primary">Women</span>
                        <span class="badge badge-primary">Kids</span>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection