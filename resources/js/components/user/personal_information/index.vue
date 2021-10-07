<template>
	<div class="container">
		<span v-for="user in users" :key="user.id">
			<h2 class="h3 ServicesList-title mt-5 pl-3 text-color-accedo">Informacion De Acceso</h2>
			<div class="form-row">
				<div>
					<label class="font__helvetica--light title_label">Email</label>
					<input type="email" name="email" class="form-control" id="email" placeholder="Email" v-model="user.email" required>
				</div>
				<div>
					<label class="font__helvetica--light title_label">Password</label>
					<input type="password" name="password" class="form-control" id="password" placeholder="Password" ref="password" v-model="user.password">
				</div>
				<div>
					<label class="font__helvetica--light title_label">Confirm Password</label>
					<input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Password" v-model="user.password">
				</div>
			</div>
			<h2 class="h3 ServicesList-title mt-2 pl-3 ServicesList-title text-color-accedo">Personal Information</h2>
			<div class="form-row">
				<div class="form-group col-md-4">
					<label class="font__helvetica--light title_label">Identification</label>
					<input type="text" class="form-control" id="id_number" v-model="user.identification_card" required>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-3">
					<label class="font__helvetica--light title_label">Full Name</label>
					<input type="text" class="form-control" id="name" placeholder="Full Name" v-model="user.first_name" required>
				</div>
				<div class="form-group col-md-3">
					<label class="font__helvetica--light title_label">Country of employment</label>
					<input type="text" class="form-control" id="cell_phone_number" placeholder="Cell Phone Number" v-model="user.country_of_employment">
				</div>
			</div>
		</span>
	</div>
</template>

<script>
	export default {
		props: ["users"],
		mounted() {
			console.log(this.users[0].name);
		},
	};
</script>
