<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Reservoir;
use Illuminate\Http\Request;
use Validator;

class MemberController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $members = Member::orderBy('name', 'asc') -> paginate(10)->withQueryString();

        $dir = 'asc';
        $sort = 'name';
        $defaultHorse = 0;
        $reservoirs = Reservoir::orderBy('title') -> get();
        $s = '';


        // Rušiavimas

        if ($request -> sort_by && $request -> dir) {

            if ('name'== $request -> sort_by && 'asc'== $request -> dir) {
                $members = Member::orderBy('name') -> paginate(10)->withQueryString();
            } 
            
            elseif ('name'== $request -> sort_by && 'desc'== $request -> dir) {
                $members = Member::orderBy('name', 'desc') -> paginate(10)->withQueryString();
                $dir = 'desc';
            } 
            
            elseif ('experiance'== $request -> sort_by && 'asc'== $request -> dir) {
                $members = Member::orderBy('experiance') -> paginate(10)->withQueryString();
                $sort = 'experiance';
            } 
            
            elseif ('experiance'== $request -> sort_by && 'desc'== $request -> dir) {
                $members = Member::orderBy('experiance', 'desc') -> paginate(10)->withQueryString();
                $dir = 'desc';
                $sort = 'experiance';
            } 
            
            else {
                $member = Member::paginate(10)->withQueryString();
            }
        }

        // Filtravimas

        elseif ($request -> reservoir_id) {
            $members = Member::where('reservoir_id', (int)$request -> reservoir_id) -> paginate(10)->withQueryString();
            $defaultHorse = (int)$request -> reservoir_id;
        }

        // Paieška

        elseif ($request -> s) {
            $members = Member::where('name', 'like', '%'.$request -> s.'%') -> paginate(10)->withQueryString();
            $s = $request -> s;
        } 
        
        elseif ($request -> do_search) {
            $members = Member::where('name', 'like', '') -> paginate(10)->withQueryString();
        } 
        
        else {
            $members = Member::paginate(10)->withQueryString();
        }

        return view('member.index', [
            'members' => $members,
            'dir' => $dir,
            'sort' => $sort,
            'reservoirs' => $reservoirs,
            'defaultReservoir' => $defaultReservoir,
            's' => $s
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $members = Member::orderBy('name')->get();
        return view('better.create', ['members' => $members]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        //
    }
}
