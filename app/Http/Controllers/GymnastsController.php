<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gymnast;
use App\Helpers\Datatable;
use App\Group;

class GymnastsController extends Controller
{
    /**
     * Instantiate a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::all();

        return view ('gymnasts.index', compact('groups'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetch(Request $request)
    {
        $query = Gymnast::currentClub()->with('student', 'parent1', 'parent2', 'group')
            ->byGroup($request->group);

        if ($request->search) {
            $query->whereHas('student', function ($q) use ($request) {
                $q->where('personal_code', 'like', "%$request->search%")
                    ->orWhere('firstname', 'like', "%$request->search%")
                    ->orWhere('lastname', 'like', "%$request->search%");
            })->get();
        }

        return (new Datatable($query))
            ->order($request->sort)
            ->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
