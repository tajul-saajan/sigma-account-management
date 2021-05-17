import AllProjectoffers from "./AllProjectoffers";
import AddProjectOffer from "./AddProjectOffer";
import EditProjectOffer from "./EditProjectOffer";
import ShowProjectOffer from "./ShowProjectOffer";
import FileUploader from "./FileUploader";

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
    {
        name: 'uploadFile',
        path: '/uploadFile',
        component: FileUploader
    }
];

