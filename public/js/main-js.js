
const offices = document.getElementById('offices');

if (offices) {
	
	offices.addEventListener('click', (e) => {
		
		if (e.target.className === 'btn btn-danger delete-office') {

			if (confirm('Are you Sure?')) {

				const id = e.target.getAttribute('data-id');

				fetch(`/web/offices/delete/${id}`, {

					method: 'DELETE'

				}).then(res => window.location.reload());

			}

		}

	});
}