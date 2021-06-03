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
import AddChart from "./ChartOfAccounts/AddChart";
import EditChart from "./ChartOfAccounts/EditChart";
import AllProjects from "./Projects/AllProjects";
import AddProject from "./Projects/AddProject";
import EditProject from "./Projects/EditProject";
import AllInventories from "./Inventories/AllInventories";
import AddInventory from "./Inventories/AddInventory";
import EditInventory from "./Inventories/EditInventory";
import AllInventoryItems from "./InventoryItems/AllInventoryItems";
import AddInventoryItem from "./InventoryItems/AddInventoryItem";
import EditInventoryItem from "./InventoryItems/EditInventoryItem";
import AllItems from "./Items/AllItems";
import AddItem from "./Items/AddItem";
import EditItem from "./Items/EditItem";
import AllTransactions from "./Transactions/AllTransactions";
import AddTransaction from "./Transactions/AddTransaction";
import EditTransaction from "./Transactions/EditTransaction";
import AllRequisitions from "./Requisitions/AllRequisitions";
import AddRequisition from "./Requisitions/AddRequisition";
import EditRequisition from "./Requisitions/EditRequisition";
import AllEmployees from "./Employees/AllEmployees";
import AddEmployee from "./Employees/AddEmployee";
import EditEmployee from "./Employees/EditEmployee";
import AllApplications from "./Applications/AllApplications";
import AddApplication from "./Applications/AddApplication";
import EditApplication from "./Applications/EditApplication";
import LogIn from "./LogIn";
import AllRoles from "./Roles/AllRoles";
import AddRole from "./Roles/AddRole";
import EditRole from "./Roles/EditRole";
import AllUsers from "./Users/AllUsers";
import AddUser from "./Users/AddUser";
import EditUser from "./Users/EditUser";


export const routes = [
    {
        name: 'login',
        path: '/login',
        component: LogIn
    },

    // Projectoffers
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
        component: AllAccountTypes,
        meta:{
            requiresAuth:true
        }
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
    // AccountSubTypes
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
    //SubProjects
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
    // Journals
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
    //charts
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
    //projects
    {
        name: 'allProjects',
        path: '/allProjects',
        component: AllProjects
    },

    {
        name: 'addProject',
        path: '/addProject',
        component: AddProject
    },
    {
        name: 'editProject',
        path: '/editProject',
        component: EditProject
    },
    //Inventories
    {
        name: 'allInventories',
        path: '/allInventories',
        component: AllInventories
    },

    {
        name: 'addInventory',
        path: '/addInventory',
        component: AddInventory
    },
    {
        name: 'editInventory',
        path: '/editInventory',
        component: EditInventory
    },
    //Inventory Items
    {
        name: 'allInventoryItems',
        path: '/allInventoryItems',
        component: AllInventoryItems
    },

    {
        name: 'addInventoryItem',
        path: '/addInventoryItem',
        component: AddInventoryItem
    },
    {
        name: 'editInventoryItem',
        path: '/editInventoryItem',
        component: EditInventoryItem
    },
    //Items
    {
        name: 'allItems',
        path: '/allItems',
        component: AllItems
    },

    {
        name: 'addItem',
        path: '/addItem',
        component: AddItem
    },
    {
        name: 'editItem',
        path: '/editItem',
        component: EditItem
    },
    //Transactions
    {
        name: 'allTransactions',
        path: '/allTransactions',
        component: AllTransactions
    },

    {
        name: 'addTransaction',
        path: '/addTransaction',
        component: AddTransaction
    },
    {
        name: 'editTransaction',
        path: '/editTransaction',
        component: EditTransaction
    },

    //Requisitions
    {
        name: 'allRequisitions',
        path: '/allRequisitions',
        component: AllRequisitions
    },

    {
        name: 'addRequisition',
        path: '/addRequisition',
        component: AddRequisition
    },
    {
        name: 'editRequisition',
        path: '/editRequisition',
        component: EditRequisition
    },
    //Employees
    {
        name: 'allEmployees',
        path: '/allEmployees',
        component: AllEmployees
    },
    {
        name: 'addEmployee',
        path: '/addEmployee',
        component: AddEmployee
    },
    {
        name: 'editEmployee',
        path: '/editEmployee',
        component: EditEmployee
    },
    //Leave Applications
    {
        name: 'allApplications',
        path: '/allApplications',
        component: AllApplications
    },
    {
        name: 'addApplication',
        path: '/addApplication',
        component: AddApplication
    },
    {
        name: 'editApplication',
        path: '/editApplication',
        component: EditApplication
    },

    //Roles
    {
        name: 'allRoles',
        path: '/allRoles',
        component: AllRoles
    },
    {
        name: 'addRole',
        path: '/addRole',
        component: AddRole
    },
    {
        name: 'editRole',
        path: '/editRole',
        component: EditRole
    },

    //Users
    {
        name: 'allUsers',
        path: '/allUsers',
        component: AllUsers
    },
    {
        name: 'addUser',
        path: '/addUser',
        component: AddUser
    },
    {
        name: 'editUser',
        path: '/editUser',
        component: EditUser
    },
];

