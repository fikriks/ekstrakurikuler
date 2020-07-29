<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Futsal;
use App\Models\Kelas;
use Illuminate\Http\Request;
use PDF;

class FutsalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize(Futsal::class);
        $total = Futsal::count();
        $search = $request->get('search');
        $futsal = Futsal::where('name', 'like', '%' . $search . '%')->paginate(10);
        $futsal->appends(['search' => $search]);
        return view('admin.futsal.index', compact('futsal', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Futsal::class);
        $kelas = Kelas::all();
        return view('admin.futsal.create', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Futsal::class);

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

        session()->flash('success', 'Berhasil menambahkan data');
        return redirect()->route('administrator.futsal.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Futsal  $futsal
     * @return \Illuminate\Http\Response
     */
    public function show(Futsal $futsal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Futsal  $futsal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', Futsal::class);

        $futsal = Futsal::findOrFail($id);
        $kelas = Kelas::all();
        return view('admin.futsal.edit', compact('kelas', 'futsal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Futsal  $futsal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('update', Futsal::class);
        $request->validate([
            'name' => 'required|string|min:3',
            'class' => 'required|exists:class,id',
            'phone_number' => 'required|numeric|min:11',
            'gender' => 'required|in:Male,Female',
        ]);

        Futsal::findOrFail($id)->update([
            'name' => $request->name,
            'class_id' => $request->class,
            'phone_number' => $request->phone_number,
            'gender' => $request->gender
        ]);

        session()->flash('success', 'Berhasil mengubah data');
        return redirect()->route('administrator.futsal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Futsal  $futsal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $futsal = Futsal::findOrFail($id);
        $futsal->delete();

        session()->flash('success', 'Berhasil menghapus data');
        return redirect()->back();
    }

    public function cetak()
    {
        $futsal = Futsal::all();

        $pdf = PDF::loadview('admin.futsal.pdf', compact('futsal'));
        $pdf->output();
        $dom_pdf = $pdf->getDomPDF();

        $canvas = $dom_pdf->get_canvas();
        $canvas->page_text($canvas->get_width() - 70, $canvas->get_height() - 30, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, [0, 0, 0]);


        return $pdf->stream();
    }
}
