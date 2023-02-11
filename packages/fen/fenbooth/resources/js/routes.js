import AllProduct from './components/ViewPeople.vue';
import CreateProduct from './components/CreatePerson.vue';
import EditProduct from './components/EditPerson.vue';

export const routes = [{
        name: 'people',
        path: '/people',
        component: AllProduct
    },
    {
        name: 'create',
        path: '/create',
        component: CreateProduct
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditProduct
    }
];