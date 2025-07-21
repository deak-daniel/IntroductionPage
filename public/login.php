<div class="row justify-content-center">
    <form class="col-md-6" method="POST" action="/authenticate">
        <div class="jumbotron jumbotron-fluid text-center">
            <div class="container">
                <h1 class="display-6"><?php global $language; echo $language->loginform->logintitle; ?></h1>
            </div>
        </div>
        <div class="form-group">
            <label for="userField"><?php global $language; echo $language->loginform->loginlabel; ?></label>
            <input class="form-control" type="text" name="username" id="userField" placeholder="<?php global $language; echo $language->loginform->loginlabel; ?>" />
        </div>
        <div class="form-group">
            <label for="pwField"><?php global $language; echo $language->loginform->passwordlabel; ?></label>
            <input class="form-control" type="password" name="password" id="pwField" placeholder="<?php global $language; echo $language->loginform->passwordlabel; ?>" />
        </div>
        <button type="submit" class="btn btn-primary"><?php global $language; echo $language->loginform->loginbuttonlabel; ?></button>
    </form>
</div>