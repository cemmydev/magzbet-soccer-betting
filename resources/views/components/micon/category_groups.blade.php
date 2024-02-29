@props(['size' => '1.5rem'])

<i {{ $attributes->merge(['class' => ' ']) }}>
	<svg xmlns="http://www.w3.org/2000/svg" height="{{ $size }}" width="{{ $size }}" viewBox="0 0 24 24">
		<defs>
			<path id="a" d="M0 0 24 0 24 24 0 24z" />
		</defs>
		<g fill="none" fill-rule="evenodd">
			<use xlink:href="#a" />
			<use xlink:href="#a" />
			<path fill="currentColor" fill-rule="nonzero" d="M12,2 L6.5,11 L17.5,11 L12,2 Z M12,5.84 L13.93,9 L10.06,9 L12,5.84 Z M17.5,13 C15.01,13 13,15.01 13,17.5 C13,19.99 15.01,22 17.5,22 C19.99,22 22,19.99 22,17.5 C22,15.01 19.99,13 17.5,13 Z M17.5,20 C16.12,20 15,18.88 15,17.5 C15,16.12 16.12,15 17.5,15 C18.88,15 20,16.12 20,17.5 C20,18.88 18.88,20 17.5,20 Z M3,21.5 L11,21.5 L11,13.5 L3,13.5 L3,21.5 Z M5,15.5 L9,15.5 L9,19.5 L5,19.5 L5,15.5 Z" />
		</g>
	</svg>
</i>
