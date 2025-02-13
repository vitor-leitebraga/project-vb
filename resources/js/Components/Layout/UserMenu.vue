<template>
	<div
		v-if="$page.props.auth.user"
		class="ms-3 relative"
	>
		<Dropdown
			align="right"
			width="48"
		>
			<template #trigger>
				<span class="inline-flex rounded-md">
					<button
						type="button"
						class="inline-flex items-center px-3 py-2 border border-transparent text-lg leading-4
							font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800
							hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50
							dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition
							ease-in-out duration-150"
					>
						{{ $page.props.auth.user.name }}

						<svg
							class="ms-2 -me-0.5 h-4 w-4"
							xmlns="http://www.w3.org/2000/svg"
							fill="none"
							viewBox="0 0 24 24"
							stroke-width="1.5"
							stroke="currentColor"
						>
							<path
								stroke-linecap="round"
								stroke-linejoin="round"
								d="M19.5 8.25l-7.5 7.5-7.5-7.5"
							/>
						</svg>
					</button>
				</span>
			</template>

			<template #content>
				<DropdownLink :href="route('user.games', $page.props.auth.user.name.replace(/\s+/g, '-').toLowerCase())">
					My Games
				</DropdownLink>

				<div class="border-t border-gray-200 dark:border-gray-600" />

				<form @submit.prevent="logout">
					<DropdownLink as="button">
						Log Out
					</DropdownLink>
				</form>
			</template>
		</Dropdown>
	</div>
	<div v-else>
		<ul class="menu menu-horizontal">
			<li>
				<Link
					:href="route('login')"
					class="text-lg"
				>
					Log in
				</Link>
			</li>
			<li>
				<Link
					:href="route('register')"
					class="text-lg"
				>
					Register
				</Link>
			</li>
		</ul>
	</div>
</template>

<script setup>
import { Link, router } from "@inertiajs/vue3";
import Dropdown from "@/Components/Jetstream/Dropdown.vue";
import DropdownLink from "@/Components/Jetstream/DropdownLink.vue";

const logout = () => {
	router.post(route("logout"));
};
</script>
