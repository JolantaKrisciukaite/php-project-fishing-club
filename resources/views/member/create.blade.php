@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card">

                    <h3 class="titleReservoir">Create new member</h3>

                    <div class="card-body">
                        <form method="POST" action="{{ route('member.store') }}">

                            <div class="form-group">
                                <label>Name:</label>
                                <input placeholder="Enter member name" type="text" name="member_name" class="form-control"
                                    value="{{ old('member_name') }}">
                            </div>

                            <div class="form-group">
                                <label>Surname:</label>
                                <input placeholder="Enter member surname" type="text" name="member_surname" class="form-control"
                                    value="{{ old('member_surname') }}">
                            </div>

                            <div class="form-group">
                                <label>Live:</label>
                                <input placeholder="Enter member live" type="text" name="member_live" class="form-control"
                                    value="{{ old('member_live') }}">
                            </div>

                            <div class="form-group">
                                <label>Experience:</label>
                                <input placeholder="Enter member experience" type="text" name="member_experience" class="form-control"
                                    value="{{ old('member_experience') }}">
                            </div>

                            <div class="form-group">
                                <label>Registered:</label>
                                <input placeholder="Enter member registered" type="text" name="member_registered" class="form-control"
                                    value="{{ old('member_registered') }}">
                            </div>

                            <select class="index" name="reservoir_id"><br>
                                @foreach ($reservoirs as $reservoir)
                                    <option value="{{ $reservoir->id }}">
                                        Title: {{ $reservoir->title }} 🐬
                                        Area: {{ $reservoir->area }} (km2) 🖐 
                                    </option>
                                @endforeach
                            </select>

                            @csrf
                            <button class="addButtonCreate" type="submit">Add</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection