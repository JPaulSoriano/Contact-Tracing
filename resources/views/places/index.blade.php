@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
    <div>
        <p>{{ $message }}</p>
    </div>
    @endif
<a class="btn btn-primary my-2" href="{{ route('places.create') }}">Add</a>
<div class="card">
    <div class="card-header bg-primary text-white">Places</div>
    <div class="card-body">
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
    </div>
</div>
{!! $places->links() !!}
@endsection
