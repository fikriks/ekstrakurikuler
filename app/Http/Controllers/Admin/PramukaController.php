<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Pramuka;
use Illuminate\Http\Request;
use PDF;

class PramukaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', Pramuka::class);
        $total = Pramuka::count();
        $search = $request->get('search');
        $pramuka = Pramuka::where('name', 'like', '%' . $search . '%')->paginate(10);
        $pramuka->appends(['search' => $search]);
        return view('admin.pramuka.index', compact('pramuka', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Pramuka::class);

        $kelas = Kelas::all();
        return view('admin.pramuka.create', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Pramuka::class);

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

        session()->flash('success', 'Berhasil menambahkan data');
        return redirect()->route('administrator.pramuka.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pramuka  $pramuka
     * @return \Illuminate\Http\Response
     */
    public function show(Pramuka $pramuka)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pramuka  $pramuka
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', Pramuka::class);

        $pramuka = Pramuka::findOrFail($id);
        $kelas = Kelas::all();
        return view('admin.pramuka.edit', compact('pramuka', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pramuka  $pramuka
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('update', Pramuka::class);

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

        Pramuka::findOrFail($id)->update([
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

        session()->flash('success', 'Berhasil mengubah data');
        return redirect()->route('administrator.pramuka.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pramuka  $pramuka
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pramuka = Pramuka::findOrFail($id);
        $pramuka->delete();

        session()->flash('success', 'Berhasil menghapus data');
        return redirect()->back();
    }

    public function cetak()
    {
        $pramuka = Pramuka::all();

        $pdf = PDF::loadview('admin.pramuka.pdf', compact('pramuka'));
        $pdf->output();
        $dom_pdf = $pdf->getDomPDF();

        $canvas = $dom_pdf->get_canvas();
        $canvas->page_text($canvas->get_width() - 70, $canvas->get_height() - 30, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, [0, 0, 0]);


        return $pdf->stream();
    }
}
