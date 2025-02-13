<template>
	<AppLayout title="Register">
		<div class="flex items-center max-w-lg w-full">
			<form
				class="flex flex-col gap-y-2 max-w-lg w-full bg-gray-600 rounded-xl p-4"
				@submit.prevent="submit"
			>
				<InputText
					v-model="form.name"
					label="Name"
				>
					<InputError :message="form.errors.name" />
				</InputText>

				<InputText
					v-model="form.email"
					label="E-mail"
					type="email"
				>
					<InputError :message="form.errors.email" />
				</InputText>

				<InputText
					v-model="form.password"
					label="Password"
					type="password"
				>
					<InputError :message="form.errors.password" />
				</InputText>

				<InputText
					v-model="form.password_confirmation"
					label="Confirm Password"
					type="password"
				>
					<InputError :message="form.errors.password_confirmation" />
				</InputText>

				<div class="flex items-center justify-end gap-x-2">
					<Link
						:href="route('login')"
						class="underline text-sm text-gray-400 hover:text-gray-300 rounded-md"
					>
						Already registered?
					</Link>

					<PrimaryButton
						class="btn btn-primary"
						:class="{ 'opacity-25': form.processing }"
						:disabled="form.processing"
					>
						Register
					</PrimaryButton>
				</div>
			</form>
		</div>
	</AppLayout>
</template>

<script setup>
import { Link, useForm } from "@inertiajs/vue3";
import InputError from "@/Components/Jetstream/InputError.vue";
import PrimaryButton from "@/Components/Jetstream/PrimaryButton.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import InputText from "@/Components/Form/InputText.vue";

const form = useForm({
	name: "",
	email: "",
	password: "",
	password_confirmation: "",
	terms: false,
});

const submit = () => {
	form.post(route("register"), {
		onFinish: () => form.reset("password", "password_confirmation"),
	});
};
</script>
