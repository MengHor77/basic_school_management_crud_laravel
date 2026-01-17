@if($messages && (is_array($messages) ? count($messages) : $messages))
@if($type === 'success')
<div class="mb-6 p-4 bg-green-100 text-green-700 rounded-md shadow">
    {{ is_array($messages) ? implode(', ', $messages) : $messages }}
</div>
@elseif($type === 'error')
<div class="mb-6 p-4 bg-red-100 text-red-700 rounded-md shadow">
    <ul class="list-disc list-inside">
        @foreach((array) $messages as $msg)
        <li>{{ $msg }}</li>
        @endforeach
    </ul>
</div>
@endif
@endif