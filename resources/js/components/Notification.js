export default class Notification{
    message='';
    constructor(message) {
        this.message=message
    }
    falert(){
        alert(this.message)
    }
}
