import Apicalling from './components/ApiCalling'
import ListTeamComponent from './components/ListTeamComponent'

export const routes = [
	{ path: '/', name: 'list-product', component: Apicalling },
	{ path: '/listteam', name: 'list-team', component: ListTeamComponent }
];
