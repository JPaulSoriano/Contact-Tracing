@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
    <div>
        <p>{{ $message }}</p>
    </div>
    @endif
    <a class="btn btn-primary" href="{{ route('places.create') }}">Add</a>
    <table class="table table-borderless">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($places as $place)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $place->name }}</td>
                </tr>
            @endforeach
        </tbody>
      </table>
{!! $places->links() !!}
@endsection
