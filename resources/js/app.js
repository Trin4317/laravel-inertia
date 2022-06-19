import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'
import Layout from './Shared/Layout';

createInertiaApp({
    resolve: async name => {
        // Dynamically import Pages components //
        // `import` will return a Promise, so we can't call default
        // right after since it has to be fetched first,
        // which is why we use async-await
        let page = (await import(`./Pages/${name}`)).default;

        if (page.layout === undefined) {
            page.layout = Layout;
        }

        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mount(el)
    },
    // set the title template using title defined in each Pages
    title: title => `${title} - My App`,
})

InertiaProgress.init({
    color: 'green',
    showSpinner: true,
})
