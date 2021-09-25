@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.ticket.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.tickets.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
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
                <input type="text" id="email" name="email" class="form-control "  {{ old('email', isset($ticket) ? $ticket->email : '') }}>
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
                <select id="ticke_type" name="ticke_type" class="form-control" >
                <option value="">-- Select Your Ticket Type --</option>
                <option value="{{ old('ticke_type', isset($ticket) ? $ticket->ticke_type : '1') }}">Standard Access</option>
                <option value="{{ old('ticke_type', isset($ticket) ? $ticket->ticke_type : '2') }}">Pro Access
                </option>
                <option value="{{ old('ticke_type', isset($ticket) ? $ticket->ticke_type : '3') }}">Premium Access</option>
               </select>

                <!-- <input type="text" id="ticke_type" name="ticke_type" class="form-control" value="{{ old('ticke_type', isset($ticket) ? $ticket->ticke_type : '') }}"> -->
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

