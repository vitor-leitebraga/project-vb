import pluginVue from "eslint-plugin-vue"
export default [
	// add more generic rulesets here, such as:
	// js.configs.recommended,
	...pluginVue.configs["flat/recommended"],
	{
		rules: {
			"indent": [
				"error",
				"tab"
			],
			"linebreak-style": [
				"error",
				"unix"
			],
			"quotes": [
				"error",
				"double"
			],
			"vue/multi-word-component-names": 0,
			"vue/html-indent": ["error", "tab"],
		}
	}
]
