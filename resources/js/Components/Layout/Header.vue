<template>
	<Head :title="title" />
	<header class="items-center gap-2">
		<div class="navbar bg-gray-800 rounded-lg">
			<MobileMenu :navigation="navigation" />
			<MainMenu :navigation="navigation" />
			<div class="navbar-end">
				<UserMenu />
			</div>
		</div>
	</header>
</template>

<script setup>
import { Head } from "@inertiajs/vue3";
import MobileMenu from "@/Components/Navigation/MobileMenu.vue";
import MainMenu from "@/Components/Layout/MainMenu.vue";
import UserMenu from "@/Components/Layout/UserMenu.vue";
import navigation from "@/Assets/navigation.js";

defineProps({
	title: {
		default: "",
		type: String
	}
})
</script>
