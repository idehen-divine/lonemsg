// Get the form and input element
const form = document.getElementById('registeration');
const usernameInput = document.getElementById('username');
const error = document.getElementById('error');

if (form) {
    // Add an event listener to the form on submit
    form.addEventListener('submit', function (event) {
        if (!validateUsername(usernameInput.value)) {
            event.preventDefault();
            error.textContent = 'No space allowed. Only small letters(a-z), number(0-9), and underscore(_)';
        }
    });

    function validateUsername(username) { 
        const regex = /^[a-z0-9_]+$/;
        return !/\s/.test(username) && regex.test(username);
    }
}
