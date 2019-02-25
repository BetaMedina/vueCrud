
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

console.log('Olha eu aqui')
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


const app = new Vue({
    el: '#app_vue',
    data:{
        newItem:{'name':'','age':'','profession':''},
        hasError:true,
        item:[],
        showModal: false,
        e_id : '',
        e_name : '',
        e_age : '',
        e_profession : '',
    },
    mounted: function mounted() {
        this.getItems();
    },

    methods:{
        getItems:function getItems()
        {
            var _this = this;
            axios.get('/getall')
             .then(function(response){
                _this.item = response.data
            })
        },

        setVal(val_id,val_name,val_age,val_profession)
        {
            this.e_id = val_id
            this.e_name = val_name
            this.e_age = val_age
            this.e_profession = val_profession
        },

        createItem:function createItem()
        {
            var _this = this;
            var input = this.newItem;
            if(input['name'] == ''|| input['age'] == ''|| input['profession'] == '') 
            {
                this.hasError = false;
            }else{
            this.hasError = true;
            axios.post('/',input)
             .then(function(response){
                 console.log(response)
                 _this.newItem = {'name':'','age':'','profession':''}
                 _this.getItems();
             });
            }

        },
        deleteItem: function deleteItem(item)
        {
            _this = this;
            axios.post('/deleteitem/'+item.id)
                .then(function(response){
                    if(response.data === 1){
                        _this.getItems();
                    }
                    else{
                        console.log(response)
                    }
                });
        },
        
        editItem: function editItem()
        {
            _this = this;
           var id = document.getElementById('e_id');
           var name = document.getElementById('e_name');
           var age = document.getElementById('e_age');
           var profession = document.getElementById('e_profession');
           console.log(name.value,age.value,profession.value)
            axios.post('/edititem/'+id.value, {name:name.value,age:age.value,profession:profession.value})
            .then(function(response){
                console.log(response)
                if(response.data === 1)
                {
                    _this.getItems();
                    _this.showModal = false
                }else{
                    this.hasError = false;
                }
            });
        }

       
    }
});
