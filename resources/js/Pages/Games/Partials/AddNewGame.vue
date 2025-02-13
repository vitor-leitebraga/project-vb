<template>
	<Link
		v-if="$page.props.auth.user"
		:href="route('games.create')"
		class="w-full p-2 flex items-center justify-center rounded-lg text-lg bg-base-100 cursor-pointer hover:bg-base-300"
	>
		+ Create a new Game
	</Link>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
</script>
