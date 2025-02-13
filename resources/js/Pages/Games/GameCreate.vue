<template>
	<AppLayout title="Games">
		<div class="flex items-center max-w-lg w-full">
			<GameForm />
		</div>
	</AppLayout>
</template>

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import GameForm from "@/Pages/Games/Partials/GameForm.vue";

defineProps({
	title: {
		type: String,
		default: ""
	}
});
</script>
