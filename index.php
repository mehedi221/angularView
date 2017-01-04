<html>

    <head>
        <title>
            Angular Grid
        </title>
        <script src="../js/angular/angular.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="../controller/grid.js"></script>

        <style>
            table, th , td  {
                border: 1px solid grey;
                border-collapse: collapse;
                padding: 5px;
            }
            table tr:nth-child(odd) {
                background-color: #f1f1f1;
            }
            table tr:nth-child(even) {
                background-color: #ffffff;
            }
        </style>
    </head>

    <body ng-app="Mygrid" ng-controller="myGridCtrl">
        <div class="container" ng-init="typetext='insert'">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Angular Grid Implementation &nbsp;&nbsp;
                    <button type="button" class="btn btn-default btn-sm" ng-click="showinsertStatus();"; data-toggle="modal" data-target="#myModal">
                    Create New
                    </button>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped table-condensed">
                                <tr>
                                    <td>Sl</td>
                                    <td> Name</td>
                                    <td> Address</td>
                                    <td> Code</td>
                                    <td> Phone</td>
                                    <td> Fax</td>
                                    <td> Mobile</td>
                                    <td> Email</td>
                                    <td>Web Address</td>
                                    <td>Action</td>
                                </tr>
                                <tr ng-repeat="x in campusList">
                                    <td>{{ $index+1 }}</td>
                                    <td>{{ x.campus_name }}</td>
                                    <td>{{ x.address }}</td>
                                    <td>{{ x.campus_code }}</td>
                                    <td>{{ x.phone_no }}</td>
                                    <td>{{ x.fax }}</td>
                                    <td>{{ x.mobile }}</td>
                                    <td>{{ x.email }}</td>
                                    <td>{{ x.web_address }}</td>
                                    <td ng-init="cmshid=x.campus_id">
                                        <input type="hidden" ng-model="cmshid"/>
                                        <input type="button" class="btn btn-default" type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal"
                                               ng-click="changeTextType(cmshid,$index);" ng-model="edit" value="Edit"/>
                                        <input type="button" class="btn btn-default" ng-click="campusDelete($index,cmshid);"   ng-model="edit" value="Delete"/>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- Trigger the modal with a button -->


            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Modal Header</h4>
                        </div>
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-md-12">

                                    <form class="form-horizontal" ng-model="myform">
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="email"> Name:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" ng-model="cums_name" placeholder="Campus Name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="email">Address:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" ng-model="address" placeholder="Address">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="email"> Code:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" ng-model="cams_code" placeholder="Campus Name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="email"> Phone:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" ng-model="phone" placeholder="Campus Name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="email"> Mobile:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" ng-model="mobile" placeholder="Campus Name">
                                                <input type="hidden" class="form-control" ng-model="typetext" value="{{ typetext }}"/>
                                                <input type="hidden" class="form-control" ng-model="upid"/>
                                                <input type="hidden" class="form-control" ng-model="cngid"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="email"> Fax:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" ng-model="fax" placeholder="Campus Name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="email"> Email:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" ng-model="email" placeholder="Campus Name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="email">Web:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" ng-model="web" placeholder="Campus Name">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="button" ng-click="campusDataSave(btnName);"  class="btn btn-default">{{btnName}}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </body>

</html>