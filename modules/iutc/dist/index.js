var express = require("express");
var morgan = require("morgan");
var socketio = require("socket.io");
var serveStatic = require("serve-static");
var cookieParser = require("cookie-parser");
var session = require('express-session');
var CASAuthentication = require('cas-authentication');
var app = express();
app.use(session({
    secret: 'super secret key',
    resave: false,
    saveUninitialized: true
}));
app.disable('etag');
var cas = new CASAuthentication({
    cas_url: 'https://cas.utc.fr/cas',
    service_url: 'http://localhost:3000',
    cas_version: '2.0',
    session_name: 'cas_user',
    session_info: 'cas_info'
});
app.get('/', cas.bounce, function (req, res, next) {
    console.dir(req.session['cas_info']);
    next();
});
app.use(morgan("combined"));
app.use(cookieParser("azerty"));
app.use("/", serveStatic(__dirname + '/public'));
var http = app.listen(3000, function () {
    console.log("Server listening on port 3000");
});
var io = socketio(http);
io.on("connection", function (socket) {
    console.log("Nouvelle connexion");
    socket.on("disconnect", function () {
        console.log("One client disconnect");
    });
    socket.on("chat-msg", function (msg) {
        console.dir(msg);
        io.emit("chat-msg", { author: "Antoine Wacheux", text: msg, date: Date.now() });
    });
    console.dir(socket.client.request.session);
});
