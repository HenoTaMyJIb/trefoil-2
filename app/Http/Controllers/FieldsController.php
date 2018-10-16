<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Datatable;
use App\Field;

class FieldsController extends Controller
{
    /**
     * Instantiate a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('fields.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetch(Request $request)
    {
        $query = Field::query();

        return (new Datatable($query))
            ->order($request->sort)
            ->get();
    }

    /**
     *
     */
    public function isFull(Field $field)
    {
        $field->update(['is_full' => true]);

        return response('ok');
    }

    /**
     *
     */
    public function notFull(Field $field)
    {
        $field->update(['is_full' => false]);

        return response('ok');
    }

    public function store(Request $request)
    {
        $field = Field::create([
            'name' => $request->name,
            'is_full' => 0,
            'description' => $request->description,
            'hall' => $request->hall
        ]);

        return response('ok');
    }

    public function update(Request $request, Field $field)
    {
        $field->update([
            'name' => $request->name,
            'is_full' => $request->is_full,
            'description' => $request->description,
            'hall' => $request->hall
        ]);

        return response('ok');
    }
}
