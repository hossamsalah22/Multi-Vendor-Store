@props([
    'src' => '',             // The image source URL (required)
    'alt' => '',             // The alt text for the image (required)
    'attributes' => [],      // Additional HTML attributes
    'disabled' => false,     // A boolean to indicate if the image should be disabled
    'maxWidth' => null,      // Maximum width attribute for the image
    'maxHeight' => null,     // Maximum height attribute for the image
])

<img src="{{ $src }}"
     alt="{{ $alt }}" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm', 'style' => "max-width: {$maxWidth}px; max-height: {$maxHeight}px;"]) !!}>
