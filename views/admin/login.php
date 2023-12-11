<?php  include  '../header.php';   ?>


<div class="container">
        <div class="row">

            <div class="col-md-4 m-auto">

            <form class="mt-4"  method="POST" action="login_traitement.php">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">user</label>
                    <input type="text" class="form-control"  aria-describedby="emailHelp" name="user">
                    
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                
                <button type="submit" class="btn btn-primary">login</button>
                <a href="../../" class="btn btn-danger">retour</a>
            </form>
            </div>
            
        </div>
</div>