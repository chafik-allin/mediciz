@extends('layouts.admin.master',['title'=>"Liste des entreprises"])


@section('content')
<div class="card card-default mt-5">
                  <div class="card-header ">
                    <div class="card-title">
                      Ajouter une entreprise
                    </div>
                  </div>
                  <div class="card-block">
                    <form role="form">
                      <div class="form-group">
                        <label>Nom de l'entreprise</label>
                        <input type="text" name="name" class="form-control" required="">
                      </div>
                      <div class="form-group">
                        <label>CEO </label>
                        <span class="help">Chef d'entreprise</span>
                        <input type="text" class="form-control" required="" name="founder" >
                      </div>
                      <div class="form-group">
                        <label>contact</label>
                        <span class="help">e.g. "contact@example.com"</span>
                        <input type="email" class="form-control" placeholder="ex: some@example.com" required="" name="contact">
                      </div>
                       <div class="form-group">
                        <label>Telephone</label>
                        <input type="text" class="form-control" placeholder="Numéro de telephone" required="" name="phone">
                      </div>
                      <div class="form-group">
                        <label>Adresse</label>
                        <textarea name="adress" id="" cols="30" rows="10" class="form-control"></textarea>
                      </div>
                      <div class="form-group">
                        <label>Disabled</label>
                        <span class="help">e.g. "some@example.com"</span>
                        <input type="email" class="form-control" value="You can put anything here" disabled="">
                      </div>
                    </form>
                  </div>
                </div>
@endsection