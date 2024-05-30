<div x-data="{ open: false }">
    <x-primary-button @click="open = true">
        Preview File
    </x-primary-button>

    <div x-show="open" class="fixed z-10 inset-0 overflow-y-auto" style="display: none;" x-cloak>
        <div class="flex items-center justify-center min-h-screen py-5">
            <div class="fixed inset-0 bg-black bg-opacity-50"></div>
            <div class="bg-slate-300 dark:bg-gray-800 rounded-lg p-8 w-5/6 h-svh mx-auto z-20 relative">
                <div class="absolute top-0 right-0 p-4 cursor-pointer" @click="open = false">
                    <svg class="w-6 h-6 text-gray-500 dark:text-gray-300 hover:text-gray-700 dark:hover:text-gray-700"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </div>
                @if (isset($item) && $item->file_data)
                    <h2 class="text-gray-900 dark:text-gray-100">Modul Preview:</h2>
                    @php
                        $isImage = strpos($item->mime_type, 'image') !== false;
                        $isPDF = $item->mime_type === 'application/pdf';
                        $officeFileTypes = [
                            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                            'application/msword',
                            'application/vnd.ms-excel',
                            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                            'application/vnd.ms-powerpoint',
                            'application/vnd.openxmlformats-officedocument.presentationml.presentation',
                        ];
                        $isOfficeFile = in_array($item->mime_type, $officeFileTypes);
                    @endphp

                    @if ($isImage || $isPDF)
                        <iframe src="{{ route('modul.show', ['modul' => $item->id]) }}" class="w-full h-full"></iframe>
                    @elseif ($isOfficeFile)
                        <iframe
                            src="https://docs.google.com/viewer?url={{ urlencode(route('modul.show', ['modul' => $item->id])) }}&embedded=true"
                            class="w-full h-full"></iframe>
                    @else
                        <p>Uploaded file cannot be previewed. Click <a
                                href="{{ route('modul.show', ['modul' => $item->id]) }}">here</a> to download.</p>
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>
