<div {{ $attributes }}>
    <!-- Dropdown menu on small screens -->
    @if (isset($responsive))
        <div class="sm:hidden">
            {{ $responsive }}
        </div>
    @endif


    <!-- Tabs at small breakpoint and up -->
    <div class="hidden sm:block">
        <nav class="-mb-px flex space-x-8">
            {{ $slot }}
        </nav>
    </div>
</div>
