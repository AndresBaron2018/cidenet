<template>
	<div class="container">
		<h2 class="h3 ServicesList-title mt-5 pl-3 text-color-accedo">welcome to view employees</h2>
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
