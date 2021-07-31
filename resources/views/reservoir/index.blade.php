@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="titleBetters">Reservoirs</h3>

                        <div>

                            <form action="{{ route('reservoir.index') }}" method="get" class="sort-form">
                                <fieldset>
                                    <legend>Sort by</legend>
                                    <div>
                                        <label>Title</label>
                                        <input type="radio" name="sort_by" value="title" @if ('title' == $sort) checked @endif>
                                        <label>Area</label>
                                        <input type="radio" name="sort_by" value="area" @if ('area' == $sort) checked @endif>
                                    </div>
                                </fieldset>

                                <fieldset class="direction">
                                    <legend>Direction</legend>
                                    <div>
                                        <label>Asc</label>
                                        <input type="radio" name="dir" value="asc" @if ('asc' == $dir) checked @endif>
                                        <label>Dsc</label>
                                        <input type="radio" name="dir" value="desc" @if ('desc' == $dir) checked @endif>
                                    </div>
                                </fieldset>
                                <button class="addButtonCreate" type="submit">Sort</button>
                                <a href="{{ route('reservoir.index') }}" class="aButton">Clear</button></a>
                            </form>

                        </div>
                    </div>

                    <div class="card-body">
                        @foreach ($reservoirs as $reservoir)
                            <div class="index">Title: {{ $reservoir->title }}</div>
                            <div class="index">Area: {{ $reservoir->area }}</div>
                            <div class="index">About: {!! $reservoir->about !!}</div>

                            <form method="POST" action="{{ route('reservoir.destroy', $reservoir) }}">
                                <a href="{{ route('reservoir.edit', [$reservoir]) }}" class="editButton">Edit</a>
                                @csrf
                                <button class="deleteButton" type="submit">Delete</button>
                            </form>
                            <br>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    @endsection
