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
                        @foreach($photos->chunk(3) as $pp)
                            <div class="row">
                                @foreach($pp as $p)
                                <div class="col-md-4">
                                    <div class="card" style="width: 17rem;margin-bottom:15px;">
                                        <?php echo '<img class="card-img-top" alt="..." src="data:image/jpeg;base64,'. base64_encode($p->file) .'"/>' ?>
                                        <div class="card-body">
                                            <h3 class="card-title">{{$p->stock_name}}</h3>
                                            <h6>Total Photos: {{$p->total}}</h6>
                                            <hr style="margin:5px;"/>
                                            <p class="text-black detail-photos"> 
                                                {{ Str::limit($p->stock_desc,150, $end='...') }} 
                                            </p>
                                            <a href="/photos/detail/{{$p->stock_id}}" class="btn btn-sm btn-primary">Detail</a>
                                            <form action="photos/deleteAll/{{$p->stock_id}}" method="post" class="inline_block">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-sm btn-danger">Delete All</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        @endforeach
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