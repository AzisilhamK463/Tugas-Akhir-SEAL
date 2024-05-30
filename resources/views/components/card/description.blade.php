<description class="text-sm text-zinc-600 dark:text-zinc-200">
    {{ Str::limit($slot, 100) }}
    @if (strlen($slot) > 100)
        <a href="#" onclick="alert('Full description: {{ $slot }}'); return false;">Read more</a>
    @endif
</description>
