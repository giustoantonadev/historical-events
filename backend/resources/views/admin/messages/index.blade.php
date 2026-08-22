@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Messages</h2>
    </div>

    @if(session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Type</th>
                    <th>From</th>
                    <th>Subject</th>
                    <th>Created</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($messages as $msg)
                <tr>
                    <td>{{ $msg->id }}</td>
                    <td>{{ $msg->type }}</td>
                    <td>{{ $msg->name ?? '-' }} &lt;{{ $msg->email }}&gt;</td>
                    <td>{{ $msg->subject ?? (strlen($msg->message) > 40 ? substr($msg->message,0,40) . '...' : $msg->message) }}</td>
                    <td>{{ $msg->created_at->format('Y-m-d H:i') }}</td>
                    <td class="text-end">
                        <a href="{{ route('admin.messages.show', $msg->id) }}" class="btn btn-sm btn-outline-light">View</a>
                        <form action="{{ route('admin.messages.destroy', $msg->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Delete message?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $messages->links() }}
    </div>
</div>
@endsection