
const suppButtons = document.getElementsByClassName('btnSupp')

for (let i = 0; i < suppButtons.length; i++) {
	suppButtons[i].addEventListener("click", function(event){
		const validation = confirm("Etes-vous sûr de bien vouloir supprimer cet article?")
		console.log(event)
		if (validation) {
			const id = event.target.id
			fetch("index.php?action=suppPost&id=" + id)
			.then(() => {
				window.location.reload()
			})
			.catch(error => alert(error))
		}
	})
};

