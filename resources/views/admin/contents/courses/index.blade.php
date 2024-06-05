@extends('admin.main')
@section('content')
<div class="pagetitle">
    <h1>Courses</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item"></li>
        <li class="breadcrumb-item active">Courses</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="card">
        <div class="card-body">
          <a href="/admin/courses/create" class="btn btn-primary my-3"> + Courses</a>
            <table class="table">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Desc</th>
                    <th>Action</th>
                </tr>
                @foreach ($courses as $cour)
                <tr>
                    <td>{{ $cour->id }}</td>
                    <td>{{ $cour->name }}</td>
                    <td>{{ $cour->category}}</td>
                    <td>{{ $cour->desc }}</td>
                    <td class ="d-flex">
                        <a href="/admin/courses/edit/ {{ $cour->id}}" class="btn btn-warning">Edit</a>
                        <form action="/admin/courses/delete/{{ $cour->id }}" method="post">
                          @method('DELETE')
                          @csrf
                          <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah Anda Yakin?')">Hapus</button>
                          </form>
                    </td>
                   
                </tr>
                @endforeach
            </table>
        </div>
    </div>
  </section>

@endsection
