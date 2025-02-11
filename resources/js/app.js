import "./bootstrap";
import "../css/app.css";

import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { ZiggyVue } from "ziggy-js";
import {createPinia} from "pinia"
import MasonryWall from "@yeger/vue-masonry-wall"

const appName = import.meta.env.VITE_APP_NAME || "Curotec VB";

createInertiaApp({
	title: (title) => `${title} - ${appName}`,
	resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob("./Pages/**/*.vue")),
	setup({ el, App, props, plugin }) {
		return createApp({ render: () => h(App, props) })
			.use(plugin)
			.use(ZiggyVue)
			.use(createPinia())
			.use(MasonryWall)
			.mount(el);
	},
	progress: {
		color: "#4B5563",
	},
});
