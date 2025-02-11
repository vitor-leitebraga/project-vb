<template>
	<div
		class="relative w-full bg-base-100 rounded-lg h-fit cursor-pointer hover:bg-base-300 group vl-parent"
		:class="{
			'pointer-events-none': loading,
		}"
		@click="addBuddy(buddy.id)"
	>
		<LoadingPanel
			:loading="loading"
			class="z-50"
		/>
		<div class="relative">
			<RankingItemMedal :show="useHasBuddy(buddy.id)" />
			<div class="flex items-center justify-center bg-base-300 p-4 rounded-t-lg">
				<img
					:src="buddy.display_icon"
					class="h-12 xm:h-28 rounded-lg shadow-2xl"
				>
			</div>
		</div>
		<div
			class="flex w-full h-20 text-center items-center justify-center p-2 gap-x-2 rounded-b-lg"
			:class="{
				'bg-base-300': useHasBuddy(buddy.id) || loading
			}"
		>
			<div class="flex-0.5">
				<div
					class="flex items-center justify-center w-10 h-10 xm:w-12 xm:h-12 text-sm xm:text-lg font-bold rounded-full"
					:class="{
						'group-hover:bg-base-100 bg-base-300': !useHasBuddy(buddy.id) && !loading,
						'bg-base-100': useHasBuddy(buddy.id) || loading
					}"
				>
					{{ buddy.users_count }}
				</div>
			</div>
			<div class="flex-1">
				{{ buddy.display_name }}
			</div>
		</div>
	</div>
</template>

<script setup>

import { useCheckAuth, useGetUserId, useHasBuddy } from "@/Composables/useAuth.js";
import RankingItemMedal from "@/Components/Ranking/RankingItemMedal.vue";
import { useRequest } from "@/Composables/useRequest.js";
import { ref } from "vue";
import LoadingPanel from "@/Components/LoadingPanel.vue";

defineProps({
	buddy: {
		type: Object,
		default: () => {}
	},
});

const emit = defineEmits(["addItemTotalValue", "removeItemTotalValue"]);

const loading = ref(false);

const addBuddy = (buddyId) => {
	useRequest("post", {
		preRequest: () => {
			loading.value = true;
		},
		routeName: useCheckAuth() && useHasBuddy(buddyId) ? "user.buddy.remove" : "user.buddy.add",
		routeParams: {
			user: useGetUserId(),
			buddy: buddyId
		},
		useAuth: true,
		success: (response) => {
			response.data.hasBuddy === true ? emit("addItemTotalValue", buddyId) : emit("removeItemTotalValue", buddyId);
		},
		finally: () => {
			loading.value = false;
		}
	});
};

</script>
