@php($d = $data)
<h3>Website message</h3>
<p>Type: {{ $d['type'] ?? 'contact' }}</p>
<p>From: {{ $d['name'] ?? 'N/A' }} &lt;{{ $d['email'] }}&gt;</p>

@if(!empty($d['subject']))
<p>Subject: {{ $d['subject'] }}</p>
@endif

@if(!empty($d['message']))
<h4>Message</h4>
<p>{!! nl2br(e($d['message'])) !!}</p>
@endif

@if(!empty($d['issue_type']))
<h4>Support details</h4>
<p>Issue: {{ $d['issue_type'] }} — Priority: {{ $d['priority'] }}</p>
<p>Steps:</p>
<p>{!! nl2br(e($d['steps'] ?? '')) !!}</p>
@endif

--
<p>This is an automated notification.</p>