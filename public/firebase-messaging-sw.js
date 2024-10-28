// Import Firebase scripts
importScripts('https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.10.0/firebase-messaging.js');

// Firebase configuration (Pastikan ini sesuai dengan konfigurasi di file utama)
firebase.initializeApp({
    apiKey: "AIzaSyAeaAyOKdqIj0cIm6wcyAuBwQEuZ3xhcg8",
    authDomain: "e-canteen-f49a4.firebaseapp.com",
    projectId: "e-canteen-f49a4",
    storageBucket: "e-canteen-f49a4.appspot.com",
    messagingSenderId: "592903681353",
    appId: "1:592903681353:web:9746c7ffc0dc9b5c179698"
});

const messaging = firebase.messaging();

// Optional: Define behavior for receiving background messages
messaging.onBackgroundMessage((payload) => {
    console.log('Received background message ', payload);
});
