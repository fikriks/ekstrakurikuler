<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Marching;
use Illuminate\Http\Request;
use PDF;

class MarchingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', Marching::class);
        $total = Marching::count();
        $search = $request->get('search');
        $marching = Marching::where('name', 'like', '%' . $search . '%')->paginate(10);
        $marching->appends(['search' => $search]);
        return view('admin.marching.index', compact('marching', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Marching::class);

        $kelas = Kelas::all();
        return view('admin.marching.create', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Marching::class);

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

        session()->flash('success', 'Berhasil menambahkan data');
        return redirect()->route('administrator.marching.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Marching  $marching
     * @return \Illuminate\Http\Response
     */
    public function show(Marching $marching)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Marching  $marching
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', Marching::class);

        $marching = Marching::findOrFail($id);
        $kelas = Kelas::all();

        return view('admin.marching.edit', compact('marching', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Marching  $marching
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('update', Marching::class);

        $request->validate([
            'name' => 'required|string|min:3',
            'class' => 'required|exists:class,id',
            'school_origin' => 'required|string|min:7',
            'phone_number' => 'required|numeric|min:11',
            'tool' => 'required|in:Senar,Bass,Tenor,Triotom,Kuartom,Symbal,Mayoret,Colorguard,Bell',
            'reason' => 'required|string|min:8'
        ]);

        Marching::findOrFail($id)->update([
            'name' => $request->name,
            'class_id' => $request->class,
            'school_origin' => $request->school_origin,
            'phone_number' => $request->phone_number,
            'tool' => $request->tool,
            'reason' => $request->reason
        ]);

        session()->flash('success', 'Berhasil mengubah data');
        return redirect()->route('administrator.marching.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Marching  $marching
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', Marching::class);

        $marching = Marching::findOrFail($id);
        $marching->delete();

        session()->flash('success', 'Berhasil menghapus data');
        return redirect()->back();
    }

    public function cetak()
    {
        $marching = Marching::all();

        $pdf = PDF::loadview('admin.marching.pdf', compact('marching'));
        $pdf->output();
        $dom_pdf = $pdf->getDomPDF();

        $canvas = $dom_pdf->get_canvas();
        $canvas->page_text($canvas->get_width() - 70, $canvas->get_height() - 30, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, [0, 0, 0]);


        return $pdf->stream();
    }
}
