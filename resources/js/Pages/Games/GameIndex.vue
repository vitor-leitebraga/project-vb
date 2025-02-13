<template>
	<AppLayout title="Games">
		<div class="flex flex-col bg-gray-600 rounded-xl w-full p-4 gap-y-4">
			<AddNewGame />
			<GameTimeline :items="$page.props.games.data" />
		</div>
	</AppLayout>
</template>

<script setup>
import { usePage } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import { useToast } from "vue-toastification";
import { onMounted } from "vue";
import GameTimeline from "@/Pages/Games/Partials/GameTimeline.vue";
import AddNewGame from "@/Pages/Games/Partials/AddNewGame.vue";

defineProps({
	title: {
		type: String,
		default: ""
	}
});

onMounted(() => {
	if (usePage().props.flash.toast) {
		useToast().success(usePage().props.flash.toast.message);
	}
});
</script>
