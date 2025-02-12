import { usePage } from "@inertiajs/vue3";

export function useCheckAuth() {
	return !!usePage().props.auth.user
}

export function useGetUserId() {
	return usePage().props.auth.user?.id ?? null
}

// export function useHasBuddy(buddyId) {
// 	return useCheckAuth() ? useBuddyStore().getUserBuddyIds().includes(buddyId) : false
// }
