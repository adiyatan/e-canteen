// Import Firebase scripts
importScripts('https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.10.0/firebase-messaging.js');

// Firebase configuration (Pastikan ini sesuai dengan konfigurasi di file utama)
const firebaseConfig = {
    apiKey: "AIzaSyBfapZbLiO-9VX8tjUWe1Ta4Fe4W8LS-t0",
    authDomain: "pasfood-a8378.firebaseapp.com",
    projectId: "pasfood-a8378",
    storageBucket: "pasfood-a8378.firebasestorage.app",
    messagingSenderId: "969399377196",
    appId: "1:969399377196:web:b1eb9d6816a4d60d87a089",
    measurementId: "G-2T9HYQH8Y5"
};

const messaging = firebase.messaging();

// Optional: Define behavior for receiving background messages
messaging.onBackgroundMessage((payload) => {
    console.log('Received background message ', payload);
});
