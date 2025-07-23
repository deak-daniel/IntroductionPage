<style>
    form{
        display: flex;
        flex-direction: column;
        width: 50%;
        margin: auto;
        gap: 1rem;
    }

    form button{
        align-self: center;
        max-width: max-content;
    }

    #messageField{
        height: 6rem;
    }
</style>

<form method="POST" action="/authenticate">
    <div class="jumbotron jumbotron-fluid text-center">
        <div class="container">
            <h1 class="display-6"><?php global $language; echo $language->contact->title; ?></h1>
        </div>
    </div>
    <div>
        <label for="emailField"><?php global $language; echo $language->contact->emaillabel; ?></label>
        <input class="form-control" type="email" name="email" id="emailField" placeholder="<?php global $language; echo $language->contact->emaillabel; ?>" />
    </div>
    <div>
        <label for="messageField"><?php global $language; echo $language->contact->messagelabel; ?></label>
        <input class="form-control" type="text" name="message" id="messageField" placeholder="<?php global $language; echo $language->contact->messagelabel; ?>" />
    </div>
    <button type="submit" class="btn btn-primary"><?php global $language; echo $language->contact->sendbuttonlabel; ?></button>
</form>