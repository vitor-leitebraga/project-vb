<template>
	<div
		:style="{ backgroundColor: '#' + bgColor, color: getTextColorForBackground(bgColor) }"
		class="inline-flex items-center gap-x-0.5 rounded-md px-2 py-1 text-xs
			font-medium ring-1 ring-inset ring-gray-500/10"
	>
		{{ label }}
		<button
			v-if="closeable"
			type="button"
			class="group relative -mr-1 size-3.5 rounded-sm hover:bg-gray-500/20"
		>
			<span class="sr-only">Remove</span>
			<svg
				viewBox="0 0 14 14"
				class="size-3.5 stroke-gray-600/50 group-hover:stroke-gray-600/75"
			>
				<path d="M4 4l6 6m0-6l-6 6" />
			</svg>
			<span class="absolute -inset-1" />
		</button>
	</div>
</template>

<script setup>

defineProps({
	label: {
		type: String,
		default: ""
	},
	bgColor: {
		type: String,
		default: ""
	},
	closeable: {
		type: Boolean,
		default: true
	}
})

const getTextColorForBackground = (backgroundColor) => {
	const hex = backgroundColor
	const r = parseInt(hex.substring(0, 2), 16);
	const g = parseInt(hex.substring(2, 4), 16);
	const b = parseInt(hex.substring(4, 6), 16);
	const brightness = (r * 299 + g * 587 + b * 114) / 1000;
	return brightness > 128 ? "#000000" : "#FFFFFF";
}

</script>
