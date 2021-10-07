<template>
	<div class="modal fade" id="modalEditUser">
		<div class="modal-dialog modal-xl modal-primary" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">User</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form @submit.prevent="store" autocomplete="off">
						<div class="form-group row">
							<div class="col-md-6">
								<div class="col-md-6" v-if="this.type == 'created'">
									<VueDatePicker v-model="user.date_of_admission" :min-date="this.minimum_date" :max-date="this.maximum_date" />
								</div>
								<label>Surname</label>
								<input type="text" class="form-control" placeholder="Surname" v-model="user.surname" maxlength="20" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))" required>
							</div>
							<div class="col-md-6" style="margin-top: 32px;">
								<label>Second_surname</label>
								<input type="text" class="form-control" placeholder="second_surname" v-model="user.second_surname" maxlength="20" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122)  || (event.charCode == 32))" required>
							</div>
							<div class="col-md-6">
								<label>First_name</label>
								<input type="text" class="form-control" placeholder="first_name" v-model="user.first_name" maxlength="20" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122)  || (event.charCode == 32))" required>
							</div>
							<div class="col-md-6">
								<label>Other name</label>
								<input type="text" class="form-control" placeholder="other_name" v-model="user.other_name" maxlength="300" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122)  || (event.charCode == 32))" required>
							</div>
							<div class="col-md-6">
								<label>Area</label>
								<v-select multiple label="name" :options="roles" :reduce="name => name.name" v-model="user.roles">
								</v-select>
							</div>
							<div class="col-md-6" style="top: 1rem;">
								<label>Country of employment</label>
								<select class="form-select" aria-label="Default select example" v-model="user.country_of_employment" required>
									<option>Colombia</option>
									<option>USA</option>
								</select>
							</div>
							<div class="col-md-6" style="top: 1rem; margin-bottom: 1rem;">
								<label>ID Type</label>
								<select class="form-select" aria-label="Default select example" v-model="user.id_type" required>
									<option>Citizenship Card</option>
									<option>Immigration Card</option>
									<option>Passport</option>
									<option>Special Permit</option>
								</select>
							</div>
							<div class="col-md-6">
								<label>Identification card</label>
								<input type="id" class="form-control" placeholder="document" v-model="user.identification_card" maxlength="20" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122)  || (event.charCode >= 48 && event.charCode <= 57))" required>
								<span class="badge badge-success" v-if="this.error == 'available'">{{ this.error }}</span>
								<span class="badge badge-danger" v-else>{{ this.error }}</span>
							</div>
							<div class="col-md-6">
								<label>Password</label>
								<input type="password" class="form-control" placeholder="Password" v-model="user.password">
							</div>

							<span style="color: transparent;">{{ user.email = user.first_name + user.surname + user.identification_card + "@cidenet.com.co"}}</span>
							<div class="col-md-6">
								<label>Email</label>
								<input class="form-control" placeholder="Email" v-model="user.email" required>
							</div>
						</div>
						<div class="modal-footer">
							<button class="btn btn-primary" type="submit" v-on:click="generateEmail()">Save</button>
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		props: ["user", "roles", "type"],
		data() {
			return {
				email_first_name: "",
				email_surname: "",
				email_identification_card: "",
				generate_email: "",
				error: "",
				minimum_date: "",
				maximum_date: "",
			};
		},
		mounted() {
			this.limitedDate();
		},
		methods: {
			async store() {
				var url = "";
				if (this.type == "created") url = `/admin/store`;
				if (this.type == "updated") url = `/admin/update/${this.user.id}`;

				await axios.post(url, this.user).then((res) => {
					if (res.data.saved) {
						location.reload();
					}
				});
			},
			generateEmail() {
				if (this.type == "created") {
					this.getValidation(this.user.identification_card);
				}
				this.email_first_name = this.user.first_name.split(" ").join("");
				this.email_surname = this.user.surname.split(" ").join("");
				this.email_identification_card = this.user.identification_card
					.split(" ")
					.join("");
				this.generate_email =
					this.email_first_name +
					this.email_surname +
					this.email_identification_card +
					"@cidenet.com.co";
				this.user.email = this.generate_email;
			},
			getValidation() {
				let url = "admin/show/" + this.user.identification_card;
				axios.get(url).then((response) => {
					this.error = response.data;
				});
			},
			limitedDate() {
				this.maximum_date = new Date();
				this.minimum_date =
					this.maximum_date.getFullYear() +
					"-" +
					this.maximum_date.getMonth() +
					"-" +
					this.maximum_date.getDate();
			},
		},
	};
</script>
