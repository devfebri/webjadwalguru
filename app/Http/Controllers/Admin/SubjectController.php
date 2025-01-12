<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Schedule;
use App\Models\Guru;
use App\User;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        if (Auth::user()->role == "guru") {
            $subjects = Subject::where('kode_guru', Auth::user()->id)->where('name', 'LIKE', "%$search%")->orderBy('id', 'asc')->paginate(10);
        } else {
            $subjects = Subject::where('name', 'LIKE', "%$search%")->orderBy('id', 'asc')->paginate(10);
        }
        $subjects->appends(['search' => $search]);
        return view('admin.subjects.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('admin.subjects.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $create = Subject::create([
            'name' => $request->name
        ]);

        session()->flash('success', "Sukses tambah mata pelajaran $request->name");
        return redirect()->route('admin.subjects.index');
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
        $subject = Subject::findOrFail($id);
        return view('admin.subjects.edit', compact('subject'));
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
            'name' => 'required'
        ]);

        $create = Subject::find($id)->update([
            'name' => $request->name
        ]);

        session()->flash('success', "Sukses ubah mata pelajaran $request->name");
        return redirect()->route('admin.subjects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
        Schedule::where('subject_id', $id)->delete();
        $subject->delete();

        session()->flash('success', 'Sukses Menghapus Data');
        return redirect()->back();
    }
}
