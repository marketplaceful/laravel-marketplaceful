<div class="flex space-x-3">
    <div class="flex-shrink-0">
        <div class="relative">
            <img class="h-10 w-10 rounded-full bg-gray-400 flex items-center justify-center ring-8 ring-white" src="{{ auth()->user()->profile_photo_url }}" alt="">
            <span class="absolute -bottom-0.5 -right-1 bg-white rounded-tl px-0.5 py-px">
                <svg class="h-5 w-5 text-gray-400" x-description="Heroicon name: solid/chat-alt" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd"></path>
                </svg>
            </span>
        </div>
    </div>

    <div class="min-w-0 flex-1">
        <form x-data="conversationReplyState()" wire:submit.prevent="replyConversation">
            <div>
                <label for="comment" class="sr-only">Comment</label>
                <textarea rows="3" class="shadow-sm block w-full focus:ring-gray-900 focus:border-gray-900 sm:text-sm border-gray-300 rounded-md" wire:model="state.body" x-on:keydown.enter="submit" placeholder="Type a message..."></textarea>
            </div>
            <div class="mt-6 flex items-center justify-end space-x-4">
                <button type="submit" class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-gray-900 hover:bg-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                    Send
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function conversationReplyState() {
        return {
            submit () {
                this.$refs.submit.click()
            }
        }
    }
</script>
