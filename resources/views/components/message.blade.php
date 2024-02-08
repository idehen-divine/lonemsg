<div class="card mb-3">
    <div class="card-body">
        @if ($message->type_id == 2)
            @if ($message->url !== null)
                <img class="card-img-top" src="{{ url($message->url) }}" alt="Title">
            @endif
        @endif
        <p class="card-text pt-1">
            {{ $message->content }}
        </p>
        <p class="card-text">
            <small class="text-muted">{{ $message->created_at->diffForHumans() }}</small>
        </p>
    </div>
</div>
