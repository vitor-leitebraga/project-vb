<template>
	<label class="form-control w-full">
		<FormLabel :label="label" />
		<input
			ref="filesElement"
			type="file"
			class="file-input file-input-bordered w-full max-w-xl"
			accept="image/png, image/gif, image/jpeg, image/jpg, image/avif, image/webp"
			@change="$emit('update:modelValue', $event.target.files[0])"
		>
		<span class="label-text-alt mt-1">
			<slot />
		</span>
	</label>
</template>

<script setup>
import FormLabel from "@/Components/Form/FormLabel.vue";

const props = defineProps({
	label: {
		type: String,
		default: ""
	},

	modelValue: {
		type: String,
		default: ""
	},
});

defineEmits(["update:modelValue"]);

</script>
