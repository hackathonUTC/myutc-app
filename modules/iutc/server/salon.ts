/// <reference path="./User.ts" />

module iUTC
{
    export class Salon
    {
        private _name: string;
        private _permanent: boolean;

        private users:Array<User>;

        constructor(name: string){
            this._name = name;
        }

        get name(): string{
            return this._name;
        }

        set name(newName: string) {
            this._name = newName;
        }

        get permanent(): boolean {
            return this._permanent;
        }

        set permanent(p: boolean){
            this._permanent = p;
        }

        addUser(u: User){

        }
    }
}
