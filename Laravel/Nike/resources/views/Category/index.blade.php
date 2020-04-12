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
                                <h6 class="text-uppercase text-muted ls-1 mb-1">Categories</h6>
                                <div class="row">
                                    <div class="col-md-10">
                                        <h2 class="mb-0">List Category</h2>
                                    </div>
                                    <div class="col-md-2">
                                        <a href ="/categories/input" class="btn btn-sm btn-primary">Insert</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!--Informasi category-->
                        <div class="table-responsive">
                            <!-- Projects table -->
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($cat as $c)
                                    <tr>
                                        <th scope="row"> {{$c->id}} </th>
                                        <td> {{$c->name}} </td>
                                        <td>
                                            <a href ="categories/edit/{{$c->id}}" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="categories/delete/{{$c->id}}" method="post" style="display:inline-block;">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            {{ $cat->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1">Shortcut</h6>
                                <h2 class="mb-0">Categories Shortcuts</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!--Tombol Shortcut Category-->
                        <a href="/categories/input" class="btn btn-sm btn-primary">Insert</a>
                        <a href ="#" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#CatUpdate">Update</a>
                        <a href ="categories/delete" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#CatDelete">Delete</a>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>

    <!--Modal Update-->
    <div class="modal fade" id="CatUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
            <!--Content-->
            <div class="modal-content modal-box">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!--Body-->
                <div class="modal-body text-center mb-1 ">
                    <h1>Modify Data</h1>
                    <h5>Update Category</h5>
                    <hr/>

                    <form action="{{ url('/categories/edit') }}" method="post">
                        {{ csrf_field() }}
                        <div class="md-form ml-0 mr-0">
                            <input type="text" class="form-control form-control-sm validate ml-0" name="nilai" placeholder="Input id or category name here..." required>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-warning mt-1">Find<i class="fas fa-sign-in ml-1"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>

    <!--Modal Delete-->
    <div class="modal fade" id="CatDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
            <!--Content-->
            <div class="modal-content modal-box">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!--Body-->
                <div class="modal-body text-center mb-1 ">
                    <h1>Modify Data</h1>
                    <h5>Delete Category</h5>
                    <hr/>

                    <form action="{{ url('/categories/delete') }}" method="post">
                        {{ csrf_field() }}
                        <div class="md-form ml-0 mr-0">
                            <input type="text" class="form-control form-control-sm validate ml-0" name="nilai" placeholder="Input id or category name here..." required>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-warning mt-1">Find<i class="fas fa-sign-in ml-1"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>

@endsection