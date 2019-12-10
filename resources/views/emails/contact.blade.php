<h3>{{ $contact->name }}</h3>
<p><a href="tel:{{ str_replace([' ', '-', '(', ')'], '', $contact->phone) }}">{{ $contact->phone }}</a></p>
<p><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></p>

@if ($contact->message)
    <p>{!! nl2br($contact->message) !!}</p>
@endif