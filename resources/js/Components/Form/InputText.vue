<template>
	<label class="form-control w-full">
		<div class="label">
			<span class="label-text text-lg">{{ label }}</span>
		</div>
		<input
			ref="input"
			:type="type"
			class="input input-bordered w-full"
			:value="modelValue"
			required
			autofocus
			@input="$emit('update:modelValue', $event.target.value)"
		>
		<span class="label-text-alt mt-1">
			<slot />
		</span>
	</label>
</template>

<script setup>
import { onMounted, ref } from "vue";

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

const input = ref(null);

onMounted(() => {
	if (input.value.hasAttribute("autofocus")) {
		input.value.focus();
	}
});

defineExpose({ focus: () => input.value.focus() });
</script>
