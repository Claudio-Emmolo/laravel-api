const form = document.querySelectorAll('form.form-delete');

form.forEach((formDelete) => {
    formDelete.addEventListener('submit', function (event) {
        event.preventDefault();
        // const popUp = window.confirm('Sei sicuro di voler eliminare?');
        // if (popUp) this.submit();

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
                this.submit();
            }
        })
    });

});


// Edit AND Destroy POPUP
const elementAlert = document.getElementById('alert_popUp')

if (elementAlert) {
    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: elementAlert.dataset.type,
        title: elementAlert.dataset.message,
        showConfirmButton: false,
        timer: 1500
    })
}