@extends('layouts.app')

@section('content')
<div class="container py-4">
    <a href="{{ route('admin.messages.index') }}" class="btn btn-sm btn-secondary mb-3">Back to messages</a>

    <div class="card bg-dark border-light">
        <div class="card-body text-light">
            <h4 class="card-title">Message #{{ $m->id }} — {{ ucfirst($m->type) }}</h4>
            <p><strong>From:</strong> {{ $m->name ?? '-' }} &lt;{{ $m->email }}&gt;</p>
            @if($m->subject)
            <p><strong>Subject:</strong> {{ $m->subject }}</p>
            @endif

            @if($m->message)
            <h5>Message</h5>
            <p style="white-space:pre-wrap">{{ $m->message }}</p>
            @endif

            @if($m->issue_type)
            <h5>Support</h5>
            <p><strong>Issue:</strong> {{ $m->issue_type }} — <strong>Priority:</strong> {{ $m->priority }}</p>
            <p><strong>Steps:</strong></p>
            <p style="white-space:pre-wrap">{{ $m->steps }}</p>
            @endif

            @if($m->attachment)
            <p><strong>Attachment:</strong> <a href="{{ asset('storage/' . $m->attachment) }}" target="_blank">Download</a></p>
            @endif

            <p class="text-white-50"><small>Received: {{ $m->created_at }}</small></p>

            <form action="{{ route('admin.messages.destroy', $m->id) }}" method="POST" onsubmit="return confirm('Delete message?');">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection