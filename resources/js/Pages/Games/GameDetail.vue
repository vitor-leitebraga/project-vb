<template>
	<AppLayout :title="game.name">
		<div class="flex flex-col items-center bg-base-100 rounded-xl w-full p-6 shadow-lg">
			<!-- Imagem Grande -->
			<div class="relative w-full max-w-3xl bg-base-300 rounded-lg shadow-xl overflow-hidden">
				<img
					:src="game.image_url"
					class="w-full object-cover rounded-lg"
				>
			</div>

			<!-- Conteúdo -->
			<div class="flex flex-col items-center w-full max-w-3xl mt-6 text-center">
				<h1 class="text-3xl font-bold text-white">
					{{ game.name }}
				</h1>
				<p class="text-lg text-gray-300 mt-2">
					{{ game.description }}
				</p>
			</div>

			<div class="flex items-center gap-3 mt-4 bg-base-300 p-3 rounded-lg shadow-md">
				<span class="text-gray-400">Created by:</span>
				<span class="text-white font-semibold">{{ game.user.name }}</span>
			</div>

			<!-- Botão Voltar -->
			<Link
				:href="route('games.index')"
				class="mt-6 btn btn-outline btn-primary"
			>
				← Back to Games
			</Link>
		</div>
	</AppLayout>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";

defineProps({
	game: {
		type: Object,
		default: () => {}
	}
});
</script>
