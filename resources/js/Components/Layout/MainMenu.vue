<template>
	<div class="navbar-center hidden lg:flex">
		<ul class="menu menu-horizontal px-1">
			<MenuItem
				v-for="navItem in navigation"
				:key="navItem.id"
				:nav-item="navItem"
			/>
		</ul>
	</div>
</template>

<script setup>
import MenuItem from "@/Components/Navigation/MenuItem.vue";

defineProps({
	navigation: {
		default: () => [],
		type: Array
	}
})

</script>
