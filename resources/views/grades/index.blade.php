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
            </tr>
            </thead>
            <tbody>
                @foreach ($grades as $grade)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $grade->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{!! $grades->links() !!}
@endsection
