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
                                <div class="row">
                                    <div class="col-md-10">
                                        <h2 class="mb-0">List Photos</h2>
                                    </div>
                                    <div class="col-md-2">
                                        <a href ="/photos/input_stockId" class="btn btn-sm btn-primary">Insert</a>
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
                                        <th scope="col">Product</th>
                                        <th scope="col">Tag</th>
                                        <th scope="col">Photos</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($photos as $p)
                                        <tr>
                                            <th scope="row"> {{$p->id}} </th>
                                            <td data-toggle="tooltip" data-placement="top" title="{{$p->stock_id}}"> {{Str::limit($p->stock_id,10, $end='...')}} </td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <a href ="stock/view/{{$p->id}}" class="btn btn-sm btn-primary">View</a>
                                                <a href ="stock/edit/{{$p->id}}" class="btn btn-sm btn-warning">Edit</a>
                                                <form action="stock/delete/{{$p->id}}" method="post" style="display:inline-block;">
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
                            {{ $photos->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection