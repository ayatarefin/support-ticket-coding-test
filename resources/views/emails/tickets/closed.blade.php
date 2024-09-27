@component('mail::message')

# Ticket Closed

Dear {{ $ticket->user->name }},

Your ticket titled **{{ $ticket->title }}** has been closed by our admin.

### Status: Closed

If you have any further questions or issues, please feel free to open a new ticket.

Thanks for reaching out to us!

Best Regards,  
{{ config('app.name') }}

@endcomponent
