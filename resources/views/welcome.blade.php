<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <meta name="csrf-token" content="{{ csrf_token() }}">       
         <title>Laravel</title>
         <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: auto;
                margin: 0;
            }
            .full-height {
                min-height: 100vh;
            }
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
            .position-ref {
                position: relative;
            }
            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
            .content {
            /*  text-align: center; */
            }
            .title {
                font-size: 84px;
            }
            .m-b-md {
                margin-bottom: 30px;
            }
            .modal-mask {
            position: fixed;
            z-index: 9998;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, .5);
            display: table;
            transition: opacity .3s ease;
            }
            .modal-wrapper {
            display: table-cell;
            vertical-align: middle;
            }
            .modal-container {
            width: 300px;
            margin: 0px auto;
            padding: 20px 30px;
            background-color: #fff;
            border-radius: 2px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
            transition: all .3s ease;
            font-family: Helvetica, Arial, sans-serif;
            }
            .modal-header h3 {
            margin-top: 0;
            color: #42b983;
            }
            .modal-body {
            margin: 20px 0;
            }
            
        </style>
    </head>
    <body>
    <div class="flex-center position-ref full-height">
        
        <div id="app_vue">
            <p class="Text-center alert alert-danger" v-bind:class={hidden:hasError}>
                    Please check all the fields
            </p>
            <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" 
                required  placeholder=" Enter some name" v-model="newItem.name">
        </div>
        <div class="form-group">
            <label for="age">Age:</label>
            <input type="number" class="form-control" id="age" name="age" 
                required  placeholder=" Enter your age" v-model="newItem.age">
        </div>
        <div class="form-group">
            <label for="profession">Profession:</label>
            <input type="text" class="form-control" id="profession" name="profession"
            required placeholder=" Enter your profession" v-model="newItem.profession">
        </div>
 
            <button class="btn btn-primary" id="name" name="name" @click.prevent='createItem()'>        
            <span class="glyphicon glyphicon-plus" ></span> ADD
            </button>

            <table class="table table-borderless" id="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Profession</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in item">
                        <td>@{{item.id}}</td>
                        <td>@{{item.name}}</td>
                        <td>@{{item.age}}</td>
                        <td>@{{item.profession}}</td>
                        <td @click="showModal=true; setVal(item.id,item.name,item.age,item.profession)" id="show-modal" class="btn btn-info">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </td>
                        <td @click="deleteItem(item)" class="btn btn-danger">
                            <span class="glyphicon glyphicon-trash"></span>
                        </td>
                    </tr>
                </tbody>
            </table>
        <modal v-if="showModal" @close="showModal=false">
                <h3 slot="header">Edit Item</h3>
                <div slot="body">
                    
                    <input type="hidden" disabled class="form-control" id="e_id" name="id"
                            required  :value="this.e_id">
                    Name: <input type="text" class="form-control" id="e_name" name="name"
                            required  :value="this.e_name">
                    Age: <input type="number" class="form-control" id="e_age" name="age"
                    required  :value="this.e_age">
                    Profession: <input type="text" class="form-control" id="e_profession" name="profession"
                    required  :value="this.e_profession">
                    
                  
                </div>
                <div slot="footer">
                    <button class="btn btn-default" @click="showModal = false">
                    Cancel
                  </button>
                  
                  <button class="btn btn-info" @click="editItem()">
                    Update
                  </button>
                </div>
            </modal>
        </div>
    </div>
    <script type="text/javascript" src="/js/app.js"></script>


    </body>
</html>
