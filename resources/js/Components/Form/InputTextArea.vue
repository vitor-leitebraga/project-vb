<template>
	<label class="form-control w-full">
		<FormLabel :label="label" />
		<textarea
			ref="input"
			class="textarea textarea-lg h-40 px-4 py-2"
			:value="modelValue"
			required
			@input="$emit('update:modelValue', $event.target.value)"
		/>
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

	modelValue: {
		type: String,
		default: ""
	},
});

defineEmits(["update:modelValue"]);
</script>
