<template>
	<div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
		<div class="min-h-screen flex flex-col items-center selection:bg-[#FF2D20] selection:text-white">
			<div class="flex flex-col gap-y-4 w-full max-w-2xl px-6 lg:max-w-7xl flex-1 py-6">
				<Header :title="title" />
				<main class="bg-gray-900 w-full rounded p-4 flex-1 flex">
					<div class="flex flex-1 justify-center items-center">
						<slot />
					</div>
				</main>
			</div>
		</div>
	</div>
</template>

<script setup>
import Header from "@/Components/Layout/Header.vue";

defineProps({
	title: {
		type: String,
		default: ""
	}
});
</script>
