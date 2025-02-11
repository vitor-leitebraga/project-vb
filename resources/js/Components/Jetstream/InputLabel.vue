<template>
	<label class="block text-white-700">
		<span v-if="value">{{ value }}</span>
		<span v-else><slot /></span>
	</label>
</template>

<script setup>
defineProps({
	value: String,
});
</script>
