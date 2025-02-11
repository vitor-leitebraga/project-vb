<template>
	<div class="navbar-start">
		<div class="dropdown">
			<MenuIcon />
			<ul class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
				<MenuItem
					v-for="navItem in navigation"
					:key="navItem.id"
					:nav-item="navItem"
				/>
			</ul>
		</div>
	</div>
</template>

<script setup>
import MenuIcon from "@/Components/Navigation/MenuIcon.vue";
import MenuItem from "@/Components/Navigation/MenuItem.vue";

defineProps({
	navigation: {
		default: () => [],
		type: Array
	}
})

</script>
