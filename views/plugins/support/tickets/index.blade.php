@extends('layouts.app')

@section('title', trans('support::messages.title'))

@section('content')
    <div class="container content" id="supports">
        <h1>{{ trans('support::messages.title') }}</h1>

        <div class="table-responsive">
            <table class="table" data-aos="fade-up">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ trans('support::messages.fields.subject') }}</th>
                    <th scope="col">{{ trans('support::messages.fields.category') }}</th>
                    <th scope="col">{{ trans('messages.fields.status') }}</th>
                    <th scope="col">{{ trans('messages.fields.date') }}</th>
                </tr>
                </thead>
                <tbody>

                @foreach($tickets as $ticket)
                    <tr>
                        <th scope="row">{{ $ticket->id }}</th>
                        <td>
                            <a href="{{ route('support.tickets.show', $ticket) }}">{{ $ticket->subject }}</a>
                        </td>
                        <td>{{ $ticket->category->name }}</td>
                        <td>
                        <span class="badge badge-{{ $ticket->isClosed() ? 'danger' : 'success' }}">
                            {{ $ticket->statusMessage() }}
                        </span>
                        </td>
                        <td>{{ format_date_compact($ticket->created_at) }}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>

        <a href="{{ route('support.tickets.create') }}" class="btn btn-support btn-grad" data-aos="fade-up">
            {{ trans('support::messages.actions.open-new') }}
        </a>
    </div>
@endsection
