@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
    <div>
        <p>{{ $message }}</p>
    </div>
    @endif
<div class="card my-2">
    <div class="card-header bg-primary text-white">Visited</div>
    <div class="card-body">
        <table class="table table-borderless">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Visitor Type</th>
                <th scope="col">Place</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Contact No</th>
                <th scope="col">Visited At</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($times as $time)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $time->visit->visitortype->name }}</td>
                        <td>{{ $time->visit->place->name }}</td>
                        <td>{{ $time->visit->full_name }}</td>
                        <td>{{ $time->visit->address }}</td>
                        <td>{{ $time->visit->contactno }}</td>
                        <td>{{ $time->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{!! $times->links() !!}
@endsection
