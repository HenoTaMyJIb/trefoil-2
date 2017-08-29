<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Field;
use App\Person;
use App\Registration;
use App\Notifications\RegistrationCreated;
use App\User;
use App\Helpers\Datatable;
use App\Group;
use App\Gymnast;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationFeedback;
use App\Mail\RegistrationAccepted;
use Notification;

class RegistrationsController extends Controller
{
    /**
     * Instantiate a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['create', 'store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registrations = Registration::orderBy('created_at', 'desc')->get();
        $fields = Field::all();
        $groups = Group::all();

        return view('registrations.index', compact('registrations', 'fields', 'groups'));
    }

    /**
     *
     */
    public function fetch(Request $request)
    {
        $query = Registration::with('student', 'parent1', 'parent2', 'field')
            ->field($request->field)
            ->status($request->status);
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
        $fields = Field::all();

        return view('registrations.create', compact('fields'));
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
        $this->validate($request, [
            'field' => 'required',
            'student.firstname' => 'required|max:255',
            'student.lastname' => 'required|max:255',
            'student.personal_code' => 'required|numeric|digits :11|personal_code',
            'student.address' => 'required|max:1000',
            'student.email' => 'email|max:255',
            'student.phone' => 'max:255',

            'parent1.firstname' => 'required|max:255',
            'parent1.lastname' => 'required|max:255',
            'parent1.personal_code' => 'required|numeric|digits :11|personal_code',
            'parent1.address' => 'required|max:1000',
            'parent1.phone' => 'required',
            'parent1.email' => 'required|email|max:255',
            'parent1.work_place' => 'required|max:255',

            'parent2.firstname' => 'required_with:parent2.lastname,parent2.personal_code|max:255',
            'parent2.lastname' => 'required_with:parent2.firstname,parent2.personal_code|max:255',
            'parent2.personal_code' => 'required_with:parent2.firstname,parent2.lastname|numeric|digits :11|personal_code',
            'parent2.address' => 'max:1000',
            'parent2.email' => 'email|max:255',
            'parent2.work_place' => 'max:255',
        ]);

        $student = Person::create($request->student);
        $parent1 = Person::create($request->parent1);

        $parent2 = null;
        if ($request->parent2 && ($request->parent2['firstname'] && $request->parent2['lastname'] && $request->parent2['personal_code'])) {
            $parent2 = Person::create($request->parent2);
        }

        $registration = Registration::fromForm(
            $request->comment,
            $request->field,
            $student,
            $parent1,
            $parent2
        );

        Notification::send([User::superAdmin(), User::admin()], new RegistrationCreated($registration));
        Mail::to($parent1['email'])->queue(new RegistrationFeedback($registration));

        $request->session()->flash('status', 'Aitäh, registreerimine õnnestus! Me võtame Teiega ühendust.');

        return ['message' => 'Aitäh, registreerimine õnnestus! Me võtame Teiega ühendust.'];
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Registration $registration)
    {
        return view('registrations.show', compact('registration'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     *
     */
    public function waitingCount()
    {
        return Registration::status('waiting')->count();
    }

    /**
     *
     */
    public function accept(Request $request, Registration $registration)
    {
        $gymnast = Gymnast::forceCreate([
            'student_id' => $registration->student_id,
            'parent1_id' => $registration->parent1_id,
            'parent2_id' => $registration->parent2_id,
            'club_id' => env('ACTIVE_CLUB'),
            'group_id' => $request->group
        ]);

        $registration->update(['status' => 'accepted']);
        Mail::to($registration->parent1->email)->queue(new RegistrationAccepted($registration, $request->group));

        return response(['message' => 'ok']);
    }

    /**
     *
     */
    public function reject(Registration $registration)
    {
        $registration->update(['status' => 'rejected']);

        return response(['message' => 'ok']);
    }
}
