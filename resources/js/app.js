import './bootstrap';
import { createApp, h } from 'vue'
import { createInertiaApp, Link, Head } from '@inertiajs/vue3'
import chart from 'vue3-apexcharts';
import AdminLayout from '@/Shared/Admin/Layout.vue';
import BadgeLayout from '@/Shared/Admin/Badge/Layout.vue';
import AuthLayout from '@/Shared/Auth/Layout.vue';
import VisitorLayout from '@/Shared/Visitor/Layout.vue';

// Start DataTables

import 'datatables.net-responsive-bs5';
import DataTable from 'datatables.net-vue3';
import DataTableLib from 'datatables.net-bs5';
import Select from 'datatables.net-select';
import Buttons from 'datatables.net-buttons-bs5';
import ButtonsHtml5 from 'datatables.net-buttons/js/buttons.html5';
import colvis from 'datatables.net-buttons/js/buttons.colVis';
import 'datatables.net-buttons';
import print from 'datatables.net-buttons/js/buttons.print';
import pdfmake from 'pdfmake'; 

DataTable.use(Select);
DataTable.use(Buttons);
DataTable.use(ButtonsHtml5);
DataTable.use(print);
DataTable.use(colvis);
DataTable.use(pdfmake);
DataTable.use(DataTableLib);

// End DataTables

createInertiaApp({
    progress: {
        // The delay after which the progress bar will appear
        // during navigation, in milliseconds.
        delay: 250,

        // The color of the progress bar.
        color: '#29d',

        // Whether to include the default NProgress styles.
        includeCSS: true,

        // Whether the NProgress spinner will be shown.
        showSpinner: false,
    },
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
        const page = pages[`./Pages/${name}.vue`];
        if(name.includes('Auth')){
            page.default.layout = AuthLayout;
        }
        else if(name.includes('Admin')){

            if(!name.includes('Badge')) 
                page.default.layout = AdminLayout;
            else 
                page.default.layout = BadgeLayout;

        }
        else{
            page.default.layout = VisitorLayout;
        }
        return pages[`./Pages/${name}.vue`]
    },
    setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
        .use(plugin)
        .use(chart)
        .component('Link',Link)
        .component('Head',Head)
        .component('DataTable',DataTable)
        .component('chart',chart)
        .mixin({methods: {route}})
        .mount(el)
    },
    title: (title) => 'RS4IT - '+title
})
