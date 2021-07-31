<?php

namespace App\Http\Controllers;

use App\Models\Reservoir;
use Illuminate\Http\Member;
use Illuminate\Http\Request;
use Validator;

class ReservoirController extends Controller
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
        $reservoirs = Reservoir::orderBy('title', 'asc') -> paginate(10)->withQueryString();

        $dir = 'asc';
        $sort = 'title';
        $defaultReservoir = 0;
        $s = '';


        // Rušiavimas

        if ($request -> sort_by && $request -> dir) {

            if ('title'== $request -> sort_by && 'asc'== $request -> dir) {
                $reservoirs = Reservoir::orderBy('title') -> paginate(10)->withQueryString();
            } 
            
            elseif ('title'== $request -> sort_by && 'desc'== $request -> dir) {
                $reservoirs = Reservoir::orderBy('title', 'desc') -> paginate(10)->withQueryString();
                $dir = 'desc';
            } 
            
            elseif ('area'== $request -> sort_by && 'asc'== $request -> dir) {
                $reservoirs = Reservoir::orderBy('area') -> paginate(10)->withQueryString();
                $sort = 'area';
            } 
            
            elseif ('area'== $request -> sort_by && 'desc'== $request -> dir) {
                $reservoirs = Reservoir::orderBy('area', 'desc') -> paginate(10)->withQueryString();
                $dir = 'desc';
                $sort = 'area';
            } 
            
            else {
                $reservoir = Reservoir::paginate(10)->withQueryString();
            }
        }

        // // Filtravimas

        // elseif ($request -> reservoir_id) {
        //     $reservoirs = Reservoir::where('reservoir_id', (int)$request -> reservoir_id) -> paginate(10)->withQueryString();
        //     $defaultReservoir = (int)$request -> reservoir_id;
        // }

        // // Paieška

        // elseif ($request -> s) {
        //     $reservoirs = Reservoir::where('title', 'like', '%'.$request -> s.'%') -> paginate(10)->withQueryString();
        //     $s = $request -> s;
        // } 
        
        // elseif ($request -> do_search) {
        //     $reservoirs = Reservoir::where('title', 'like', '') -> paginate(10)->withQueryString();
        // } 
        
        else {
            $reservoirs = Reservoir::paginate(10)->withQueryString();
        }

        return view('reservoir.index', [
            'reservoirs' => $reservoirs,
            'dir' => $dir,
            'sort' => $sort,
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
        return view('reservoir.create');
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
            'reservoir_title' => ['required', 'min:3', 'max:200', 'alpha'],
            'reservoir_area' => ['required'],
            'reservoir_about' => ['required']
        ],
        );

        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
 
        $reservoir = new Reservoir;
        $reservoir->title = $request->reservoir_title;
        $reservoir->area = $request->reservoir_area;
        $reservoir->about = $request->reservoir_about;
        $reservoir->save();
        return redirect()->route('reservoir.index')->with('success_message', 'New Reservoir created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservoir  $reservoir
     * @return \Illuminate\Http\Response
     */
    public function show(Reservoir $reservoir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservoir  $reservoir
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservoir $reservoir)
    {
        return view('reservoir.edit', ['reservoir' => $reservoir]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservoir  $reservoir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservoir $reservoir)
    {
        $validator = Validator::make(
            $request->all(),
        [
            'reservoir_title' => ['required', 'min:3', 'max:200', 'alpha'],
            'reservoir_area' => ['required'],
            'reservoir_about' => ['required']
        ],
        
        [
            'reservoir_name.min' => 'Min. 3 symbols required.',
            'reservoir_name.max' => 'Max. 200 symbols required.',
        ]
        );

        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $reservoir->title = $request->reservoir_title;
        $reservoir->area = $request->reservoir_area;
        $reservoir->about = $request->reservoir_about;
        $reservoir->save();
        return redirect()->route('reservoir.index')->with('success_message', 'Reservoir updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservoir  $reservoir
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservoir $reservoir)
    {
        if($reservoir->reservoirHasMembers->count()){
            return redirect()->route('reservoir.index')->with('info_message', 'Couldn\'t delete - Reservoir still has active Members.');
        }
        $reservoir->delete();
        return redirect()->route('reservoir.index')->with('success_message', 'Reservoir deleted successfully.');
    }
}
