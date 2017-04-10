<?php

namespace App\Http\Controllers;

use App\Group;
use App\Coach;
use Illuminate\Http\Request;
use App\Helpers\Datatable;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coaches = Coach::club(env('ACTIVE_CLUB'))->with('person')->get();

        return view('groups.index', compact('coaches'));
    }

    /**
     *
     */
    public function fetch(Request $request)
    {
        $query = Group::query();

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
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Group $group
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Group $group
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Group               $group
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        $group->name = $request->name;
        $group->notes = $request->notes;
        $group->save();
        $group->coaches()->sync($request->coaches);

        return ['ok'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Group $group
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        //
    }
}
