require("./bootstrap")
import Swal from "sweetalert2"
const titre = document.getElementById("titre")
const lien = document.getElementById("lien")
const button = document.getElementById("submitButton")

button.addEventListener("click",function (){
	axios.post("/chat",{
		titre:titre.value,
		lien:lien.value,
	}).then(function (){
		Swal.fire({
			title:"diffusion reussite",
			toast:false,
			showCloseButton:true,
			showCancelButton:false,
			icon:"success",
			text:"L'evenemt a ete diffuse avec success"
		})
	})
})

window.Echo.channel("chat").listen(".chat-message",(data,el)=>{
	let accept = confirm(data.admin + " est entrain de realiser un live voulez-vous y participer ? :")
	console.log(data,el)
	if(accept){
		console.log(data,el)
	}

})


