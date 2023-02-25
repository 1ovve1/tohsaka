const routes = [
	{
		path: '/',
		component: () => import('../pages/Home.vue'),
		name: 'home'
	},
    {
		path: '/login',
		component: () => import('../pages/Login.vue'),
		name: 'login'
	},
    {
		path: '/register',
		component: () => import('../pages/Register.vue'),
		name: 'register'
	},
]

export default routes;
