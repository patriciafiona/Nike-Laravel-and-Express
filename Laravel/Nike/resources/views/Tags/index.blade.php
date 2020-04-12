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
                                <div class="row">
                                    <div class="col-md-10">
                                        <h2 class="mb-0">List Tags</h2>
                                    </div>
                                    <div class="col-md-2">
                                        <a href ="/tags/input" class="btn btn-sm btn-primary">Insert</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!--Informasi Tag-->
                        <div class="table-responsive">
                            <!-- Projects table -->
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Tag</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($tags as $tag)
                                    <tr>
                                        <th scope="row"> {{$tag->id}} </th>
                                        <td> {{$tag->name}} </td>
                                        <td>
                                            <a href ="tags/edit/{{$tag->id}}" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="tags/delete/{{$tag->id}}" method="post" style="display:inline-block;">
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
                            {{ $tags->links() }}
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
                                <h2 class="mb-0">Tags Shortcuts</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!--Tombol Shortcut Tag-->
                        <a href="/tags/input" class="btn btn-sm btn-primary">Insert</a>
                        <a href ="#" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#TagsUpdate">Update</a>
                        <a href ="tags/delete" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#TagsDelete">Delete</a>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>

    <!--Modal Update-->
    <div class="modal fade" id="TagsUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
                    <h5>Update Tag</h5>
                    <hr/>

                    <form action="{{ url('/tags/edit') }}" method="post">
                        {{ csrf_field() }}
                        <div class="md-form ml-0 mr-0">
                            <input type="text" class="form-control form-control-sm validate ml-0" name="nilai" placeholder="Input id or tag name here..." required>
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
    <div class="modal fade" id="TagsDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
                    <h5>Delete Tag</h5>
                    <hr/>

                    <form action="{{ url('/tags/delete') }}" method="post">
                        {{ csrf_field() }}
                        <div class="md-form ml-0 mr-0">
                            <input type="text" class="form-control form-control-sm validate ml-0" name="nilai" placeholder="Input id or tag name here..." required>
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