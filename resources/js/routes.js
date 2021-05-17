import AllProjectoffers from "./AllProjectoffers";
import AddProjectOffer from "./AddProjectOffer";
import EditProjectOffer from "./EditProjectOffer";
import ShowProjectOffer from "./ShowProjectOffer";

export const routes = [
    {
        name: 'home',
        path: '/',
        component: AllProjectoffers
    },
    {
        name: 'add',
        path: '/add',
        component: AddProjectOffer
    },
    {
        name: 'edit',
        path: '/edit',
        component: EditProjectOffer
    },
    {
        name: 'show',
        path: '/show',
        component: ShowProjectOffer
    }
];

