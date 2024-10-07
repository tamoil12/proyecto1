if ('serviceWorker' in navigator) {
    window.addEventListener('load', function() {
        navigator.serviceWorker.register('/sw.js').then(function(registration) {
            console.log('Service Worker registrado con éxito:', registration);
        }, function(err) {
            console.log('Error al registrar el Service Worker:', err);
        });
    });
}
