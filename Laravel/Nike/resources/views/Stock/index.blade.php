@extends('layouts.app')

@section('content')
    @include('layouts.headers.cardsSegmentation')
    
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1">Stock</h6>
                                <div class="row">
                                    <div class="col-md-10">
                                        <h2 class="mb-0">List Stock</h2>
                                    </div>
                                    <div class="col-md-2">
                                        <a href ="/stock/input" class="btn btn-sm btn-primary">Insert</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!--Informasi Stock-->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Tag</th>
                                    <th scope="col">Descibe</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($stocks as $s)
                                <tr>
                                    <th scope="row"> {{$s->id}} </th>
                                    <td data-toggle="tooltip" data-placement="top" title="{{$s->name}}"> {{Str::limit($s->name,10, $end='...')}} </td>
                                    <td> {{$s->category->name}} </td>
                                    <td> {{$s->total}} </td>
                                    <td> @currency($s->price) </td>
                                    <td> {{$s->tag->name}} </td>
                                    <td> {{ Str::limit($s->describe,10, $end='...') }} </td>
                                    <td>
                                        <a href ="stock/view/{{$s->id}}" class="btn btn-sm btn-primary">View</a>
                                        <a href ="stock/edit/{{$s->id}}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="stock/delete/{{$s->id}}" method="post" style="display:inline-block;">
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
                        {{ $stocks->links() }}
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush