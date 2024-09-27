@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Admin Dashboard</h1>

    <!-- Welcome Message -->
    @auth
    <div class="alert alert-info text-center">
        Welcome, <strong>{{ Auth::user()->name }}</strong>! You are logged in as an Admin.
    </div>
    @endauth

    <h2 class="mb-4">All Tickets</h2>
    
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th>Customer Name</th>
                    <th>Customer Email</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->user->name }}</td>
                    <td>{{ $ticket->user->email }}</td>
                    <td>{{ $ticket->title }}</td>
                    <td>{{ $ticket->content }}</td>
                    <td>
                        <span class="badge 
                            {{ $ticket->status == 'open' ? 'bg-success' : 'bg-danger' }}">
                            {{ ucfirst($ticket->status) }}
                        </span>
                    </td>
                    <td>{{ $ticket->created_at->format('Y-m-d H:i:s') }}</td>
                    <td>
                        @if($ticket->status == 'open')
                        <form action="{{ route('tickets.close', $ticket->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Close Ticket</button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
