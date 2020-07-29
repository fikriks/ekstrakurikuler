<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Pmr;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Storage;
use PDF;

class PmrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $this->authorize('viewAny', Pmr::class);
        $total = Pmr::count();
        $search = $request->get('search');
        $pmr = Pmr::where('name', 'like', '%' . $search . '%')->paginate(10);
        $pmr->appends(['search' => $search]);
        return view('admin.pmr.index', compact('pmr', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Pmr::class);

        $kelas = Kelas::all();
        return view('admin.pmr.create', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Pmr::class);

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

        session()->flash('success', 'Berhasil menambahkan data');
        return redirect()->route('administrator.pmr.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pmr  $pmr
     * @return \Illuminate\Http\Response
     */
    public function show(Pmr $pmr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pmr  $pmr
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', Pmr::class);

        $pmr = Pmr::findOrFail($id);
        $kelas = Kelas::all();

        return view('admin.pmr.edit', compact('pmr', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pmr  $pmr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('update', Pmr::class);

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
            'photo' => 'file|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $pmr = Pmr::findOrFail($id);
        $pmr->name = $request->name;
        $pmr->class_id = $request->class;
        $pmr->place_of_birth = $request->place_of_birth;
        $pmr->date_of_birth = $request->date_of_birth;
        $pmr->phone_number = $request->phone_number;
        $pmr->religion = $request->religion;
        $pmr->hobby = $request->hobby;
        $pmr->reason = $request->reason;
        $pmr->life_motto = $request->life_motto;
        $pmr->gender = $request->gender;

        if ($request->hasFile('photo')) {
            Storage::delete('public/img/pmr/' . $pmr->photo);
            $photo = $request->file('photo');
            $image_name = $photo->hashName();
            $photo->storeAs('/img/pmr', $image_name, 'public');
            $pmr->photo = $image_name;
        }
        $pmr->save();

        session()->flash('success', 'Berhasil mengubah data');
        return redirect()->route('administrator.pmr.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pmr  $pmr
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', Pmr::class);
        $pmr = Pmr::findOrFail($id);
        Storage::delete('public/img/pmr/' . $pmr->photo);
        $pmr->delete();

        session()->flash('success', 'Berhasil menghapus data');
        return redirect()->back();
    }

    public function cetak()
    {
        $pmr = Pmr::all();
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dom_pdf = new Dompdf($options);

        $pdf = PDF::loadview('admin.pmr.pdf', compact('pmr'));
        $pdf->output();
        $dom_pdf = $pdf->getDomPDF();

        $canvas = $dom_pdf->get_canvas();
        $canvas->page_text($canvas->get_width() - 70, $canvas->get_height() - 30, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, [0, 0, 0]);


        return $pdf->stream();
    }
}
