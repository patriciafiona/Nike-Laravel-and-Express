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
                                <h2 class="mb-0">Insert Multiple Photos</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Sorry !</strong> There were some problems with your input.<br><br>
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                        @endif

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div> 
                        @endif

                        <form method="post" action="{{url('/photos/new/')}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                                <label>Product Name</label>
                                <select id="select_2" name="stock_id" class="form-control">
                                    <option>Insert Product Name Here</option>
                                </select>

                                <br/>

                                <label>Add Photos</label>
                                <div class="input-group control-group increment" >
                                <input type="file" name="filename[]" class="form-control">
                                <div class="input-group-btn"> 
                                    <button class="btn btn-success" type="button">Add</button>
                                </div>
                                </div>
                                <div class="clone hide">
                                <div class="control-group input-group" style="margin-top:10px">
                                    <input type="file" name="filename[]" class="form-control">
                                    <div class="input-group-btn"> 
                                    <button class="btn btn-danger" type="button">Remove</button>
                                    </div>
                                </div>
                                </div>
                                <button type="submit" class="btn btn-info" style="margin-top:12px">Submit</button>
                        </form>

                        <script type="text/javascript">
                            $(document).ready(function() {
                            $(".btn-success").click(function(){ 
                                var html = $(".clone").html();
                                $(".increment").after(html);
                            });
                            $("body").on("click",".btn-danger",function(){ 
                                $(this).parents(".control-group").remove();
                            });
                            });
                        </script>
                        
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection