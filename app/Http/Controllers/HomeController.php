<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Pramuka;
use App\Models\Paskibra;
use App\Models\Pmr;
use App\Models\Rohis;
use App\Models\Marching;
use App\Models\Seni;
use App\Models\Volly;
use App\Models\Futsal;
use App\Models\Silat;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function pramuka()
    {
        $kelas = Kelas::all();
        return view('formulir.pramuka', compact('kelas'));
    }

    public function pramuka_store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'class' => 'required|exists:class,id',
            'school_origin' => 'required|string|min:7',
            'place_of_birth' => 'required|string|min:3',
            'date_of_birth' => 'required|date',
            'address' => 'required|string|min:8',
            'gender' => 'required|in:Male,Female',
            'phone_number' => 'required|numeric|min:11',
            'hobby' => 'required|string|min:5',
            'life_motto' => 'required|string|min:8',
            'reason' => 'required|string|min:8'
        ]);

        Pramuka::create([
            'name' => $request->name,
            'class_id' => $request->class,
            'school_origin' => $request->school_origin,
            'place_of_birth' => $request->place_of_birth,
            'date_of_birth' => $request->date_of_birth,
            'address' => $request->address,
            'gender' => $request->gender,
            'phone_number' => $request->phone_number,
            'hobby' => $request->hobby,
            'life_motto' => $request->life_motto,
            'reason' => $request->reason,
        ]);

        session()->flash('success', 'Pendaftaran berhasil');
        return redirect()->route('home.pramuka');
    }

    public function paskibra()
    {
        $kelas = Kelas::all();

        return view('formulir.paskibra', compact('kelas'));
    }

    public function paskibra_store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|min:3',
            'class' => 'required|exists:class,id',
            'school_origin' => 'required|string|min:7',
            'place_of_birth' => 'required|string|min:3',
            'date_of_birth' => 'required|date',
            'phone_number' => 'required|numeric|min:11',
            'hobby' => 'required|string|min:5',
            'future_goals' => 'required|string|min:4',
            'motivation' => 'required|string|min:8',
            'permission' => 'required|in:Ya,Tidak'
        ]);

        Paskibra::create([
            'name' => $request->name,
            'class_id' => $request->class,
            'school_origin' => $request->school_origin,
            'place_of_birth' => $request->place_of_birth,
            'date_of_birth' => $request->date_of_birth,
            'phone_number' => $request->phone_number,
            'hobby' => $request->hobby,
            'future_goals' => $request->future_goals,
            'motivation' => $request->motivation,
            'permission_of_parents' => $request->permission
        ]);

        session()->flash('success', 'Pendaftaran berhasil');
        return redirect()->route('home.paskibra');
    }

    public function pmr()
    {
        $kelas = Kelas::all();

        return view('formulir.pmr', compact('kelas'));
    }

    public function pmr_store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|min:3',
            'class' => 'required|exists:class,id',
            'place_of_birth' => 'required|string|min:3',
            'date_of_birth' => 'required|date',
            'phone_number' => 'required|numeric|min:11',
            'religion' => 'required|in:Islam,Kristen,Katolik,Hindu,Buddha,Konghucu',
            'hobby' => 'required|string|min:5',
            'reason' => 'required|string|min:8',
            'life_motto' => 'required|string|min:8',
            'gender' => 'required|in:Male,Female',
            'photo' => 'required|file|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $photo = $request->file('photo');
        $image_name = $photo->hashName();
        $photo->storeAs('/img/pmr', $image_name, 'public');

        Pmr::create([
            'name' => $request->name,
            'class_id' => $request->class,
            'place_of_birth' => $request->place_of_birth,
            'date_of_birth' => $request->date_of_birth,
            'phone_number' => $request->phone_number,
            'religion' => $request->religion,
            'hobby' => $request->hobby,
            'reason' => $request->reason,
            'life_motto' => $request->life_motto,
            'gender' => $request->gender,
            'photo' => $image_name
        ]);

        session()->flash('success', 'Pendaftaran berhasil');
        return redirect()->route('home.pmr');
    }

    public function rohis()
    {
        $kelas = Kelas::all();

        return view('formulir.rohis', compact('kelas'));
    }

    public function rohis_store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|min:3',
            'class' => 'required|exists:class,id',
            'phone_number' => 'required|numeric|min:11',
            'reason' => 'required|string|min:8'
        ]);

        Rohis::create([
            'name' => $request->name,
            'class_id' => $request->class,
            'phone_number' => $request->phone_number,
            'reason' => $request->reason,
        ]);

        session()->flash('success', 'Pendaftaran berhasil');
        return redirect()->route('home.rohis');
    }

    public function silat()
    {
        $kelas = Kelas::all();

        return view('formulir.silat', compact('kelas'));
    }

    public function silat_store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|min:3',
            'class' => 'required|exists:class,id',
            'place_of_birth' => 'required|string|min:3',
            'date_of_birth' => 'required|date',
            'phone_number' => 'required|numeric|min:11',
            'reason' => 'required|string|min:8'
        ]);

        Silat::create([
            'name' => $request->name,
            'class_id' => $request->class,
            'place_of_birth' => $request->place_of_birth,
            'date_of_birth' => $request->date_of_birth,
            'phone_number' => $request->phone_number,
            'reason' => $request->reason,
        ]);

        session()->flash('success', 'Pendaftaran berhasil');
        return redirect()->route('home.silat');
    }

    public function marching()
    {
        $kelas = Kelas::all();

        return view('formulir.marching', compact('kelas'));
    }

    public function marching_store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|min:3',
            'class' => 'required|exists:class,id',
            'school_origin' => 'required|string|min:7',
            'phone_number' => 'required|numeric|min:11',
            'tool' => 'required|in:Senar,Bass,Tenor,Triotom,Kuartom,Symbal,Mayoret,Colorguard,Bell',
            'reason' => 'required|string|min:8'
        ]);

        Marching::create([
            'name' => $request->name,
            'class_id' => $request->class,
            'school_origin' => $request->school_origin,
            'phone_number' => $request->phone_number,
            'tool' => $request->tool,
            'reason' => $request->reason
        ]);

        session()->flash('success', 'Pendaftaran berhasil');
        return redirect()->route('home.marching');
    }

    public function seni()
    {
        $kelas = Kelas::all();

        return view('formulir.seni', compact('kelas'));
    }

    public function seni_store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|min:3',
            'class' => 'required|exists:class,id',
            'place_of_birth' => 'required|string|min:3',
            'date_of_birth' => 'required|date',
            'phone_number' => 'required|numeric|min:11',
            'category' => 'required|in:Music,Dance,Teater',
            'life_motto' => 'required|string|min:8',
        ]);

        Seni::create([
            'name' => $request->name,
            'class_id' => $request->class,
            'place_of_birth' => $request->place_of_birth,
            'date_of_birth' => $request->date_of_birth,
            'phone_number' => $request->phone_number,
            'category' => $request->category,
            'life_motto' => $request->life_motto,
        ]);

        session()->flash('success', 'Pendaftaran berhasil');
        return redirect()->route('home.seni');
    }

    public function futsal()
    {
        $kelas = Kelas::all();

        return view('formulir.futsal', compact('kelas'));
    }

    public function futsal_store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|min:3',
            'class' => 'required|exists:class,id',
            'phone_number' => 'required|numeric|min:11',
            'gender' => 'required|in:Male,Female',
        ]);

        Futsal::create([
            'name' => $request->name,
            'class_id' => $request->class,
            'phone_number' => $request->phone_number,
            'gender' => $request->gender
        ]);

        session()->flash('success', 'Pendaftaran berhasil');
        return redirect()->route('home.futsal');
    }

    public function volly()
    {
        $kelas = Kelas::all();

        return view('formulir.volly', compact('kelas'));
    }

    public function volly_store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|min:3',
            'class' => 'required|exists:class,id',
            'address' => 'required|string|min:8',
            'parents_name' => 'required|string|min:3',
            'place_of_birth' => 'required|string|min:3',
            'date_of_birth' => 'required|date',
            'phone_number' => 'required|numeric|min:11',
            'hobby' => 'required|string|min:5',
            'disiase' => 'nullable|string|min:3',
            'gender' => 'required|in:Male,Female',
            'achievement' => 'nullable|string|min:3',
            'photo' => 'required|file|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $photo = $request->file('photo');
        $image_name = $photo->hashName();
        $photo->storeAs('/img/volly', $image_name, 'public');

        Volly::create([
            'name' => $request->name,
            'class_id' => $request->class,
            'address' => $request->address,
            'parents_name' => $request->parents_name,
            'place_of_birth' => $request->place_of_birth,
            'date_of_birth' => $request->date_of_birth,
            'phone_number' => $request->phone_number,
            'hobby' => $request->hobby,
            'history_of_disiase' => $request->disiase,
            'achievement' => $request->achievement,
            'gender' => $request->gender,
            'photo' => $photo->hashName()
        ]);

        session()->flash('success', 'Pendaftaran berhasil');
        return redirect()->route('home.volly');
    }
}
