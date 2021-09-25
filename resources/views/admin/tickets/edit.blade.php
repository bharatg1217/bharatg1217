@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.ticket.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.tickets.update", [$ticket->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.ticket.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($ticket) ? $ticket->name : '') }}" required>
                @if($errors->has('name'))
                    <p class="help-block">
                        {{ $errors->first('name') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.ticket.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('cruds.ticket.fields.email') }}</label>
                <input type="text" id="email" name="email" class="form-control " value=" {{ old('email', isset($ticket) ? $ticket->email : '') }}" required>
                @if($errors->has('email'))
                    <p class="help-block">
                        {{ $errors->first('email') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.ticket.fields.email_helper') }}
                </p>
            </div>
           
            <div class="form-group {{ $errors->has('ticke_type') ? 'has-error' : '' }}">
                <label for="ticke_type">{{ trans('cruds.ticket.fields.ticke_type') }}</label>
                <!-- <input type="text" id="ticke_type" name="ticke_type" class="form-control" value="{{ old('ticke_type', isset($ticket) ? $ticket->ticke_type : '') }}"> -->
                <select id="ticke_type" name="ticke_type" class="form-control" required="">
                <option value="{{ old('ticke_type', isset($ticket) ? $ticket->ticke_type : '') }}">
                    {{ $ticket->ticke_type  == 1 ? 'Standard Access' : ''}}
                    {{ $ticket->ticke_type  == 2 ? 'Pro Access' : ''}}
                    {{ $ticket->ticke_type  == 3 ? 'Premium Access' : ''}}
                </option>
               </select>
                @if($errors->has('ticke_type'))
                    <p class="help-block">
                        {{ $errors->first('ticke_type') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.ticket.fields.ticke_type_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection
