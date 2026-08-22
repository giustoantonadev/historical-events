@php($m = $msg)
Message type: {{ $m->type }}

From: {{ $m->name ?? 'N/A' }}
<{{ $m->email }}>

    @if($m->subject)
    Subject: {{ $m->subject }}
    @endif

    @if($m->message)
    Message:
    {{ $m->message }}
    @endif

    @if($m->issue_type)
    Issue type: {{ $m->issue_type }}
    Priority: {{ $m->priority }}
    Steps:
    {{ $m->steps }}
    @endif

    --
    This is an automated notification from the site.