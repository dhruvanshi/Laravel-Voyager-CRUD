import ViewPeople from './components/ViewPeople.vue';
import AddPerson from './components/AddPerson.vue';
import EditPerson from './components/EditPerson.vue';

export const routes = [{
        name: 'people',
        path: '/people',
        component: ViewPeople
    },
    {
        name: 'add',
        path: '/people/add',
        component: AddPerson
    },
    {
        name: 'edit',
        path: '/people/edit/:id',
        component: EditPerson
    }
];