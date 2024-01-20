// Give the service worker access to Firebase Messaging.
// Note that you can only use Firebase Messaging here, other Firebase libraries
// are not available in the service worker.
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');
// Initialize the Firebase app in the service worker by passing in
// your app's Firebase config object.
// https://firebase.google.com/docs/web/setup#config-object
var firebaseConfig = {
    apiKey: "AIzaSyDFCgBDTFe5T68y1sMMqz_sVsAasG7jEvw",
    authDomain: "germac-eeb64.firebaseapp.com",
    projectId: "germac-eeb64",
    storageBucket: "germac-eeb64.appspot.com",
    messagingSenderId: "874179927551",
    appId: "1:874179927551:web:8212b57abe730eaed0dbca",
    measurementId: "G-4BJ9PQ0M3K"
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);

// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();

messaging.setBackgroundMessageHandler(function (payload) {
    console.log('[firebase-messaging-sw.js] Received background message ', payload);
    // Customize notification here
    const { title, body } = payload.notification;
    const notificationOptions = {
        body,
    };

    return self.registration.showNotification(title,
        notificationOptions);
});

if ("serviceWorker" in navigator) {
    navigator.serviceWorker
        .register("/firebase-messaging-sw.js")
        .then((registration) => {
            console.log("Service worker registered:", registration);
        })
        .catch((error) => {
            console.error("Service worker registration failed:", error);
        });
}
