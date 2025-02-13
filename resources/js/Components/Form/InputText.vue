<template>
	<label class="form-control w-full">
		<FormLabel :label="label" />
		<input
			ref="input"
			:type="type"
			class="input input-bordered w-full"
			:value="modelValue"
			required
			@input="$emit('update:modelValue', $event.target.value)"
		>
		<span class="label-text-alt mt-1">
			<slot />
		</span>
	</label>
</template>

<script setup>
import FormLabel from "@/Components/Form/FormLabel.vue";

defineProps({
	label: {
		type: String,
		default: ""
	},

	type: {
		type: String,
		default: "text"
	},

	modelValue: {
		type: String,
		default: ""
	},
});

defineEmits(["update:modelValue"]);
</script>
