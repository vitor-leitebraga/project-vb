<template>
	<li>
		<Link
			:href="route(navItem.route)"
			class="sm:text-xl"
		>
			{{ navItem.name }}
		</Link>
	</li>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
	navItem: {
		default: () => {},
		type: Object
	}
})
</script>
