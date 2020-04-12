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
                                <h6 class="text-uppercase text-muted ls-1 mb-1">Stocks</h6>
                                <h2 class="mb-0">Insert New Stock</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!--Form Tambah Stock-->
                        <form action="{{ url('/stock/new')}}" method="post">
                            {{ csrf_field() }}
                            <div class="row form-mv">
                                <div class="col col-md-3">
                                    <label>Name</label>
                                </div>
                                <div class="col col-md-6">
                                    <input type="text" name="name" class="form-control" placeholder="Input Product Name Here" required/>
                                </div>
                            </div>

                            <div class="row form-mv">
                                <div class="col col-md-3">
                                    <label>Tag</label>
                                </div>
                                <div class="col col-md-6">
                                    <select name="tag_id" class="form-control">
                                        @foreach($tags as $t)
                                        <option value="{{$t->id}}">{{$t->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row form-mv">
                                <div class="col col-md-3">
                                    <label>Category</label>
                                </div>
                                <div class="col col-md-6">
                                    <select name="category_id" class="form-control">
                                        @foreach($category as $c)
                                        <option value="{{$c->id}}">{{$c->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row form-mv">
                                <div class="col col-md-3">
                                    <label>Total</label>
                                </div>
                                <div class="col col-md-6">
                                    <input type="number" min="0" name="total" class="form-control" placeholder="Input Total Here" required/>
                                </div>
                            </div>

                            <div class="row form-mv">
                                <div class="col col-md-3">
                                    <label>Price</label>
                                </div>
                                <div class="col col-md-6">
                                    <input type="number" min="0" name="price" class="form-control" placeholder="Input Price Here" required/>
                                </div>
                            </div>

                            <div class="row form-mv">
                                <div class="col col-md-3">
                                    <label>Describe</label>
                                </div>
                                <div class="col col-md-6">
                                    <textarea name="describe" class="form-control" style="min-height:200px;"></textarea>
                                </div>
                            </div>

                            <div class="row form-mv">
                                <div class="col col-md-3"></div>
                                <div class="col col-md-6">
                                    <div class="form-group">
                                        <a href="/stock" class="btn btn-danger">Cancel</a>
                                        <button type="submit" class="btn btn-success">Submit</button>
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