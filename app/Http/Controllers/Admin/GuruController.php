<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Guru;
use Str;
use Storage;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $guru = Guru::where('name', 'LIKE',"%$search%")->orderBy('id','asc')->paginate(10);
        $guru->appends(['search'=>$search]);
        return view('admin.guru.index', compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.guru.add');
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
            'name' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'avatar' => 'required|file'
        ]);
        
        $photo = $request->file('avatar');
        $image_extension = $photo->extension();
        $image_name = Str::slug($request->name).".".$image_extension;
        $photo->storeAs('/images/gurus', $image_name, 'public');

        $guru = new Guru;
        $guru->name = $request->name;
        $guru->jk = $request->jk;
        $guru->alamat = $request->alamat;
        $guru->nohp = $request->nohp;
        $guru->avatar = $image_name;
        $guru->save();

        session()->flash('success',"Sukses tambah data guru $request->name");
        return redirect()->route('admin.guru.index');
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
        $guru = Guru::findOrFail($id);
        return view('admin.guru.edit', compact('guru'));
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
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'avatar' => 'nullable|file'
        ]);
        
        
        $guru = Guru::findOrFail($id);
          $guru->name = $request->name;
        $guru->jk = $request->jk;
        $guru->alamat = $request->alamat;
        $guru->nohp = $request->nohp;
        if($request->hasFile('avatar')) {
            Storage::delete('public/images/gurus/'.$guru->avatar);
            $photo = $request->file('avatar');
            $image_extension = $photo->extension();
            $image_name = Str::slug($request->name).".".$image_extension;
            $photo->storeAs('/images/gurus', $image_name, 'public');
            $guru->avatar = $image_name;
        }
        $guru->save();

        session()->flash('success',"Sukses ubah data kelas $request->name");
        return redirect()->route('admin.guru.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        Storage::delete('public/images/gurus/'.$student->avatar);
        Schedule::where('guru_id', $id)->delete();
        $guru->delete();

        session()->flash('success', 'Sukses Menghapus Data');
        return redirect()->back();
    }
}
