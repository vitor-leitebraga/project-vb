<template>
	<AppLayout title="Games">
		<div class="flex flex-col bg-gray-600 rounded-xl w-full p-4">
			<masonry-wall
				:items="$page.props.games.data"
				:gap="16"
				:min-columns="2"
				:column-width="300"
				class="flex-1 min-h-max"
			>
				<template #default="{ item }">
					<ItemPanel
						:key="item.id"
						:item="item"
					/>
				</template>
			</masonry-wall>
			<Pagination :items="$page.props.games.links" />
		</div>
	</AppLayout>
</template>

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import ItemPanel from "@/Components/Layout/ItemPanel.vue";
import Pagination from "@/Components/Layout/Pagination.vue";

defineProps({
	title: {
		type: String,
		default: ""
	}
});
</script>
