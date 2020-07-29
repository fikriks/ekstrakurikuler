<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Volly;
use Illuminate\Http\Request;
use Storage;
use PDF;

class VollyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', Volly::class);
        $total = Volly::count();
        $search = $request->get('search');
        $volly = VOlly::where('name', 'like', '%' . $search . '%')->paginate(10);
        $volly->appends(['search' => $search]);
        return view('admin.volly.index', compact('volly', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Volly::class);

        $kelas = Kelas::all();
        return view('admin.volly.create', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Volly::class);

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

        session()->flash('success', 'Berhasil menambahkan data');
        return redirect()->route('administrator.volly.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Volly  $volly
     * @return \Illuminate\Http\Response
     */
    public function show(Volly $volly)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Volly  $volly
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', Volly::class);

        $volly = Volly::findOrFail($id);
        $kelas = Kelas::all();
        return view('admin.volly.edit', compact('volly', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Volly  $volly
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('update', Volly::class);

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
            'photo' => 'file|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $volly = Volly::findOrFail($id);
        $volly->name = $request->name;
        $volly->class_id = $request->class;
        $volly->address = $request->address;
        $volly->parents_name = $request->parents_name;
        $volly->place_of_birth = $request->place_of_birth;
        $volly->date_of_birth = $request->date_of_birth;
        $volly->phone_number = $request->phone_number;
        $volly->hobby = $request->hobby;
        $volly->history_of_disiase = $request->disiase;
        $volly->achievement = $request->achievement;
        $volly->gender = $request->gender;

        if ($request->hasFile('photo')) {
            Storage::delete('public/img/volly' . $volly->photo);
            $photo = $request->file('photo');
            $image_name = $photo->hashName();
            $photo->storeAs('/img/volly', $image_name, 'public');
            $volly->photo = $image_name;
        }
        $volly->save();

        session()->flash('success', 'Berhasil mengubah data');
        return redirect()->route('administrator.volly.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Volly  $volly
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', Volly::class);

        $volly = Volly::findOrFail($id);
        Storage::delete('public/img/volly/' . $volly->photo);
        $volly->delete();

        session()->flash('success', 'Sukses menghapus data');
        return redirect()->back();
    }

    public function cetak()
    {
        $volly = Volly::all();

        $pdf = PDF::loadview('admin.volly.pdf', compact('volly'));
        $pdf->output();
        $dom_pdf = $pdf->getDomPDF();

        $canvas = $dom_pdf->get_canvas();
        $canvas->page_text($canvas->get_width() - 70, $canvas->get_height() - 30, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, [0, 0, 0]);


        return $pdf->stream();
    }
}
