@extends('layouts.admin.master',['title'=>"Créer un cours"])

@section('styles')

@endsection
@section('content')
<div class="card card-default mt-5" id="top">
  <div class="card-header">
    <div class="card-title">
      Ajouter un cours
    </div>
  </div>
  <div class="card-block">
    @if(count($errors->all())>0)
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
          <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif

    @if(session('success'))
      <div class="alert alert-success">{{session('success')}}</div>
    @endif

    <form role="form" action="{{route('courses.store')}}" method="POST" id="courseForm">
      <div v-if="!waiting"> 
        <div class="alert alert-success" v-show="responseServer.status=='success'">@{{responseServer.data}}</div> 
        <div class="alert alert-danger" v-show="responseServer.status=='error'">@{{responseServer.data}}</div>
        <i>* Champ obligatoire</i>
        <div class="form-group">
          <div class="row">
            <div class="col-md-6 ">
              <label>Titre *</label>
              <input type="text" name="title" class="form-control" value="{{old('title')}}" required v-model="title">
            </div>
            <div class="col-md-6">
              <label>Lien de la Vidéo *</label>
              <input type="text" name="video" class="form-control" placeholder="Lien de la video" required v-model="video">  
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="description">Description * </label>
          <textarea name="description" id="description" cols="30" rows="10" class="form-control" required v-model="description">{{old('description')}}</textarea>
        </div>

        <div class="form-group">
          <label>Attacher à une/plusieurs formations *</label><br>
          <span class="help">CTRL + Click gauche pour multiple selection</span>
          <select name="trainings" id="trainings" class="form-control" multiple="" v-model="trainings">
            @foreach($trainings as $training)
            <option value="{{$training->slug}}">{{$training->title}}</option>
            @endforeach
          </select>
          <span>Ce cours est attaché au formations : @{{ trainings }}</span>
        </div>
        <div class="form-group ">
          <h5 v-if="qcms.length>0">Liste des QCMs:</h5>
          <div class="row">
            <div class="col-md-4" v-for="qcm of qcms">
              <div class="card card-default">
                <div class="card-header ">
                  <div class="card-title">@{{qcm.question}}
                  </div>
                  <div class="card-controls">
                    <ul>
                      <li><a class="card-close" href="#" data-toggle="close" @click.prevent="removeQcm(qcm)"><i class="card-icon card-icon-close"></i></a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="card-block">
                  <ul>
                    <li v-for="answer of qcm.answers">@{{answer.content}}</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div style="background: #EEE" class="p-4 mb-5">
          <div class="row">
            <div class="col-md-6" style="border-right: 1px solid #f7f7f7; ">
              <div class="form-group">
              <h5 class="text-center">Ajouter une Question <i class="fa fa-question"></i></h5>
                <label>Question <i class="fa fa-question-circle"></i></label>
                <input type="text" class="form-control" v-model="currentQuestion" placeholder="Ajouter une Question">
              </div>  
              <div class="form-group" >            
                <label>réponses: (Mettez vos propositions)</label><br>
                <span class="help"><i>Cochez la case si la réponses est correcte</i></span>
                <div class="input-group">
                  <input type="text" class="form-control" v-model="currentSuggestion.content" placeholder="Ajouter une Suggestion" @keyup.enter.self.stop="addSuggestion">
                    <span class="input-group-addon success">
                      <input type="checkbox" v-model="currentSuggestion.isCorrect" >
                    </span>
                </div>
              </div>
              <div class="form-group">
                <button class="btn btn-primary" @click.prevent="addSuggestion">Ajouter la suggestion</button>
              </div>
            </div>
            <div class="col-md-6">
              <h3>Visualisation de QCM</h3>
              <h4>@{{currentQuestion}}</h4>
              <ul>
                <li v-for="suggestion of currentSuggestions" >
                  <div v-if="suggestion.isCorrect">
                    <p class="text-success">@{{suggestion.content}}
                      <a href="" style="padding: 5px 10px;border:1px solid #1dbb99 ; background:#1dbb99; color:white" @click.prevent="removeSuggestion(suggestion)"><i class="fa fa-close"></i> 
                      </a>
                    </p>
                  </div>
                  <div v-else>
                    <p class="text-danger">@{{suggestion.content}}
                      <a href="" style="padding: 5px 10px;border:1px solid #f35958 ; background:#f35958; color:white" @click.prevent="removeSuggestion(suggestion)"><i class="fa fa-close"></i> 
                      </a>
                    </p>

                  </div>
                </li>
              </ul>
            </div>
          </div>
           <div class="form-group">
              <button class="btn btn-success btn-block" @click.prevent="saveqcm"><i class="fa fa-save"></i> valider la question</button>
            </div>
        </div>
        <div class="form-group">
          <button class="btn btn-block btn-primary" @click.prevent="saveCourse">
            <i class="fa fa-save fa-lg"></i> Enregistrer le cours
          </button>
        </div>
      </div>
      <div v-else class="text-center">
        <div class="row">
          <div class="col-md-12 text-center">
            <h1>Envoi du cours</h1>         
            <img src="{{asset('images/loading.gif')}}" alt="" class="img-responsive">
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection

