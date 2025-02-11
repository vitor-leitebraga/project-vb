<template>
	<AppLayout title="Home">
		<div class="flex bg-gray-600 rounded-xl w-full justify-center p-4 text-2xl">
			Welcome to Curotec VB, a new home for your Games.
		</div>
	</AppLayout>
</template>

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";

defineProps({
	title: {
		type: String,
		default: ""
	}
});
</script>
