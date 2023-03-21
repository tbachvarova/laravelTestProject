<div {{$attributes->merge(['class'=>'bg-gray-50 border border-gray-200 rounded p-6'])}} >
    {{-- $slot si se vzima po podrazbirane, vsichko koeto e v <x-hhhh --}}
    {{$slot}}
</div>
