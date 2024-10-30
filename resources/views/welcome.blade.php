<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Device Token</title>
    <link rel="manifest" href="/manifest.json">

    <!-- Firebase SDK versi 8 -->
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-messaging.js"></script>

    <!-- Content Security Policy -->
    <meta http-equiv="Content-Security-Policy"
        content="default-src 'self'; 
                   script-src 'self' 'unsafe-inline' https://www.gstatic.com https://www.googleapis.com; 
                   connect-src 'self' https://fcm.googleapis.com; 
                   img-src 'self' data: https://www.gstatic.com https://www.googleapis.com; 
                   style-src 'self' 'unsafe-inline';
                   frame-src https://www.gstatic.com; 
                   font-src 'self' data:;">

</head>

<body>
    <h1>Get Device Token</h1>
    <button id="generateTokenButton">Get Token</button>
    <p id="tokenDisplay"></p>

    <script>
        // Firebase configuration
        const firebaseConfig = {
            apiKey: "AIzaSyAeaAyOKdqIj0cIm6wcyAuBwQEuZ3xhcg8",
            authDomain: "e-canteen-f49a4.firebaseapp.com",
            projectId: "e-canteen-f49a4",
            storageBucket: "e-canteen-f49a4.appspot.com",
            messagingSenderId: "592903681353",
            appId: "1:592903681353:web:9746c7ffc0dc9b5c179698"
        };

        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
        const messaging = firebase.messaging();

        // Register Service Worker untuk notifikasi
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('/firebase-messaging-sw.js')
                .then(function(registration) {
                    console.log('Service Worker registration successful with scope: ', registration.scope);
                    messaging.useServiceWorker(registration);
                })
                .catch(function(err) {
                    console.log('Service Worker registration failed: ', err);
                });
        }

        // Button untuk generate token
        document.getElementById('generateTokenButton').onclick = async function() {
            try {
                // Minta izin notifikasi
                await Notification.requestPermission();

                // Generate token
                const token = await messaging.getToken({
                    vapidKey: 'BPkyKSPmAASZBoL-2OaOeMTrzjVRcGV3yV4TPe4SOT1f5Ggj6g7g0U0GpQpZL0X8OpRdHjRWUF57OrMiLKqK4OE' // Ganti dengan VAPID key dari Firebase Console
                });

                document.getElementById('tokenDisplay').innerText = `Device Token: ${token}`;
                console.log('Device Token:', token);
            } catch (error) {
                console.error('Error generating token:', error);
            }
        };
    </script>
</body>

</html>
