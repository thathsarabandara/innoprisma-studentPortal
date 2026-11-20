@extends('admin.layout')

@section('content')
  <h2>Student List</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th><th>Name</th><th>Email</th><th>WhatsApp</th>
        <th>School</th><th>Grade</th><th>Parent</th><th>Parent Phone</th>
      </tr>
    </thead>
    <tbody>
      @foreach($students as $student)
      <tr>
        <td>{{ $student->id }}</td>
        <td>{{ $student->name }}</td>
        <td>{{ $student->email }}</td>
        <td>{{ $student->whatsapp }}</td>
        <td>{{ $student->school }}</td>
        <td>{{ $student->grade }}</td>
        <td>{{ $student->parent_name }}</td>
        <td>{{ $student->parent_phone }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection
