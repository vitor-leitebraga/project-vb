<template>
	<AppLayout title="Login">
		<div class="flex items-center max-w-lg w-full">
			<form
				class="flex flex-col gap-y-2 w-full bg-gray-600 rounded-xl p-4"
				@submit.prevent="submit"
			>
				<InputText
					v-model="form.email"
					label="E-mail"
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

				<div class="flex w-full">
					<label class="flex items-center">
						<Checkbox
							v-model:checked="form.remember"
							name="remember"
						/>
						<span class="ms-2 cursor-pointer">Remember me</span>
					</label>

					<div class="flex flex-1 gap-x-2 items-center justify-end w-full">
						<PrimaryButton
							class="btn btn-primary"
							:class="{ 'opacity-25': form.processing }"
							:disabled="form.processing"
						>
							Log in
						</PrimaryButton>
					</div>
				</div>
			</form>
		</div>
	</AppLayout>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";
import Checkbox from "@/Components/Jetstream/Checkbox.vue";
import InputError from "@/Components/Jetstream/InputError.vue";
import PrimaryButton from "@/Components/Jetstream/PrimaryButton.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import InputText from "@/Components/Form/InputText.vue";

const form = useForm({
	email: "",
	password: "",
	remember: false,
});

const submit = () => {
	form.transform(data => ({
		...data,
		remember: form.remember ? "on" : "",
	})).post(route("login"), {
		onFinish: () => form.reset("password"),
	});
};
</script>
