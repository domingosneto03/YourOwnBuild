
document.addEventListener('DOMContentLoaded', function() {
    // Get all input elements with the class "input-limit"
    const inputTitle = document.querySelectorAll('.input-limit-title');
    const inputText = document.querySelectorAll('.input-limit-text');

    // Function to limit input
    function limitInput(inputElement, maxLength) {
        inputElement.addEventListener('input', function(event) {
            if (inputElement.value.length > maxLength) {
                inputElement.value = inputElement.value.slice(0, maxLength);
                // Optionally, you can show a warning or error message
                // alert('Maximum character limit reached!');
            }
        });
    }

    // Loop through all input elements and apply the limit
    inputTitle.forEach(function(input) {
        limitInput(input, 40);
    });

    inputText.forEach(function(input) {
        limitInput(input, 80);
    });
});
