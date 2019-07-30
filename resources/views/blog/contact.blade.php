@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="jumbotron">
        <h1 class="display-3">Contactez Nous!</h1>
        <p class="lead">N'hésitez pas à nous contactez, nous ferons notre maximum pour vous répondre au plus vite..</p>
        <hr class="my-4">
        <form action="">
            <div class="form-group">
                <label for="contactFormName">Votre Nom</label>
                <input type="text" class="form-control" id="contactFormName" aria-describedby="namelHelp" placeholder="Votre nom">
                <small id="namelHelp" class="form-text text-muted">(ex : Nomade Family Life).</small>
            </div>
            <div class="form-group">
                <label for="contactFormEmail">Votre Adresse Email</label>
                <input type="email" class="form-control" id="contactFormEmail" aria-describedby="emailHelp" placeholder="Votre adresse email">
                <small id="emailHelp" class="form-text text-muted">( ex : contact@nomadfamilylife.fr ).</small>
            </div>
            <div class="form-group">
                <label for="contactFormTel">Votre numéro de téléphone</label>
                <input type="number" class="form-control" id="contactFormTel" aria-describedby="phoneHelp" placeholder="Votre numéro de tel">
                <small id="phoneHelp" class="form-text text-muted">( ex : 06 20 61 27 27 ).</small>
            </div>
            <div class="form-group">
                <label for="contactFormMessage">Votre message :</label>
                <textarea class="form-control" id="contactFormMessage" rows="10"></textarea>
            </div>
            <div class="content-center">
                <button type="submit" class="btn btn-primary" style="float:right">Envoyer votre message</button>
            </div>
        </form>
    </div>
</div>

@endsection
