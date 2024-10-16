<div class="w-full h-full"  wire:poll>

    @push('scripts')
        <script>
            window.livewire.on('onMessageSendEvent', () => {
                window.livewire.dispatch('scrollToBottom');
            });

        </script>
    @endpush

    <div class="flex flex-col h-full">
        <div class="fixed top-0 w-full bg-green-600 h-16 pt-2 text-white flex justify-between shadow-md" style="overscroll-behavior: none;">
            <!-- Navigation -->
            <a href="/dashboard" class="ml-2">
                <svg class="w-12 h-12 my-1 text-green-100" viewBox="0 0 24 24">
                    <path class="text-green-100 fill-current" d="M9.41 11H17a1 1 0 0 1 0 2H9.41l2.3 2.3a1 1 0 1 1-1.42 1.4l-4-4a1 1 0 0 1 0-1.4l4-4a1 1 0 0 1 1.42 1.4L9.4 11z" />
                </svg>
            </a>
            <div class="my-3 text-green-100 font-bold text-lg tracking-wide">{{ $user->name }}</div>
            <!-- Menu -->
            <svg class="icon-dots-vertical w-8 h-8 mt-2 mr-2" viewBox="0 0 24 24">
                <path class="text-green-100 fill-current" fill-rule="evenodd" d="M12 7a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 7a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 7a2 2 0 1 1 0-4 2 2 0 0 1 0 4z" />
            </svg>
        </div>

        <div id="chatBox" class="mt-20 mb-16">
            @foreach($messages as $message)
                @if($message['sender'] !== $user->name)
                    <div class="clearfix w-4/4">
                        <div class="bg-gray-300 mx-4 my-2 p-2 rounded-lg inline-block">
                            <b>{{ $message['sender'] }}:</b> {{ $message['message'] }}
                        </div>
                    </div>
                @else
                    <div class="clearfix w-4/4">
                        <div class="text-right">
                            <p class="bg-green-300 mx-4 my-2 p-2 rounded-lg inline-block">{{ $message['message'] }} <b>: You</b></p>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <form wire:submit="sendMessage()">
        <div class="fixed w-full flex justify-between bg-green-100" style="bottom: 0;">
            <textarea
                class="flex-grow m-2 py-2 px-4 mr-1 rounded-full border border-gray-300 bg-gray-200 resize-none"
                rows="1"
                wire:model="message"
                placeholder="Message..."
                style="outline: none;"
            ></textarea>
            <button class="m-2" type="submit" style="outline: none;">
                <svg class="svg-inline--fa text-green-500 fa-paper-plane fa-w-16 w-12 h-12 py-2 mr-2" viewBox="0 0 512 512">
                    <path fill="currentColor" d="M476 3.2L12.5 270.6c-18.1 10.4-15.8 35.6 2.2 43.2L121 358.4l287.3-253.2c5.5-4.9 13.3 2.6 8.6 8.3L176 407v80.5c0 23.6 28.5 32.9 42.5 15.8L282 426l124.6 52.2c14.2 6 30.4-2.9 33-18.2l72-432C515 7.8 493.3-6.8 476 3.2z" />
                </svg>
            </button>
        </div>
    </form>
</div>
