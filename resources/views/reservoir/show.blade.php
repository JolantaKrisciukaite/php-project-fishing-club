@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$reservoir->title}}</div>

                <div class="card-body">
                    <div class="masters">
                        <small>Reservoir title: {{$reservoir->title}}</small>
                    </div>
                    <div class="masters">
                        <small>Reservoir area:{{$reservoir->area}}</small>
                    </div>
                    <div class="masters">
                        <small>Reservoir about:{{$reservoir->about}}</small>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
