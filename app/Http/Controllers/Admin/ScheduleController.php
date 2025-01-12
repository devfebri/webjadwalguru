<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Subject;
use App\Models\Day;
use App\Models\Kelas;
use App\Models\Guru;
use App\User;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
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
            $schedules = Schedule::where('kode_guru',Auth::user()->id)->whereHas('subject', function($q) use ($search) {
                $q->where('name','LIKE',"%$search%");
            })->orderBy('day_id','asc')->paginate(10);
        }else {
            $schedules = Schedule::whereHas('subject', function($q) use ($search) {
                $q->where('name','LIKE',"%$search%");
            })->orderBy('day_id','asc')->paginate(10);
        }
        $schedules->appends(['search'=>$search]);

        $days = Day::all();
        
        return view('admin.schedules.index', compact('schedules', 'days'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::all();
        $days = Day::all();
        $gurus=Guru::all();
        $kelass=Kelas::all();
        return view('admin.schedules.add', compact('subjects', 'days','gurus','kelass'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'subject' => 'required|exists:subjects,id',
            'day' => 'required|exists:days,id',
            'guru_id' => 'required|exists:gurus,id',
            'kelas_id' => 'required|exists:kelas,id',
            "start_time" => 'required',
            'end_time' => 'required'
        ]);

        $create = Schedule::create([
            'subject_id' => $request->subject,
            'day_id' => $request->day,
            'guru_id' => $request->guru_id,
            'kelas_id' => $request->kelas_id,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time
        ]);

        session()->flash('success',"Sukses tambah jadwal pelajaran $request->name");
        return redirect()->route('admin.schedules.index');
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
        $subjects = Subject::all();
        $days = Day::all();
        $schedule = Schedule::findOrFail($id);
         $gurus=Guru::all();
        $kelass=Kelas::all();
        $user=User::all();
        return view('admin.schedules.edit', compact('schedule', 'days','subjects','gurus','kelass','user'));
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
            'subject' => 'required|exists:subjects,id',
            'day' => 'required|exists:days,id',
            "guru_id" => 'required',
            "kelas_id" => 'required',
            "start_time" => 'required',
            'end_time' => 'required'
        ]);

        $create = Schedule::findOrFail($id)->update([
            'subject_id' => $request->subject,
            'day_id' => $request->day,
            'guru_id' => $request->guru_id,
            'kelas_id' => $request->kelas_id,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time
        ]);

        session()->flash('success',"Sukses ubah jadwal pelajaran $request->name");
        return redirect()->route('admin.schedules.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();

        session()->flash('success', 'Sukses Menghapus Data');
        return redirect()->back();
    }
}
