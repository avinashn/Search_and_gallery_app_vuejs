/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when building
 * robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to the
 * page. Then, you may begin adding components to this application or customize
 * the JavaScript scaffolding to fit your unique needs.
 */

class Post {
    constructor(title, link, image) {
        this.title = title;
        this.link = link;
        this.image = image;
    }
}
const app = new Vue({
    el: "#app",
    data: {
        showModal: true,
        keyword: '',
        newItem: {
            'title': '',
            'link': '',
            'image': ''
        },
        postList: []
    },
    mounted : function(){
  		this.getItems();
  },
    methods: {
      getItems: function(){
            axios.get('/vueitems').then(response => {
            this.postList = response.data;
          });
      },
        addItem() {
            console.log("fdf");
            var input = this.newItem;
            if (input['title'] == '' || input['image'] == '' || input['link'] == '') {
                console.log("no input");
            } else {
                console.log(input);
                axios.post('/vueitems', input)
                    .then(response => {
                        this.newItem = {
                            'title': '',
                            'link': '',
                            'image': ''
                        };
                        this.postList.push(input),
                        this.showModal= false
                    });
            }
        }
    },
    computed: {
        filteredList() {
          return this.postList.filter(post=>{
              return post.title.toLowerCase().includes(this.keyword.toLowerCase());
            });
        }
    }
});
