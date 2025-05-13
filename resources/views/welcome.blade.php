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
        content="script-src 'self' 'unsafe-eval' 'unsafe-inline'; object-src 'self'; style-src 'self' 'unsafe-inline'; media-src *">

</head>

<body>
    <h1>Get Device Token</h1>
    <button id="generateTokenButton">Get Token</button>
    <p id="tokenDisplay"></p>

    <script>
        // Firebase configuration
        const firebaseConfig = {
            apiKey: "AIzaSyBfapZbLiO-9VX8tjUWe1Ta4Fe4W8LS-t0",
            authDomain: "pasfood-a8378.firebaseapp.com",
            projectId: "pasfood-a8378",
            storageBucket: "pasfood-a8378.firebasestorage.app",
            messagingSenderId: "969399377196",
            appId: "1:969399377196:web:b1eb9d6816a4d60d87a089",
            measurementId: "G-2T9HYQH8Y5"
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
                    vapidKey: 'BFrSzOSpxrnaj2qumct3zkTSq5mSuX9W1f-7vKn6F_upo2FinbBk3F32tgv2gwo8eHjKoP3zghR5dgAGBb1H0Tw' // Ganti dengan VAPID key dari Firebase Console
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
