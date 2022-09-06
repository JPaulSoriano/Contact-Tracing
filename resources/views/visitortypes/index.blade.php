@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
    <div>
        <p>{{ $message }}</p>
    </div>
    @endif
    <a class="btn btn-primary" href="{{ route('visitortypes.create') }}">Add</a>
    <table class="table table-borderless">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($visitortypes as $visitortype)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $visitortype->name }}</td>
                </tr>
            @endforeach
        </tbody>
      </table>
{!! $visitortypes->links() !!}
@endsection