@section('scripts')
<script src="{{asset('js/vue.js')}}"></script>
<script src="{{asset('js/axios.min.js')}}"></script>

function method(event)
{
  event.preventDefault();
}
<script>
  new Vue({
    el: "#courseForm",
    data: {
      waiting:false,
      //form
      title:'Premier Cours',
      _token:'{{csrf_token()}}',
      description:'Description',
      video:'Youtube.com',
      trainings:["vuejs"],

      qcms : [{
        question:"Question 1",
        answers:[{
          content:'Réponse 1',
          isCorrect: true
        },
        {
          content:'Réponse 2',
          isCorrect: false
        }]
      }],
      currentQuestion:'',
      currentSuggestion:{
        content:"",
        isCorrect:false,
      },
      responseServer:'',
      currentSuggestions:[]
    },
    methods:{
      addSuggestion(){
        if(!this.currentSuggestion.content)
          return;

        this.currentSuggestions.push({
          content: this.currentSuggestion.content,
          isCorrect: this.currentSuggestion.isCorrect})
        this.currentSuggestion = {}
    },
      removeSuggestion(suggestion){
        this.currentSuggestions.splice(this.currentSuggestions.indexOf(suggestion),1)
      },
      removeQcm(qcm){
        if(!confirm('Voulez vous vraiment  supprimer la question?'))
          return;
        this.qcms.splice(this.qcms.indexOf(qcm),1)
      },
      saveqcm(){
        if(this.currentQuestion && this.currentSuggestions.length>0)
        {
          this.qcms.push({
              question: this.currentQuestion,
              answers: [...this.currentSuggestions]
              })
          this.currentSuggestions = []
          this.currentQuestion = ""
        }
      },
      saveCourse(){
        if((this.currentQuestion != "") || (this.currentSuggestions.length>0) )
          if(!confirm("La question que vous êtes entrain d'écrire n'a pas été sauvegardé! Voulez vous continuer?"))
            return
          if(!this.title || !this.description || !this.video || this.trainings.length==0 ){
            alert('Veuillez remplir tous les champs obligatoires du formulaire')
            return 
          }
       
        this.waiting = true
        let that = this
       
        axios.post("{{route('courses.store')}}",this.$data).then(function(response)
        {
            that.title = ''
            that.description = ''
            that.video = ''
            that.trainings = []
            that.qcms = []
            that.currentQuestion = ''
            that.currentSuggestion = {
              content:"",
              isCorrect:false
            }
            that.currentSuggestions = []
            that.responseServer = {
              status: "success",
              data: response.data
            } 
            that.waiting = false
             $('html, body').animate({
              scrollTop: $("body").offset().top
            }, 200);
        }).catch(function(error){
            
            that.responseServer = {
              status: "error",
              data: error
            }

            $('html, body').animate({
              scrollTop: $('body').offset().top
            }, 200);
            that.waiting = false
        })

      
      }
    }
  })
</script>
@endsection