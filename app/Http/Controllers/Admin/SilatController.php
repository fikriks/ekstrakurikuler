<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Silat;
use Illuminate\Http\Request;
use PDF;

class SilatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize(Silat::class);
        $total = Silat::count();
        $search = $request->get('search');
        $silat = Silat::where('name', 'like', '%' . $search . '%')->paginate(10);
        $silat->appends(['search' => $search]);
        return view('admin.silat.index', compact('silat', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Silat::class);

        $kelas = Kelas::all();
        return view('admin.silat.create', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Silat::class);

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

        session()->flash('success', 'Berhasil menambahkan data');
        return redirect()->route('administrator.silat.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Silat  $silat
     * @return \Illuminate\Http\Response
     */
    public function show(Silat $silat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Silat  $silat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', Silat::class);

        $silat = Silat::findOrFail($id);
        $kelas = Kelas::all();
        return view('admin.silat.edit', compact('silat', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Silat  $silat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('update', Silat::class);

        $request->validate([
            'name' => 'required|string|min:3',
            'class' => 'required|exists:class,id',
            'place_of_birth' => 'required|string|min:3',
            'date_of_birth' => 'required|date',
            'phone_number' => 'required|numeric|min:11',
            'reason' => 'required|string|min:8'
        ]);

        Silat::findOrFail($id)->update([
            'name' => $request->name,
            'class_id' => $request->class,
            'place_of_birth' => $request->place_of_birth,
            'date_of_birth' => $request->date_of_birth,
            'phone_number' => $request->phone_number,
            'reason' => $request->reason,
        ]);

        session()->flash('success', 'Berhasil mengubah data');
        return redirect()->route('administrator.silat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Silat  $silat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $silat = Silat::findOrFail($id);
        $silat->delete();

        session()->flash('success', 'Berhasil menghapus data');
        return redirect()->back();
    }

    public function cetak()
    {
        $silat = Silat::all();

        $pdf = PDF::loadview('admin.silat.pdf', compact('silat'));
        $pdf->output();
        $dom_pdf = $pdf->getDomPDF();

        $canvas = $dom_pdf->get_canvas();
        $canvas->page_text($canvas->get_width() - 70, $canvas->get_height() - 30, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, [0, 0, 0]);


        return $pdf->stream();
    }
}
