<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Reservoir;
use Illuminate\Http\Request;
use Validator;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $defaultReservoir = 0;
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
            
            elseif ('surname'== $request -> sort_by && 'asc'== $request -> dir) {
                $members = Member::orderBy('surname') -> paginate(10)->withQueryString();
                $sort = 'surname';
            } 
            
            elseif ('surname'== $request -> sort_by && 'desc'== $request -> dir) {
                $members = Member::orderBy('surname', 'desc') -> paginate(10)->withQueryString();
                $dir = 'desc';
                $sort = 'surname';
            } 
            
            else {
                $member = Member::paginate(10)->withQueryString();
            }
        }

        // Filtravimas

        elseif ($request -> reservoir_id) {
            $members = Member::where('reservoir_id', (int)$request -> reservoir_id) -> paginate(10)->withQueryString();
            $defaultMember = (int)$request -> reservoir_id;
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
        $reservoirs = Reservoir::orderBy('title')->get();
        return view('member.create', ['reservoirs' => $reservoirs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            // 'member_name' => ['required', 'min:3', 'max:100', 'regex:/^[a-ąčęėįšųūžĄČĘĖĮŠŲŪŽ]+$/i'],
            'member_name' => ['required', 'min:3', 'max:100', 'alpha'],
            'member_surname' => ['required', 'min:3', 'max:150', 'alpha'],
            'member_live' => ['required', 'min:1', 'max:100'],
            'member_experience' => ['required', 'min:1', 'max:150'],
            'member_registered' => ['required', 'min:1', 'max:150'],
            'reservoir_id' => ['required', 'integer', 'min:1']
        ],
        );
        
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $member = new Member;
        $member->name = $request->member_name;
        $member->surname = $request->member_surname;
        $member->live = $request->member_live;
        $member->experience = $request->member_experience;
        $member->registered = $request->member_registered;
        $member->reservoir_id = $request->reservoir_id;
        $member->save();
        return redirect()->route('member.index')->with('success_message', 'New Member create.');
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
        $reservoirs = Reservoir::all();
        return view('member.edit', ['member' => $member, 'reservoirs' => $reservoirs]);
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
        $validator = Validator::make($request->all(),
        [
            'member_name' => ['required', 'min:3', 'max:100', 'alpha'],
            'member_surname' => ['required', 'min:3', 'max:150', 'alpha'],
            'member_live' => ['required', 'min:1', 'max:100'],
            'member_experience' => ['required'],
            'member_registered' => ['required', 'min:1', 'max:150'],
            'reservoir_id' => ['required', 'integer', 'min:1']
        ],
        );
        
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        
        $member = new Member;
        $member->name = $request->member_name;
        $member->surname = $request->member_surname;
        $member->live = $request->member_live;
        $member->experience = $request->member_experience;
        $member->registered = $request->member_registered;
        $member->reservoir_id = $request->reservoir_id;
        $member->save();
        return redirect()->route('member.index')->with('success_message', 'Member updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('member.index')->with('success_message', 'Member deleted.');
    }
}
