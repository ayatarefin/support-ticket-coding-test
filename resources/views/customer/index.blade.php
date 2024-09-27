@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Customer Dashboard</h1>

    <!-- Welcome Message -->
    @auth
    <div class="alert alert-info text-center">
        Welcome, <strong>{{ Auth::user()->name }}</strong>! Here are your tickets.
    </div>
    @endauth

    <h2 class="mb-4">My Tickets</h2>
    
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->title }}</td>
                    <td>{{ $ticket->content }}</td>
                    <td>{{ $ticket->created_at->format('Y-m-d H:i:s') }}</td>
                    <td>{{ $ticket->updated_at->format('Y-m-d H:i:s') }}</td>
                    <td>
                        <span class="badge 
                            {{ $ticket->status == 'open' ? 'bg-success' : 'bg-danger' }}">
                            {{ ucfirst($ticket->status) }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
