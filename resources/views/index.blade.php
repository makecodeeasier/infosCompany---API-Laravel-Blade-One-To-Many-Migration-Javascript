@extends('layouts.app') 

@section('content')
<section>
    <div class="mainTitle">
        <h1 style="font-size:60px">Lorem epsum dolor im detas</h1>
        <h2>Coś tam tutaj jest napisane</h2>
        <p>Na przykład to, że jest to całkiem niezła robota wykonana w Laravel<br>wraz z REST API, PHP, Blade, One-to-Many Migration, JavaScript, CSS, HTML :) </p>
    </div>
</section>



<section>
    <nav class="navbar fixed-bottom" style="padding:0px">
        <div class="container container-engine">
            <div class="col-md-4 col-engine"><img src="{{ asset('images/phone.png') }}" class="icon"><a class="navbar-brand whit" href="tel:500500500">+48 500 500 500</a></div>
            <div class="col-md-4 col-engine">
                <a class="navbar-brand whit" href="mailTo:info@northconsulting.pl"><img src="{{ asset('images/mail.png') }}" class="icon"> info@northconsulting.pl</a>
            </div>
            <div class="col-md-4" style="padding:0px">
                <div class="foot-tab">
                    <div class="row">
                        <div class="col-md-4 cente" id="buttonDisplayForm">
                            <a type="button" onclick="openModal()" class="button-mig"> <img src="{{ asset('images/arrow.png') }}"> </a>
                        </div>
                        <div class="col-md-8 foot-sign">SZKOLENIA HOT - WORK</div>
                    </div>

                </div>
            </div>
        </div>
    </nav>
</section>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog" style="position: relative;">
    <div class="modal-dialog" role="document">
        <div class="modal-content mod-f">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Dodaj dane firmy i pracowników</h5>
                <button type="button" class="close" onclick="closeModal()">
      <span aria-hidden="true">×</span>
    </button>
            </div>
            <div class="modal-body" id="mainBody">
                <form name="formToSend" id="formToSend">
                    <div class="form-group">
                        <div id="requestInformation"></div>
                        <input type="text" class="col-md-12 inp-tr" placeholder="Nazwa firmy" name="name" id="name" required>
                        <input type="text" class="col-md-12 inp-tr" placeholder="NIP" name="nip" id="nip" required>
                        <input type="text" class="col-md-12 inp-tr" placeholder="Adres" name="address" id="address" required>
                        <input type="text" class="col-md-8 inp-tr" placeholder="Miasto" name="city" id="city" required>
                        <input type="text" class="col-md-4 inp-tr" placeholder="Kod pocztowy" name="postcode" id="postcode" required>
                    </div>

                    <div class="form-group" id="workers"></div>
                    <div class="form-group">
                        <a href="#" onClick="addWorker()">+ dodaj pracownika</a>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary radiu" onclick="closeModal()">Anuluj</button>
                <button type="submit" id="mainSaveButton" class="btn btn-primary save-button">Zapisz i wyślij</button>

            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal-backdrop fade show" id="backdrop" style="display: none;"></div>
@endsection