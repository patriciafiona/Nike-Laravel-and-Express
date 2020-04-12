@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    <div class="header welcome-h">
        <div class="container">
            <div class="header-body text-center">
                <div class="row justify-content-center">
                    <div id="video-player">
                        <video autoplay muted loop>
                            <source src="{{ asset('/video/Home Video.mp4') }}" type="video/mp4">
                        </video>
                    </div>
                    <div id="overlay">
                        <p>Nike React Infinity Run</p>
                        <h1><strong>KEEPS RUNNERS RUNNING</strong></h1>
                        <button class="btn btn-white bg-secondary">Shop</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
