@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
        <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
           <div class="card">
               <div class="titleReservoir">Edit new member</div>

               <div class="card-body">
                <form method="POST" action="{{route('member.update',[$member])}}">

                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" name="member_name" class="form-control" value="{{old('member_name', $member->name)}}">
                    </div>

                    <div class="form-group">
                        <label>Surname:</label>
                        <input type="text" name="member_surname" class="form-control" value="{{old('member_surname', $member->surname)}}">
                    </div>

                    <div class="form-group">
                        <label>Live:</label>
                        <input type="text" name="member_live" class="form-control" value="{{old('member_live', $member->live)}}">
                    </div>

                    <div class="form-group">
                        <label>Experience:</label>
                        <input type="text" name="member_experience" class="form-control" value="{{old('member_experience', $member->experience)}}">
                    </div>

                    <div class="form-group">
                        <label>Registered:</label>
                        <input type="text" name="member_registered" class="form-control" value="{{old('member_registered', $member->registered)}}">
                    </div>
                      
                    <select class="index" name="reservoir_id"><br>
                        @foreach ($reservoirs as $reservoir)
                            <option value="{{ $reservoir->id }}">
                                Title: {{$reservoir->title}} 🐳
                                Area: {{$reservoir->area}} 💧
                            </option>
                        @endforeach
                    </select>
                      
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