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
                        <div class="card" style="width: 18rem;">
                            <?php echo '<img class="card-img-top" alt="..." src="data:image/jpeg;base64,'. base64_encode($p->file) .'"/>' ?>
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text text-black">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-sm btn-primary">Go somewhere</a>
                            </div>
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