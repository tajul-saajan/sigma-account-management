import AllProjectoffers from "./ProjectOffer/AllProjectoffers";
import AddProjectOffer from "./ProjectOffer/AddProjectOffer";
import EditProjectOffer from "./ProjectOffer/EditProjectOffer";
import ShowProjectOffer from "./ProjectOffer/ShowProjectOffer";
import AllAccountTypes from "./AccountTypes/AllAccountTypes";
import EditAccountType from "./AccountTypes/EditAccountType";
import AddAccountType from "./AccountTypes/AddAccountType";

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
    },

    // account types routes

    {
        name: 'allAccountTypes',
        path: '/allAccountTypes',
        component: AllAccountTypes
    },

    {
        name: 'editAccountTypes',
        path: '/editAccountTypes',
        component: EditAccountType
    },
    {
        name: 'addAccountTypes',
        path: '/addAccountTypes',
        component: AddAccountType
    }
];

