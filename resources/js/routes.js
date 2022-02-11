import AllQuestion from './components/AllQuestion.vue';
import AddQuestion from './components/AddQuestion.vue';
import EditQuestion from './components/EditQuestion.vue';
  
export const routes = [
    {
        name: 'home',
        path: '/',
        component: AllQuestion
    },
    {
        name: 'add',
        path: '/add',
        component: AddQuestion
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditQuestion
    }
];