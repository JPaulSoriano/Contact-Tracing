@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
    <div>
        <p>{{ $message }}</p>
    </div>
    @endif

<a class="btn btn-primary my-2" href="{{ route('grades.create') }}">New</a>
<div class="card my-2">
    <div class="card-header bg-primary text-white">Grades</div>
    <div class="card-body">
        <table class="table table-borderless">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($grades as $grade)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $grade->name }}</td>
                        <td><a class="btn btn-primary" href="{{ route('grades.edit',$grade->id) }}">Edit</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{!! $grades->links() !!}
@endsection
