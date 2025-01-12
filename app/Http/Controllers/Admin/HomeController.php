<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Article;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {
        $data['count']['users'] = User::count();
        $data['count']['student'] = Student::count();
        $data['count']['subject'] = Subject::count();
        $data['count']['article'] = Article::count();
        $data['articles'] = Article::orderBy('id','desc')->limit(10)->get();
        if (Auth::user()->role == 'guru') {
            return redirect()->route('admin.subjects.index');
        }else {
            return view('admin.home', $data);
        }
    }
}
