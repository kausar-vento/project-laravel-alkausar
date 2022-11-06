<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.course.home_course', [
            'course' => Course::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.course.create_course',[
            'subcategory' => Subcategory::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasiData = $request->validate([
            'judul_course' => 'required|min:5',
            'deskripsi' => 'required|min:10|max:4000',
            'requirement' => 'required|min:10|max:3000',
            'dipelajarin' => 'required|min:10|max:3000',
            'id_subcategory' => 'required',
            'id_admin' => 'required',
            'level' => 'required',
            'tujuan' => 'required|min:10',
            'thumbnail' => 'required|mimes:jpg,png,jpeg|max:5048',
            'top_course' => 'required',
            'harga_langganan' => 'required'
        ]);


        if ($request->file('thumbnail')) {
            $validasiData['thumbnail'] = $request->file('thumbnail')->store('input-gambar'); 
        }
        
        Course::create($validasiData);
        return redirect()->route('admin.course')->with('success', 'Penambahan Course Berhasil Dilakukan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataCourse = Course::find($id);
        return view('admin.course.show_course',compact('dataCourse'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('courses')->where('id', $id)->first();;
        return view('admin.course.edit_course', compact('data'),[
            'subcategory' => Subcategory::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validasiData = $request->validate([
            'judul_course' => 'min:5',
            'deskripsi' => 'min:10|max:4000',
            'requirement' => 'min:10|max:3000',
            'dipelajarin' => 'min:10|max:3000',
            'id_subcategory' => '',
            'id_admin' => '',
            'level' => '',
            'tujuan' => 'min:10',
            'thumbnail' => 'mimes:jpg,png,jpeg|max:5048',
            'top_course' => '',
            'harga_langganan' => ''
        ]);

        if ($request->file('thumbnail')) {
            if ($request->oldThumbnail) {
                Storage::delete($request->oldThumbnail);
            }
            $validasiData['thumbnail'] = $request->file('thumbnail')->store('input-gambar'); 
        }
        Course::where('id', $id)->update($validasiData);

        return redirect()->route('admin.course')->with('success', 'Update Course Berhasil Dilakukan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);

        if ($course->thumbnail) {
            Storage::delete($course->thumbnail);
        }

        $course->delete();
        return redirect()->route('admin.course')->with('success', 'Course Berhasil Dihapus');
    }
}
