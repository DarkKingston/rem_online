import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'
import Layout from './Shared/Layout.vue'
import { createPinia } from 'pinia'
import vClickOutside from "click-outside-vue3"
import FontAwesomeIcon from './plugins/font-awesome';
import 'swiper/swiper-bundle.css';
InertiaProgress.init()
const pinia = createPinia();
createInertiaApp({
    resolve: name => {
        const page = require(`./Pages/${name}`).default;
        page.layout = page.layout || Layout
        return page
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(pinia)
            .use(vClickOutside)
            .component('font-awesome-icon', FontAwesomeIcon)
            .mixin({ methods: {route: window.route}})
            .mount(el)
    },
})
