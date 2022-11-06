<?php

namespace App\Http\Controllers;

use App\Models\Matericourse;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use Illuminate\Support\Facades\Storage;

class MateriCourseController extends Controller
{
    public function homeMateri($id)
    {
        $course = Course::find($id);
        $materi = Matericourse::where('course_id', '=', $id)->latest()->get();
        return view('admin.materi.test_home_materi',[
            'dataC' => $course,
            'dataM' => $materi
        ]);
    }

    public function createMateri($id)
    {
        $course = Course::find($id);
        return view('admin.materi.test_create_materi', [
            'dataCo' => $course 
        ]);
    }
    
    public function postMateri(Request $request)
    {
        $idC = $request->input('course_id');
        
        $validasiData = $request->validate([
            'nama_materi' => 'required|min:3|max:60',
            'deskripsi' => 'required|min:3|max:1000',
            'course_id' => 'required',
            'link_yt' => '',
            'dokumen_pdf' => 'mimes:pdf|max:5048'
        ]);
        if ($request->input('link_yt')) {
            $validasiData['link_yt'] = Str::after($request->link_yt, 'https://www.youtube.com/watch?v=');
        }

        if ($request->file('dokumen_pdf')) {
            $validasiData['dokumen_pdf'] = $request->file('dokumen_pdf')->store('dokumen'); 
        }

        Matericourse::create($validasiData);
        return redirect()->route('admin.home.materiCourse', $idC)->with('success', 'Penambahan Materi Berhasil');
    }

    public function editMateri(Request $request, $id)
    {
        $data = $request->input('id_course');
        $dataMC = DB::table('matericourses')->where('id', $id)->first();;
        return view('admin.materi.edit_materi', [
            'materiCourse' => $dataMC,
            'data' => $data
        ]);
    }

    public function updateMateri(Request $request, $id)
    {
        $idC = $request->input('course');

        $validasiData = $request->validate([
            'nama_materi' => 'min:3|max:60',
            'deskripsi' => 'min:3|max:1000',
            'course_id' => '',
            'link_yt' => '',
            'dokumen_pdf' => 'mimes:pdf|max:5048'
        ]);
        if ($request->input('link_yt')) {
            $validasiData['link_yt'] = Str::after($request->link_yt, 'https://www.youtube.com/watch?v=');
        }

        if ($request->file('dokumen_pdf')) {
            if ($request->oldThumbnail) {
                Storage::delete($request->oldThumbnail);
            }
            $validasiData['dokumen_pdf'] = $request->file('dokumen_pdf')->store('dokumen'); 
        }
        Matericourse::where('id', $id)->update($validasiData);

        return redirect()->route('admin.home.materiCourse', $idC)->with('success', 'Perubahan Materi Berhasil');
    }

    public function deleteMateri(Request $request, $id)
    {
        $idC = $request->input('id_course');
        $materiCourse = Matericourse::find($id);

        if ($materiCourse->dokumen_pdf) {
            Storage::delete($materiCourse->dokumen_pdf);
        }

        $materiCourse->delete();
        return redirect()->route('admin.home.materiCourse', $idC)->with('success', 'Penghapusan Materi Berhasil');
    }
}
