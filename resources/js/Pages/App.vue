<template>
	<div>
		<h1>Welcome to us</h1>
		{{msg}}
	</div>
</template>

<script setup>
	import {ref,onMounted} from "vue"
	const msg = ref("yes")
	onMounted(()=>{
		console.log("data mounted")
	})
</script>

<style scoped>
	body{
		background: red;
	}
</style>
