@props(['disabled' => false])

<div {!! $attributes->merge(['class' => 'relative rounded-md shadow-sm']) !!}>
    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
        <span class="text-gray-500 sm:text-sm">
            $
        </span>
    </div>
    <input {{ $disabled ? 'disabled' : '' }} type="text" name="price" id="price" class="focus:ring-gray-500 focus:border-gray-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="0.00">
    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
        <span class="text-gray-500 sm:text-sm" id="price-currency">
            USD
        </span>
    </div>
</div>
