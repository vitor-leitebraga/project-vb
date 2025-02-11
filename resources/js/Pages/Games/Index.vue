<template>
	<AppLayout title="Games">
		<div class="flex bg-gray-600 rounded-xl w-full justify-center p-4 text-2xl">
			<masonry-wall
				:items="$page.props.games.data"
				:gap="16"
				:min-columns="2"
				:column-width="200"
				class="flex-1 min-h-max text-xs xm:text-base"
			>
				<template #default="{ item, index }">
					{{ item.name }}
<!--					<BuddyPanel-->
<!--						:key="item.id"-->
<!--						:buddy="item"-->
<!--						@add-item-total-value="addItemTotalValue"-->
<!--						@remove-item-total-value="removeItemTotalValue"-->
<!--					/>-->
				</template>
			</masonry-wall>
			<Pagination :items="$page.props.games.links" />
		</div>
	</AppLayout>
</template>

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";

defineProps({
	title: {
		type: String,
		default: ""
	}
});
</script>
