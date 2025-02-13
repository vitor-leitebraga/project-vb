<template>
	<AppLayout title="Edit Game">
		<div class="flex items-center max-w-lg w-full">
			<GameForm :game="game" />
		</div>
	</AppLayout>
</template>

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import GameForm from "@/Pages/Games/Partials/GameForm.vue";

defineProps({
	game: {
		type: Object,
		default: () => {}
	}
});
</script>
