<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Picket;
use App\Models\Guru;
use App\Models\Day;

class PicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $pickets = Picket::whereHas('guru', function($q) use ($search) {
            $q->where('name','LIKE',"%$search%");
        })->orderBy('day_id','asc')->paginate(10);
        $pickets->appends(['search'=>$search]);

        $days = Day::all();
        
        return view('admin.pickets.index', compact('pickets', 'days'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gurus = Guru::all();
        $days = Day::all();
        return view('admin.pickets.add', compact('gurus', 'days'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'guru' => 'required|exists:students,id',
            'day' => 'required|exists:days,id',
        ]);
        // dd($request->all());

        $create = Picket::create([
            'guru_id' => $request->guru,
            'day_id' => $request->day,
        ]);

        session()->flash('success',"Sukses tambah jadwal piket");
        return redirect()->route('admin.pickets.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gurus = Guru::all();
        $days = Day::all();
        $picket = Picket::findOrFail($id);
        return view('admin.pickets.edit', compact('picket', 'days','gurus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'guru' => 'required|exists:gurus,id',
            'day' => 'required|exists:days,id',
        ]);

        $create = Picket::findOrFail($id)->update([
            'guru_id' => $request->guru,
            'day_id' => $request->day,
        ]);

        session()->flash('success',"Sukses ubah jadwal piket");
        return redirect()->route('admin.pickets.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $picket = Picket::findOrFail($id);
        $picket->delete();

        session()->flash('success', 'Sukses Menghapus Data');
        return redirect()->back();
    }
}
