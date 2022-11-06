<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Matericourse;
use Illuminate\Support\Facades\DB;

class CourseUserController extends Controller
{
    public function showCourse($id)
    {
        $materi = Matericourse::where('course_id', '=', $id)->get();
        $read = Course::find($id);
        return view('user.course.read_course',compact('read', 'materi'));
    }

    public function moreCourse()
    {
        $category = DB::table('categories')->
        leftjoin('subcategories', 'categories.id', '=', 'subcategories.id_category')->get();
        return view('user.course.all_course', [
            'more' => Course::latest()->paginate(8),
            'category' => $category
        ]);
    }

    public function sortByCategory($id)
    {
        $category = DB::table('categories')->
        leftjoin('subcategories', 'categories.id', '=', 'subcategories.id_category')->get();
        $itemCt = DB::table('courses')->where('id_subcategory', '=', $id)->get();
        return view('user.course.bySubcategory', compact('itemCt', 'category'));
    }

    public function readKelas($id)
    {
        $materi = Matericourse::where('course_id', '=', $id)->get();
        $read = Course::find($id);
        return view('user.kelas.read_kelas',compact('read', 'materi'));
    }
}
