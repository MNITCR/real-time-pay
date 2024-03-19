const successAlert = document.getElementById('formSuccessAlert');

function showSuccessAlert() {
    successAlert.classList.remove('-translate-y-[10rem]');
    setTimeout(() => {
        successAlert.classList.add('-translate-y-[10rem]');
    }, 2000);
}
