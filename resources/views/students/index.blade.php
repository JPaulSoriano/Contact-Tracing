@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
    <div>
        <p>{{ $message }}</p>
    </div>
    @endif
<div class="card my-2">
    <div class="card-header bg-primary text-white">Students</div>
    <div class="card-body">
        <table class="table table-borderless">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Grade</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Email</th>
                <th scope="col">Contact No</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $student->grade->name }}</td>
                        <td>{{ $student->full_name }}</td>
                        <td>{{ $student->address }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->contactno }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{!! $students->links() !!}
@endsection
