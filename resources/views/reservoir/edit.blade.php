@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card">
                    <div class="titleReservoir">Edit new reservoir</div>

                    <div class="card-body">
                        <form method="POST" action="{{route('reservoir.update', $reservoir)}}" enctype="multipart/form-data">

                            <div class="form-group">
                                <label>Title:</label>
                                <input type="text" name="reservoir_title" class="form-control"
                                    value="{{ old('reservoir_title', $reservoir->title) }}">
                            </div>

                            <div class="form-group">
                                <label>Area:</label>
                                <input type="text" name="reservoir_area" class="form-control"
                                    value="{{ old('reservoir_area', $reservoir->area) }}">
                            </div>

                            <div class="form-group">
                                <div class="small-photo">
                                     @if($reservoir->photo)
                                         <img src="{{$reservoir->photo}}">
                                         <label>Delete photo</label>
                                         <input type="checkbox" name="delete_reservoir_photo">
                                     @else
                                          <img src="{{asset('noImage.jpg')}}">
                                     @endif
                                     <p class>Photo:</p>
                                     <input type="file" name="reservoir_photo">
                                 </div>
                             </div>
                             
                            <div class="form-group">
                                <label>About:</label>
                                <textarea id="summernote" type="text" name="reservoir_about" class="form-control"
                                    value="{{ old('reservoir_about', $reservoir->about) }}">{{$reservoir->about}}</textarea>
                            </div>

                            @csrf
                            <button class="editButton" type="submit">Edit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>

@endsection