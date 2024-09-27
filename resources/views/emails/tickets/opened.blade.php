@component('mail::message')
# New Ticket Opened

A new ticket has been opened by {{ $ticket->user->name }}.

## Title: {{ $ticket->title }}

### Content:
{{ $ticket->content }}

@component('mail::button', ['url' => \URL::signedRoute('tickets.close', ['ticket' => $ticket->id])])
    Close Ticket
@endcomponent



Thanks,<br>
{{ config('app.name') }}
@endcomponent
