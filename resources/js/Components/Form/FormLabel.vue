<template>
	<div class="label">
		<span class="label-text text-lg">{{ label }}</span>
	</div>
</template>

<script setup>

defineProps({
	label: {
		type: String,
		default: ""
	}
})
</script>
