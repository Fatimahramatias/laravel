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
            <table class="table">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Desc</th>
                    <th>Timestamp</th>
                    <th>Action</th>
                </tr>
                @foreach ($courses as $cour)
                <tr>
                    <td>{{ $cour->id }}</td>
                    <td>{{ $cour->nama }}</td>
                    <td>{{ $cour->category}}</td>
                    <td>{{ $cour->desc }}</td>
                    <td>{{ $cour->timestamp }}</td>
                    <td>
                        <a href="#" class="btn btn-warning">Edit</a>
                        <a href="#" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
  </section>

@endsection
