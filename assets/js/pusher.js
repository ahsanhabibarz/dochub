var firebaseConfig = {
  apiKey: "AIzaSyCML_RG8c0R3afw8U4EARegYwtlzUDS2_k",
  authDomain: "foodiesbd-1227c.firebaseapp.com",
  databaseURL: "https://foodiesbd-1227c.firebaseio.com",
  projectId: "foodiesbd-1227c",
  storageBucket: "foodiesbd-1227c.appspot.com",
  messagingSenderId: "1048669728845",
  appId: "1:1048669728845:web:c0bc2067d97e0c9728ac04"
};
firebase.initializeApp(firebaseConfig);
var firestore = firebase.firestore();
const docref = firestore.collection("healthtips");
Notification.requestPermission(function(status) {
  console.log("Notification permission status:", status);
});

let tips = [];

docref.orderBy("title").onSnapshot(
  function(snapshot) {
    snapshot.docs.forEach(doc => {
      tips.push(doc.data());
    });
  },
  function(error) {}
);

function displayNotification() {
  let tiplength = tips.length;
  let random = Math.floor(Math.random() * tiplength);
  if (Notification.permission === "granted") {
    navigator.serviceWorker.getRegistration().then(function(reg) {
      var options = {
        body: tips[random].des,
        icon: tips[random].icon,
        vibrate: [100, 50, 100],
        data: { primaryKey: 1 }
      };
      reg.showNotification(tips[random].title, options);
    });
  }
}
