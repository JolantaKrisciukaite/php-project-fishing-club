@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="titleReservoir">{{ $reservoir->title }}</div>

                    <div class="card-body">
                        <div class="card-show">
                            <div class="masters">
                                <h6>Reservoir title: {{ $reservoir->title }}</h6>
                            </div>
                            <div class="masters">
                                <h6>Reservoir area: {{ $reservoir->area }} (km2)</h6>
                            </div>
                            <div class="masters">
                                <h6>Reservoir about: {!! $reservoir->about !!}</h6>
                            </div>
                        </div>

                        <div>
                            <a href="{{ route('reservoir.edit', [$reservoir]) }}" class="editButton">Edit</a>
                            <a href="{{ route('reservoir.pdf', [$reservoir]) }}" class="addButtonCreate">Download PDF</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
