<template>
	<form
		class="flex flex-col gap-y-2 w-full bg-gray-600 rounded-xl p-4"
		@submit.prevent="submit"
	>
		<InputText
			v-model="form.name"
			label="Name"
		>
			<InputError :message="formErrors.name" />
		</InputText>
		<InputTextArea
			v-model="form.description"
			label="Description"
		>
			<InputError :message="formErrors.description" />
		</InputTextArea>
		<InputFile
			v-model="form.image"
			label="Image"
		>
			<InputError :message="formErrors.image" />
		</InputFile>
		<button
			class="btn bg-base-300 hover:bg-base-100 text-xl mt-2"
			:class="{ 'opacity-25': form.processing }"
			:disabled="form.processing"
		>
			{{ game ? 'Update' : 'Create' }}
		</button>
	</form>
</template>

<script setup>

import InputText from "@/Components/Form/InputText.vue";
import {computed} from "vue";
import { useForm, usePage } from "@inertiajs/vue3";
import InputError from "@/Components/Jetstream/InputError.vue";
import InputTextArea from "@/Components/Form/InputTextArea.vue";
import InputFile from "@/Components/Form/InputFile.vue";

const props = defineProps({
	game: {
		default: () => {},
		type: Object
	}
});

const form = useForm({
	name: props.game?.name || "",
	description: props.game?.description || "",
	image: null
})

const formErrors = computed(() => {
	return usePage().props.errors
})

const submit = () => {
	if (props.game) {
		form.post(route("games.update", { game: props.game.id }));
	} else {
		form.post(route("games.store"));
	}
}

</script>
