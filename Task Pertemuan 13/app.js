// import express dan routing
const express = require("express");
const router = require("./routes/api.js");

// Membuat object express
const app = express();

// Menggunakan middleware
app.use(express.json());

// Menggunakan routing (router)
app.use(router);

// Mendefinisikan port.
app.listen(3333); //(Diganti ke 3333 karena bentrok 3000 dengan Grafana, feel free to change)
