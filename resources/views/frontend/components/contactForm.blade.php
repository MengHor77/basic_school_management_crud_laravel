<form action="{{ $action }}" method="POST" class="space-y-6">
    @csrf
    <div>
        <label for="name" class="block text-gray-700 font-medium mb-2">Your Name</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}"
            class="w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500"
            placeholder="John Doe" required>
    </div>
    <div>
        <label for="email" class="block text-gray-700 font-medium mb-2">Your Email</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}"
            class="w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500"
            placeholder="john@example.com" required>
    </div>
    <div>
        <label for="subject" class="block text-gray-700 font-medium mb-2">Subject</label>
        <input type="text" name="subject" id="subject" value="{{ old('subject') }}"
            class="w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500"
            placeholder="Subject" required>
    </div>
    <div>
        <label for="message" class="block text-gray-700 font-medium mb-2">Message</label>
        <textarea name="message" id="message" rows="6"
            class="w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500"
            placeholder="Type your message here..." required>{{ old('message') }}</textarea>
    </div>
    <div>
        <button type="submit"
            class="w-full bg-indigo-600 text-white font-semibold py-3 rounded-md shadow hover:bg-indigo-700 transition duration-300">
            {{ $buttonText }}
        </button>
    </div>
</form>