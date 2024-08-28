var myElement = document.getElementById('simple-bar');
new SimpleBar(myElement, { autoHide: true });

if (!window.matchMedia('(max-width: 480px)').matches) { new SimpleBar(myElement, { autoHide: true }); }