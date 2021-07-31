@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card">
                    <div class="card-header">

                        <h3 class="titleBetters">Members</h3>

                        <div>
                            <form action="{{ route('member.index') }}" method="get" class="sort-form">
                                <fieldset>
                                    <legend>Sort by</legend>
                                    <div>
                                        <label>Member name</label>
                                        <input type="radio" name="sort_by" value="name" @if ('name' == $sort) checked @endif>
                                        <label>Member surname</label>
                                        <input type="radio" name="sort_by" value="surname" @if ('surname' == $sort) checked @endif>
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
                                <a href="{{ route('member.index') }}" class="aButton">Clear</button></a>
                            </form>

                            <form action="{{ route('member.index') }}" method="get" class="sort-form">
                                <fieldset class="filterBy">
                                    <legend>Filter by</legend>
                                    <select class="index" name="reservoir_id"><br>
                                        @foreach ($reservoirs as $reservoir)
                                            <option value="{{ $reservoir->id }}" @if($defaultHorse == $reservoir->id) selected @endif>
                                                Reservoir title: {{ $reservoir->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </fieldset>
                                <button class="addButtonCreate" type="submit">Filter</button>
                                <a href="{{ route('member.index') }}" class="aButton">Clear</button></a>
                            </form>

                            <form action="{{ route('member.index') }}" method="get" class="sort-form">
                                <fieldset class="searchBy">
                                    <legend>Search by</legend>
                                    <input placeholder="Serach by member" type="text" class="index" name="s" value="{{$s}}">
                                </fieldset>
                                <button class="addButtonCreate" type="submit" name="do_search" value="1">Search</button>
                                <a href="{{ route('member.index') }}" class="aButton">Clear</button></a>
                            </form>
                        </div>
                    </div>

                <div class="pager-links">
                {{ $members->links() }}
                </div>

                    <div class="card-body">

                        @forelse ($members as $member)
                            <div class="index">Member name: {{ $member->name }}</div>
                            <div class="index">Member surname: {{ $member->surname }} ({{ $member->live}} €)</div>
                            <div class="index">Reservoir name: {{ $member->memberReservoir->name }}
                                {{ $member->memberReservoir->surname }}</div>
                            <form method="POST" action="{{ route('member.destroy', [$member]) }}">
                                <a href="{{ route('member.edit', [$member]) }}" class="editButton">Edit</a>
                                @csrf
                                <button class="deleteButton" type="submit">Delete</button>
                            </form><br>

                            @empty 
                            <h3 class="title">No Results 😛</h3>
                        @endforelse

                    </div>
                <div class="pager-links">
                {{ $members->links() }}
            </div>
        </div>
    </div>
@endsection


