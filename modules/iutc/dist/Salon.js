var Salon = (function () {
    function Salon(name) {
        this._name = name;
    }
    Object.defineProperty(Salon.prototype, "name", {
        get: function () {
            return this._name;
        },
        set: function (newName) {
            this._name = newName;
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(Salon.prototype, "permanent", {
        get: function () {
            return this._permanent;
        },
        set: function (p) {
            this._permanent = p;
        },
        enumerable: true,
        configurable: true
    });
    Salon.prototype.addUser = function (u) {
    };
    Object.defineProperty(Salon.prototype, "users", {
        get: function () {
            return this._users;
        },
        enumerable: true,
        configurable: true
    });
    return Salon;
})();
exports.Salon = Salon;
