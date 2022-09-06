@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
    <div>
        <p>{{ $message }}</p>
    </div>
    @endif
    <a class="btn btn-primary" href="{{ route('visits.create') }}">Add</a>
    <table class="table table-borderless">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Visitor Type</th>
            <th scope="col">Place</th>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Contact No</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($visits as $visit)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $visit->visitortype->name }}</td>
                    <td>{{ $visit->place->name }}</td>
                    <td>{{ $visit->lastname }}</td>
                    <td>{{ $visit->address }}</td>
                    <td>{{ $visit->contactno }}</td>
                </tr>
            @endforeach
        </tbody>
      </table>
{!! $visits->links() !!}
@endsection
