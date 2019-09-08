function onInputChanged() {
    const userInput = document.getElementById('username');
    const passwordInput = document.getElementById('password');
    const submitButton = document.getElementById('login');

    if(userInput.value.length>0 && passwordInput.value.length>0) {
        console.log('enabling');
        submitButton.disabled = false;
    } else {
        console.log('disabling');
        submitButton.disabled = true;
    }
}