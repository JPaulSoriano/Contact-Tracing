@extends('layouts.app')


@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $role->name }}
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group">
            <strong>Permissions:</strong>
            @if(!empty($rolePermissions))
                @foreach($rolePermissions as $v)
                    <label>{{ $v->name }},</label>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
