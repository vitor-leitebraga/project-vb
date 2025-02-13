<template>
	<masonry-wall
		:items="items"
		:gap="16"
		:min-columns="2"
		:column-width="300"
		class="flex-1 min-h-max"
	>
		<template #default="{ item }">
			<Link :href="route('games.show', item.id)">
				<ItemPanel
					:key="item.id"
					:item="item"
				/>
			</Link>
		</template>
	</masonry-wall>
	<Pagination :items="$page.props.games.links" />
</template>
<script setup>
import { Link } from "@inertiajs/vue3";
import ItemPanel from "@/Components/Layout/ItemPanel.vue";
import Pagination from "@/Components/Layout/Pagination.vue";

defineProps({
	items: {
		type: Array,
		default: () => []
	}
})
</script>
