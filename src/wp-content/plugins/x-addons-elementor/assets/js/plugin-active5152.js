new ModalVideo('.xa-youtube-btn');

// Check if the element with ID 'typed' exists
var typedElement = document.getElementById('typed');

if (typedElement !== null) {
    // Typed JS
    var typed = new Typed('#typed', {
        stringsElement: '#typed-strings',
        loop: true,
        typeSpeed: 70,
        backSpeed: 30,
    });
}