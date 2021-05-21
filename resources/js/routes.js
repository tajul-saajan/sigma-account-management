import AllProjectoffers from "./ProjectOffer/AllProjectoffers";
import AddProjectOffer from "./ProjectOffer/AddProjectOffer";
import EditProjectOffer from "./ProjectOffer/EditProjectOffer";
import ShowProjectOffer from "./ProjectOffer/ShowProjectOffer";
import AllAccountTypes from "./AccountTypes/AllAccountTypes";
import EditAccountType from "./AccountTypes/EditAccountType";
import AddAccountType from "./AccountTypes/AddAccountType";
import AllAccountSubTypes from "./AccountSubTypes/AllAccountSubTypes";
import AddAccountSubType from "./AccountSubTypes/AddAccountSubType";
import EditAccountSubType from "./AccountSubTypes/EditAccountSubType";
import AllSubProjects from "./SubProjects/AllSubProjects";
import AddSubProjects from "./SubProjects/AddSubProjects";
import EditSubProjects from "./SubProjects/EditSubProjects";
import AllJournals from "./Journals/AllJournals";
import AddJournal from "./Journals/AddJournal";
import EditJournal from "./Journals/EditJournal";
import FileUploader from "./ProjectOffer/FileUploader";
import AllCharts from "./ChartOfAccounts/AllCharts";
import AddCharts from "./ChartOfAccounts/AddChart";
import AddChart from "./ChartOfAccounts/AddChart";
import EditChart from "./ChartOfAccounts/EditChart";

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
    },

    // account types routes

    {
        name: 'allAccountTypes',
        path: '/allAccountTypes',
        component: AllAccountTypes
    },

    {
        name: 'addAccountTypes',
        path: '/addAccountTypes',
        component: AddAccountType
    },
    {
        name: 'editAccountTypes',
        path: '/editAccountTypes',
        component: EditAccountType
    },
    {
        name: 'allAccountSubTypes',
        path: '/allAccountSubTypes',
        component: AllAccountSubTypes
    },

    {
        name: 'addAccountSubTypes',
        path: '/addAccountSubTypes',
        component: AddAccountSubType
    },
    {
        name: 'editAccountSubTypes',
        path: '/editAccountSubTypes',
        component: EditAccountSubType
    },
    {
        name: 'allSubProjects',
        path: '/allSubProjects',
        component: AllSubProjects
    },

    {
        name: 'addSubProjects',
        path: '/addSubProjects',
        component: AddSubProjects
    },
    {
        name: 'editSubProjects',
        path: '/editSubProjects',
        component: EditSubProjects
    },
    {
        name: 'allJournals',
        path: '/allJournals',
        component: AllJournals
    },

    {
        name: 'addJournal',
        path: '/addJournal',
        component: AddJournal
    },
    {
        name: 'editJournal',
        path: '/editJournal',
        component: EditJournal
    },
    {
        name: 'allCharts',
        path: '/allCharts',
        component: AllCharts
    },

    {
        name: 'addChart',
        path: '/addChart',
        component: AddChart
    },
    {
        name: 'editChart',
        path: '/editChart',
        component: EditChart
    },

];

