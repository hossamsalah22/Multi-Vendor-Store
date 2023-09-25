@props([
    'id' => '',
    'label' => '',            // The label text for the file input
    'attributes' => [],       // Additional HTML attributes for the input element
])

<input type="file" id="{{ $id }}"
       name="{{ $id }}" {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) !!}>
