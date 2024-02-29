@props(['size' => '1.5rem'])

<i {{ $attributes->merge(['class' => ' ']) }}>
    <svg class="micon" xmlns="http://www.w3.org/2000/svg" height="{{ $size }}" viewBox="0 0 48 48" width="{{ $size }}" fill="currentColor">
		<path d="M42 25.05V39Q42 40.2 41.1 41.1Q40.2 42 39 42H9Q7.8 42 6.9 41.1Q6 40.2 6 39V9Q6 7.8 6.9 6.9Q7.8 6 9 6H22.95V9H9Q9 9 9 9Q9 9 9 9V39Q9 39 9 39Q9 39 9 39H39Q39 39 39 39Q39 39 39 39V25.05ZM19.1 31.05 17 28.9 36.9 9H25.95V6H42V22.05H39V11.15Z"/>
    </svg>
</i>
