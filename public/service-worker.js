const CACHE_NAME = 'e-canteen-cache-v1';
const urlsToCache = [
  '/',
  '/manifest.json',
  'icon.png',
];

self.addEventListener('install', event => {
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then(cache => {
        console.log('Opened cache');
        return cache.addAll(urlsToCache);
      })
  );
});

self.addEventListener('fetch', event => {
  event.respondWith(
    caches.match(event.request)
      .then(response => {
        if (response) {
          return response;
        }
        return fetch(event.request);
      })
  );
});

self.addEventListener('activate', event => {
  const cacheWhitelist = [CACHE_NAME];
  event.waitUntil(
    caches.keys().then(cacheNames => {
      return Promise.all(
        cacheNames.map(cacheName => {
          if (cacheWhitelist.indexOf(cacheName) === -1) {
            return caches.delete(cacheName);
          }
        })
      );
    })
  );
});

self.addEventListener('push', function (event) {
  const data = event.data.json();
  const options = {
    body: data.body,
    icon: 'icon.png', // Ikon untuk notifikasi
  };

  event.waitUntil(
    self.registration.showNotification(data.title, options)
  );
});
