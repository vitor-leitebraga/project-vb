import { usePage } from "@inertiajs/vue3";

export function useCheckAuth() {
	return !!usePage().props.auth.user
}

export function useGetUserId() {
	return usePage().props.auth.user?.id ?? null
}

export function useIsGameOwner(gameId){
	const authUser = usePage().props.auth.user;
	return authUser && authUser.id === gameId;
}
