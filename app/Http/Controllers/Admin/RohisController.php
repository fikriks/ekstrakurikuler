<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rohis;
use Illuminate\Http\Request;
use PDF;
use App\Models\Kelas;

class RohisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', Rohis::class);
        $total = Rohis::count();
        $search = $request->get('search');
        $rohis = Rohis::where('name', 'like', '%' . $search . '%')->paginate(10);
        $rohis->appends(['search' => $search]);
        return view('admin.rohis.index', compact('rohis', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Rohis::class);
        $kelas = Kelas::all();
        return view('admin.rohis.create', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Rohis::class);

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

        session()->flash('success', 'Berhasil menambahkan data');
        return redirect()->route('administrator.rohis.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rohis  $rohis
     * @return \Illuminate\Http\Response
     */
    public function show(Rohis $rohis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rohis  $rohis
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', Rohis::class);
        $rohis = Rohis::findOrFail($id);
        $kelas = Kelas::all();
        return view('admin.rohis.edit', compact('rohis', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rohis  $rohis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('update', Rohis::class);

        $request->validate([
            'name' => 'required|string|min:3',
            'class' => 'required|exists:class,id',
            'phone_number' => 'required|numeric|min:11',
            'reason' => 'required|string|min:8'
        ]);

        Rohis::findOrFail($id)->update([
            'name' => $request->name,
            'class_id' => $request->class,
            'phone_number' => $request->phone_number,
            'reason' => $request->reason,
        ]);

        session()->flash('success', 'Berhasil mengubah data');
        return redirect()->route('administrator.rohis.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rohis  $rohis
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', Rohis::class);

        $rohis = Rohis::findOrFail($id);
        $rohis->delete();
        session()->flash('success', 'Berhasil menghapus data');

        return redirect()->back();
    }

    public function cetak()
    {
        $rohis = Rohis::all();
        $pdf = PDF::loadview('admin.rohis.pdf', compact('rohis'));
        $pdf->output();
        $dom_pdf = $pdf->getDomPDF();

        $canvas = $dom_pdf->get_canvas();
        $canvas->page_text($canvas->get_width() - 70, $canvas->get_height() - 30, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, [0, 0, 0]);


        return $pdf->stream();
    }
}
