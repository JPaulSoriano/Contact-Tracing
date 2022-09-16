@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
    <div>
        <p>{{ $message }}</p>
    </div>
    @endif
<div class="card my-2">
    <div class="card-header bg-primary text-white">Registered Students</div>
    <div class="card-body">
        <table class="table table-borderless">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Student</th>
                <th scope="col">Father</th>
                <th scope="col">Mother</th>
                <th scope="col">Fetcher</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
                <th scope="col">Verification</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($fetchers as $fetcher)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $fetcher->student->full_name }}</td>
                        <td>{{ $fetcher->student->father }}</td>
                        <td>{{ $fetcher->student->mother }}</td>
                        <td>{{ $fetcher->full_name }}</td>
                        <td>
                            @if($fetcher->verification == 1)
                                <div class="text-success font-weight-bold">Verified</div>
                            @else
                                <div class="text-danger font-weight-bold">Unverified</div>
                            @endif
                        </td>
                        <td> <button type="button" class="btn btn-sm btn-primary btn-block my-1" data-toggle="modal" data-target="#modal-{{ $fetcher->id }}">View</button></td>
                        <td>
                            @if($fetcher->verification == 1)
                                <form action="{{ route('unverify', $fetcher) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger btn-block my-1">Unverify</button>
                                </form>
                                @else
                                <a href="{{ route('verify', $fetcher) }}"class="btn btn-sm btn-block btn-success my-1">Verify</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{!! $fetchers->links() !!}



@foreach ($fetchers as $fetcher)
<!-- Modal -->
<div class="modal fade" id="modal-{{ $fetcher->id }}" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
        <div class="modal-body text-center">
            <div class="row">
                <div class="col-sm-3">
                    <img src="{{asset('storage/'.$fetcher->student->image)}}" height="200" width="200" class="img-thumbnail"/><br>
                    <span class="font-weight-bold my-1">{{ $fetcher->student->full_name }}</span>
                </div>
                <div class="col-sm-3">
                    <img src="{{asset('storage/'.$fetcher->student->fimage)}}" height="200" width="200" class="img-thumbnail"/><br>
                    <span class="font-weight-bold my-1">{{ $fetcher->student->father }}</span>
                </div>
                <div class="col-sm-3">
                    <img src="{{asset('storage/'.$fetcher->student->mimage)}}" height="200" width="200" class="img-thumbnail"/><br>
                    <span class="font-weight-bold my-1">{{ $fetcher->student->mother }}</span>
                </div>
                <div class="col-sm-3">
                    <img src="{{asset('storage/'.$fetcher->image)}}" height="200" width="200" class="img-thumbnail"/><br>
                    <span class="font-weight-bold my-1">{{ $fetcher->full_name }}</span>
                </div>
            </div>
        </div>
        <div class="modal-footer border-0">
            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>
@endforeach

@endsection
