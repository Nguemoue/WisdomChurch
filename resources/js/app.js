require('./bootstrap');
import Swal from "sweetalert2"
window.Echo.channel("chat").listen(".chat-message",(data,el)=>{
	Swal.fire({
		title:`Live  en cours <br> <hr> Titre : ${data.titre}`,
		toast:false,
		icon:"info",
		footer:" by Katana |GoulBam tout droit reservees ",
		backdrop: `
			rgba(0,0,123,0.4)
			url("https://i.gifer.com/origin/95/95be6f790c4b836f35f57ae78af6c804.gif")
			left top
			no-repeat
  		`,
		text:"Pateur "+data.admin + " realise un live",
		showConfirmButton:true,
		confirmButtonText:"Participez",
		showCancelButton:true,
		cancelButtonText:"ne pas participez",
		denyButtonColor:"#c11",

	}).then(function (result){
		if(result.isConfirmed){
			window.location.assign(data.lien)
		}
	})

})
