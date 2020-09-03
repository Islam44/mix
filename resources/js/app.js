// require('./bootstrap');
//  alert("mix")
// console.log("mix")
// import Vue from "vue";
// import Notification from './components/Notification'
// //import Notification from './components/Notification.vue'
//   new Notification('hello mix').falert();
// // new Vue({
// //     el:'#root',
// //     components: {Notification}
// // });
// class Person{
//     static x=63;
//     y=568;
//
// }
import axios from 'axios';
class Post{
        static  async getPosts() {
        return await axios.get('/posts'); //return promise
    }
}
Post.getPosts().then(result =>{
    console.log((result.data)[0])
});

