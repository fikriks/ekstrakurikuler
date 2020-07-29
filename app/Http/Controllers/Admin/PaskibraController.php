<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Paskibra;
use Illuminate\Http\Request;
use PDF;

class PaskibraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', Paskibra::class);

        $total = Paskibra::count();
        $search = $request->get('search');
        $paskibra = Paskibra::where('name', 'like', '%' . $search . '%')->paginate(10);
        $paskibra->appends(['search' => $search]);
        return view('admin.paskibra.index', compact('paskibra', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Paskibra::class);

        $kelas = Kelas::all();
        return view('admin.paskibra.create', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Paskibra::class);

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

        session()->flash('success', 'Berhasil menambahkan data');
        return redirect()->route('administrator.paskibra.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paskibra  $paskibra
     * @return \Illuminate\Http\Response
     */
    public function show(Paskibra $paskibra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paskibra  $paskibra
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', Paskibra::class);

        $paskibra = Paskibra::findOrFail($id);
        $kelas = Kelas::all();
        return view('admin.paskibra.edit', compact('paskibra', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paskibra  $paskibra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('update', Paskibra::class);

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

        Paskibra::findOrFail($id)->update([
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

        session()->flash('success', 'Berhasil mengubah data');
        return redirect()->route('administrator.paskibra.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paskibra  $paskibra
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paskibra = Paskibra::findOrFail($id);
        $paskibra->delete();

        session()->flash('success', 'Berhasil menghapus data');
        return redirect()->back();
    }

    public function cetak()
    {
        $paskibra = Paskibra::all();

        $pdf = PDF::loadview('admin.paskibra.pdf', compact('paskibra'));
        $pdf->output();
        $dom_pdf = $pdf->getDomPDF();

        $canvas = $dom_pdf->get_canvas();
        $canvas->page_text($canvas->get_width() - 70, $canvas->get_height() - 30, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, [0, 0, 0]);


        return $pdf->stream();
    }
}
