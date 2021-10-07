<template>
	<section>
		<div class="my-4 text-right">
			<button class="btn btn-primary" @click="addUser">Add User</button>
		</div>
		<div class="table-responsive">
			<table id="table" class="table table-bordered table-hover table-wrap table-sm">
				<thead class="text-center">
					<tr>
						<th>Surname</th>
						<th>Second surname</th>
						<th>First name</th>
						<th>Other name</th>
						<th>Country of employment</th>
						<th>ID type</th>
						<th>Identification card</th>
						<th>Email</th>
						<th>State</th>
						<th>Area</th>
						<th>Date of admission</th>
						<th>Updated at</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="(user, index) in users" :key="index">
						<td>{{ user.surname }}</td>
						<td>{{ user.second_surname }}</td>
						<td>{{ user.first_name }}</td>
						<td>{{ user.other_name }}</td>
						<td>{{ user.country_of_employment }}</td>
						<td>{{ user.id_type }}</td>
						<td>{{ user.identification_card }}</td>
						<td>{{ user.email }}</td>
						<td>{{ user.state }}</td>
						<td>{{ user.role_user.join(' - ')}} </td>
						<td>{{ user.date_of_admission }}</td>
						<td>{{ user.updated_at }}</td>
						<td>
							<div class="actions">
								<a href='#' role='edit'><i role='edit' @click.prevent="edit(user)">Edit</i></a>
								<button class="btn btn-danger btn-sm" @click="deleteUser(user, index)">Eliminar</button>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<form-user :user="user" :roles="roles" :type="type" />
	</section>
</template>

<script>
	import Form from "./Form";
	import datatables from "datatables";

	export default {
		props: ["users", "roles"],
		components: {
			"form-user": Form,
		},
		data() {
			return {
				user: {},
				type: "created",
			};
		},
		mounted() {
			this.mytable();
		},
		methods: {
			mytable() {
				$(document).ready(function () {
					$("#table").DataTable();
				});
			},
			addUser() {
				this.type = "created";
				$("#modalEditUser").modal({
					backdrop: "static",
					keyboard: false,
				});
			},
			edit(user) {
				this.user = user;
				this.type = "updated";
				$("#modalEditUser").modal({
					backdrop: "static",
					keyboard: false,
				});
			},
			async deleteUser(user, index) {
				var url = "";
				url = `/admin/delete/${user.id}`;

				await axios.post(url, user).then((res) => {
					location.reload();
				});
			},
		},
	};
</script>
