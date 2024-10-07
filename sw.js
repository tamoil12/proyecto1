self.addEventListener('install', (e) => {
  e.waitUntil(
    caches.open('app-cache').then((cache) => {
      return cache.addAll([
      
        'index.html',
        'css/styles.css',
        'js/main.js',
        'icons/logo1.png',
        'icons/logo2.png'
      ]);
    })
  );
});

self.addEventListener('fetch', (e) => {
  e.respondWith(
    caches.match(e.request).then((response) => {
      return response || fetch(e.request);
    })
  );
});
