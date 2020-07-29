<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Seni;
use Illuminate\Http\Request;
use PDF;

class SeniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', Seni::class);
        $total = Seni::count();
        $search = $request->get('search');
        $seni = Seni::where('name', 'like', '%' . $search . '%')->paginate(10);
        $seni->appends(['search' => $search]);
        return view('admin.seni.index', compact('seni', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Seni::class);

        $kelas = Kelas::all();
        return view('admin.seni.create', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Seni::class);

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

        session()->flash('success', 'Berhasil menambahkan data');
        return redirect()->route('administrator.seni.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Seni  $seni
     * @return \Illuminate\Http\Response
     */
    public function show(Seni $seni)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Seni  $seni
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', Seni::class);

        $kelas = Kelas::all();
        $seni = Seni::findOrFail($id);

        return view('admin.seni.edit', compact('seni', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Seni  $seni
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('update', Seni::class);

        $request->validate([
            'name' => 'required|string|min:3',
            'class' => 'required|exists:class,id',
            'place_of_birth' => 'required|string|min:3',
            'date_of_birth' => 'required|date',
            'phone_number' => 'required|numeric|min:11',
            'category' => 'required|in:Music,Dance,Teater',
            'life_motto' => 'required|string|min:8',
        ]);

        Seni::findOrFail($id)->update([
            'name' => $request->name,
            'class_id' => $request->class,
            'place_of_birth' => $request->place_of_birth,
            'date_of_birth' => $request->date_of_birth,
            'phone_number' => $request->phone_number,
            'category' => $request->category,
            'life_motto' => $request->life_motto,
        ]);

        session()->flash('success', 'Berhasil mengubah data');
        return redirect()->route('administrator.seni.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seni  $seni
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', Seni::class);

        $seni = Seni::findOrFail($id);
        $seni->delete();

        session()->flash('success', 'Berhasil menghapus data');
        return redirect()->back();
    }

    public function cetak()
    {
        $seni = Seni::all();

        $pdf = PDF::loadview('admin.seni.pdf', compact('seni'));
        $pdf->output();
        $dom_pdf = $pdf->getDomPDF();

        $canvas = $dom_pdf->get_canvas();
        $canvas->page_text($canvas->get_width() - 70, $canvas->get_height() - 30, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, [0, 0, 0]);


        return $pdf->stream();
    }
}
