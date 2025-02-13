<template>
	<div
		class="relative w-full bg-base-100 rounded-lg h-fit cursor-pointer hover:bg-base-300 group vl-parent"
		:class="{
			'pointer-events-none': loading,
		}"
	>
		<LoadingPanel
			:loading="loading"
			class="z-50"
		/>
		<div class="relative">
			<div class="flex items-center justify-center bg-base-300 rounded-t-lg">
				<img
					:src="item.image_url"
					class="xm:h-28 rounded-t-lg shadow-2xl"
				>
			</div>
		</div>
		<div class="flex w-full h-20 text-center items-center justify-center p-2 gap-x-2 rounded-b-lg">
			<div class="flex-1">
				{{ item.name }}
			</div>
		</div>

		<Link
			v-if="useIsGameOwner(item.user_id)"
			:href="route('games.edit', {game: item})"
			class="absolute top-2 right-2 bg-yellow-500 text-white px-3 py-1 rounded-lg shadow-lg text-sm
				hover:bg-yellow-400 transition"
		>
			Edit
		</Link>
	</div>
</template>

<script setup>
import { ref } from "vue";
import LoadingPanel from "@/Components/Layout/LoadingPanel.vue";
import { Link } from "@inertiajs/vue3";
import { useIsGameOwner } from "@/Composables/useAuth.js";

const props = defineProps({
	item: {
		type: Object,
		default: () => {}
	},
});

const loading = ref(false);
</script>
