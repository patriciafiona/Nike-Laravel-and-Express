@extends('layouts.app')

@section('content')
    @include('layouts.headers.blank')
    
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-4">
                <div class="card shadow">
                <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1">Photos</h6>
                                <h2 class="mb-0">Modify Photos</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($photos as $p)
                                <tr>
                                    <th scope="row"> 
                                        <?php echo '<img class="photo_detail" alt="..." src="data:image/jpeg;base64,'. base64_encode($p->file) .'"/>' ?>
                                    </th>
                                    <td>
                                        <form action="photos/delete/{{$p->id}}" method="post" style="display:inline-block;">
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
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1">Photos</h6>
                                <h2 class="mb-0">Details Product</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row form-ph">
                            <div class="col col-md-4">
                                <label>Product Name</label>
                            </div>
                            <div class="col col-md-8">
                                {{$detail->stock_name}}
                            </div>
                        </div>
                        <div class="row form-ph">
                            <div class="col col-md-4">
                                <label>Category</label>
                            </div>
                            <div class="col col-md-8">
                                {{$detail->stock_cat}}
                            </div>
                        </div>
                        <div class="row form-ph">
                            <div class="col col-md-4">
                                <label>Tag</label>
                            </div>
                            <div class="col col-md-8">
                                {{$detail->stock_tag}}
                            </div>
                        </div>
                        <div class="row form-ph">
                            <div class="col col-md-4">
                                <label>Total Stock</label>
                            </div>
                            <div class="col col-md-8">
                                {{$detail->total}}
                            </div>
                        </div>
                        <div class="row form-ph">
                            <div class="col col-md-4">
                                <label>Price</label>
                            </div>
                            <div class="col col-md-8">
                                @currency($detail->price)
                            </div>
                        </div>
                        <div class="row form-ph">
                            <div class="col col-md-4">
                                <label>Describe</label>
                            </div>
                            <div class="col col-md-8">
                                <textarea class="form-control view_stock_desc" disabled>{{$detail->stock_desc}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection