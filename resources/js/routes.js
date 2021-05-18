import AllProjectoffers from "./ProjectOffer/AllProjectoffers";
import AddProjectOffer from "./ProjectOffer/AddProjectOffer";
import EditProjectOffer from "./ProjectOffer/EditProjectOffer";
import ShowProjectOffer from "./ProjectOffer/ShowProjectOffer";

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

