<template>
	<div
		v-if="loading"
		class="absolute w-full h-full flex items-center justify-center"
	>
		<div class="h-12 w-12 animate-spin rounded-full border-2 border-primary border-r-transparent" />
	</div>
</template>

<script setup>
defineProps({
	loading: {
		type: Boolean,
		default: false
	}
})
</script>
