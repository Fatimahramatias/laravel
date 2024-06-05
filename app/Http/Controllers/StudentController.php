<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //method untuk menampilkan data student
    public function index(){
        //tarik data student dari db
        $Students = Student::all();
        
        //panggil view dan kirim data students
        return view('admin.contents.student.index', [
            'students' => $Students,
        ]);
    }

    //method untuk menampilkan form tambah student
    public function create ()
    {
    //mendapatkan data courses
    $courses = Courses::all();

    //panggil view
    return view('admin.contents.student.create', [
        'courses' => $courses,
    ]);
}

    //
//method untuk menyimpan data student
public function store(Request $request)
{ 
    //Validasi data yang diterima
    $request->validate([
        'name' => 'required',
        'nim' => 'required | numeric',
        'major' => 'required',
        'class' => 'required',
        'course_id' => 'nullable',
    ]);

    //simpan data ke db
    Student::create([
        'name' => $request->name,
        'nim' => $request->nim,
        'major' => $request->major,
        'class' => $request->class,
        'courses_id' => $request->course_id,
    ]);

    //redirect ke halaman student
    return redirect('admin/student')->with('message', 'Data student berhasil ditambahkan!');
}

    // method untuk menampilkan halaman edit
    public function edit($id){
        //cari data student berdasarkan id
        $student = Student::find($id); //select * FROM students WHERE id = $id;
        return view('admin.contents.student.edit', [
            'student' => $student
        ]);
    }

    //method untuk menyimpan hasil update
    public function update($id, Request $request){
    $student = Student::find($id); //select * FROM students WHERE id = $id;

     //Validasi data yang diterima
     $request->validate([
        'name' => 'required',
        'nim' => 'required | numeric',
        'major' => 'required',
        'class' => 'required',
     ]);

     //simpan perubahan
    $student->update([
        'name' => $request->name,
        'nim' => $request->nim,
        'major' => $request->major,
        'class' => $request->class,
     ]);

     //kembalikan ke halaman student
     return redirect('admin/student')->with('message', 'Berhasil Mengedit Student');
}

    //method untuk menghapus student
    public function destroy($id){
    $student = Student::find($id); //select * FROM students WHERE id = $id;

    //hapus student
    $student->delete();

    //kembali ke halaman student
    return redirect('admin/student')->with('message', 'Berhasil Mengedit Student');
}
    }
