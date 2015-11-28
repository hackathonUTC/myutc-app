/// <reference path="typings/tsd.d.ts" />
var User = (function () {
    function User(login, nom, prenom, session) {
        this._login = login;
        this._nom = nom;
        this._prenom = prenom;
        this._session = session;
    }
    Object.defineProperty(User.prototype, "login", {
        get: function () {
            return this._login;
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(User.prototype, "nom", {
        get: function () {
            return this._nom;
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(User.prototype, "prenom", {
        get: function () {
            return this._prenom;
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(User.prototype, "session", {
        get: function () {
            return this._session;
        },
        enumerable: true,
        configurable: true
    });
    return User;
})();
exports.User = User;
