@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.ticket.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.ticket.fields.id') }}
                        </th>
                        <td>
                            {{ $ticket->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ticket.fields.name') }}
                        </th>
                        <td>
                            {{ $ticket->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ticket.fields.email') }}
                        </th>
                        <td>
                            {!! $ticket->email !!}
                        </td>
                    </tr>
                    
                    <tr>
                        <th>
                            {{ trans('cruds.ticket.fields.ticke_type') }}
                        </th>
                        <td>
                            {{ $ticket->ticke_type  == 1 ? 'Standard Access' : ''}}
                            {{ $ticket->ticke_type  == 2 ? 'Pro Access' : ''}}
                            {{ $ticket->ticke_type  == 3 ? 'Premium Access' : ''}}
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>

        <nav class="mb-3">
            <div class="nav nav-tabs">

            </div>
        </nav>
        <div class="tab-content">

        </div>
    </div>
</div>
@endsection