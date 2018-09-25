<!DOCTYPE html>
<html lang="en">

<head>
        <title>Clocky</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/font-awesome.css" />
        <link rel="stylesheet" href="css/fullcalendar.css" />
        <link rel="stylesheet" href="css/jquery.jscrollpane.css" /> 
        <link rel="stylesheet" href="css/unicorn.css" />
        <!--[if lt IE 9]>
        <script type="text/javascript" src="js/respond.min.js"></script>
        <![endif]-->
</head> 
    <body data-color="grey" class="flat">
        <div id="wrapper ">
            <div id="header">
                <!-- <h1><a href="index-2.html">Unicorn Admin</a></h1>   -->
                <a id="menu-trigger" href="#"><i class="fa fa-bars"></i></a>    
            </div>
              
            <span id="app">      
            <div id="content">
                
                <div id="breadcrumb">
                    <a href="#" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a>
                    <a href="#" class="current">Dashboard</a>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12 center" style="text-align: center;">                  
                            <h2><?php
                                $date = new DateTime;
                                   echo $date->format('dS F Y');
                            ?></h2>
                        </div>  
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-xs-12 center">
                            <form @submit.prevent="proForm" class="form-inline">
                              <div class="form-group">
                                <label class="sr-only" for="exampleInputEmail3">Enter Name</label>
                                <input type="text" required v-model="form.name" class="form-control" id="" placeholder="Name">
                              </div>
                              <div class="form-group">
                                <label class="sr-only" for="exampleInputPassword3">Item Details</label>
                                <input type="text" required v-model="form.item" class="form-control" id="" placeholder="Item details">
                              </div>
                              <button type="submit" class="btn btn-default">Check in</button>
                              <!-- {{ form }} -->
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="widget-box">
                                <div class="widget-title">
                                    <span class="icon">
                                        <i class="fa fa-th"></i>
                                    </span>
                                    <h5>Logs for the day</h5>
                                </div>
                                <div class="widget-content nopadding">
                                    <table v-if="logs.length > 1" class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>Name</th>
                                                <th>Item</th>
                                                <th>Time In</th>
                                                <th>Time Out</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="rec in logs">
                                                <td>{{ rec.id }}</td>
                                                <td>{{ rec.name }}</td>
                                                <td>{{ rec.item }}</td>
                                                <td>{{ rec.timeIn }}</td>
                                                <td v-if="rec.timeOut == null">---- -- --  -- -- --:--:-- </td>
                                                <td v-else >{{ rec.timeOut }}</td>
                                                <td><a v-if="rec.timeOut == null" @click.prevent="clockOut"  :data-id="rec.rid" href="">Check Out</a></td>
                                            </tr>
                                        </tbody>
                                    </table>                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            </span>
            <div class="row">
                <div id="footer" class="col-xs-12">
                    2018 &copy; Believe
                </div>
            </div>
        </div>
<?php include "inc_scripts.php";?>
<script src="js/axios.min.js"></script>
<script src="js/vue.js"></script>
<script>    
var app = new Vue({
    el: '#app',
    data: {
        logs: [],
        form: {
            name: '',
            item: ''
        }
    },
    methods: {
        proForm () {
            // alert('Works!');
            axios.get('core/controller.php', {
                    params: {
                      name: this.form.name,
                      item: this.form.item
                    }
                  })
                  .then(response => {
                    console.log(response.data)
                    this.form.name = '';
                    this.form.item = '';
                    this.getLogs()
                    })
                  .catch(function (error) {
                    alert(error);
                });
        },

        clockOut (e) {
            var id = e.target.dataset['id'];
            axios.get('core/controller.php', {
                params: {
                    dtaId: id
                }
            })
            .then(response => {
                this.getLogs();
            })
            .catch(function (error) {

            });
        },

        getLogs () {
            axios.get('core/controller.php', {
                params: {
                    getEm: 1
                }
            })
            .then(response => {
                this.logs = response.data
                // console.log(response.data);
            })
            .catch(function (error) {

            });
        }
    },
    created () {
        // alert("bring the light nepa");
        this.getLogs();
    }
})


</script>

</body>

</html>
