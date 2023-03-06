
<div wire:poll>
    <div class="container">
        <div id="chat" class="msg_history">
            @foreach ($messages as $message)

                @if ($message->user->name == auth()->user()->name)
                    <div style="margin-left: 10em;" class="text-end">
                        <div class="border rounded bg-info-subtle ">
                            <p class="mt-2 me-2">{{ $message->message_text }}</p>
                        </div>
                        <div class="time_date">{{ $message->created_at->diffForHumans(null, false, false) }}</div>
                    </div>

                @else

                    <div class="incoming_msg">
                        {{ $message->user->name }}
                        <div class="received_msg">
                            <div class="border rounded bg-primary-subtle w-75">
                                <p class="mt-2 ms-2">{{ $message->message_text }}</p>
                            </div>
                            <div class="time_date">{{ $message->created_at->diffForHumans(null, false, false) }}</div>

                        </div>
                    </div>

                @endif
            @endforeach

        </div>
        
        <div >
            <hr>
            <form class="row" wire:submit.prevent="sendMessage">
                <input wire:model="messageText" type="text" class="col form-control" placeholder="your message" />
                <button class="col-2 ms-2 btn btn-success" type="submit">send</button>
            </form>
        </div>
                    
    </div>
</div>

