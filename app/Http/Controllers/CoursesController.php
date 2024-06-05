<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    // //method untuk menampilkan data student
    public function index(){
        //tarik data courses dari db
        $courses = Courses::all();
        
        //panggil view dan kirim data students
        return view('admin.contents.courses.index', [
            'courses' => $courses,
        ]);
    }

    //method untuk menampilkan form tambah student
    public function create (){
        return view('admin.contents.courses.create');
    }
    
    
    //method untuk menyimpan data courses
    public function store(Request $request)
    { 
        //Validasi data yang diterima
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'category' => 'required',
            'desc' => 'required',
        ]);
    
        //simpan data ke db
        Courses::create([
            'id' => $request->id,
            'name' => $request->name,
            'category' => $request->category,
            'desc' => $request->desc,
        ]);
    
        //redirect ke halaman courses
        return redirect('admin/courses')->with('message', 'Data student berhasil ditambahkan!');
    }
    

     // method untuk menampilkan halaman edit
     public function edit($id){
        //cari data student berdasarkan id
        $courses = Courses::find($id); //select * FROM students WHERE id = $id;
        return view('admin.contents.courses.edit', [
            'courses' => $courses
        ]);
    }

    //method untuk menyimpan hasil update
    public function update($id, Request $request){
    $courses = Courses::find($id); //select * FROM students WHERE id = $id;
 
     //Validasi data yang diterima
     $request->validate([
        'id' => 'required',
        'name' => 'required',
        'category' => 'required',
        'desc' => 'required',
     ]);

     //simpan perubahan
    $courses->update([
        'id' => $request->id,
        'name' => $request->name,
        'category' => $request->category,
        'desc' => $request->desc,
     ]);

     //kembalikan ke halaman courses
     return redirect('admin/courses')->with('message', 'Berhasil Mengedit Student');
}


    //method untuk menghapus student
    public function destroy($id){
        $courses = Courses::find($id); //select * FROM students WHERE id = $id;
    
        //hapus student
        $courses->delete();
    
        //kembali ke halaman student
        return redirect('admin/courses')->with('message', 'Berhasil Mengedit Student');
    }
}
