<template>
    <div class="container h-100">
		<div class="row h-100 justify-content-center mt-5">
			<div class="col-12 col-md-6 offser-md-3">
				<div class="card shadow sm">
					<div class="cardbody p-2">
						<h1 class="text-center">Register</h1>
						<hr/>
						<form action="javascript:void(0)" class="form row" method="post">
							<div class="form-group col-12">
								<label for="name" class="font-weight-bold">Name</label>
								<input type="text" v-model="user.name" name="name" id="name" class="form-control">
							</div>
							<div class="form-group col-12">
								<label for="email" class="font-weight-bold">Email</label>
								<input type="text" v-model="user.email" name="email" id="email" class="form-control">
							</div>
							<div class="form-group col-12">
								<label for="password" class="font-weight-bold">Password</label>
								<input type="password" v-model="user.password" name="password" class="form-control" id="password">
							</div>
							<div class="form-group col-12">
								<label for="password_confirmation" class="font-weight-bold">Password</label>
								<input type="password" v-model="user.password_confirmation" name="password_confirmation" class="form-control" id="password_confirmation">
							</div>
							<div class="col-12">
								<div class="d-flex justify-content-center mt-3">
									<button type="submit" :disabled="processing" @click="register" class="btn btn-danger" v-text="processing ? 'Please wait' : 'Register'"></button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
    import {mapActions} from 'vuex';

    export default {
		data() {
			return {
				user: {
					name: '',
					email: '',
					password: '',
					password_confirmation: '',
				},
				processing: false
			}
		},
		methods: {
			...mapActions({
				login: 'auth/login',
			}),

			async register() {
				this.processing = true;
				await axios.get('/sanctum/csrf-cookie')
				await axios.post('/api/register', this.user)
					.then(async response => {
						await this.login();

                        this.$router.push({ name: 'home' });
					}).catch((message) => {
						alert(data.message);
					}).finally(() => {
						this.processing = false;
					})
			},
		}
	}
</script>
