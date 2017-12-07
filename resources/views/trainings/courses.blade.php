@extends('layouts.admin.master',['title'=>""])



@section('content')
<div class="card card-default mt-5">
  <div class="card-header ">
    <div class="card-title">
      Liste des cours de la formation <a style="font-size:1.5em" class="btn btn-success" href="{{route('trainings.show',$training)}}" target="_blank">{{$training->title}} <i class="fa fa-eye"></i> </a>
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

    <section>
      
  
    <div id="tableWithSearch_wrapper" class="dataTables_wrapper no-footer">
      <div>
        <table class="table table-hover demo-table-search table-responsive-block dataTable no-footer" id="tableWithSearch" role="grid" aria-describedby="tableWithSearch_info">
          <thead>
            <tr role="row">
              <th style="" class="sorting" tabindex="0" aria-controls="tableWithSearch" rowspan="1" colspan="1" aria-label="Cours: activate to sort column ascending">
                Cours
              </th>
              <th style="width: 5px" class="sorting" tabindex="0" aria-controls="tableWithSearch" rowspan="1" colspan="1" aria-label="heurs: activate to sort column ascending">
                #heures
              </th>
              <th style="width:5px" class="sorting" tabindex="0" aria-controls="tableWithSearch" rowspan="1" colspan="1" aria-label="n# de questions: activate to sort column ascending">
                #Questions
              </th>
              <th style="" class="sorting" tabindex="0" aria-controls="tableWithSearch" rowspan="1" colspan="1" aria-label="video: activate to sort column ascending">
                Vidéo
              </th>
              <th style="" class="sorting" tabindex="0" aria-controls="tableWithSearch" rowspan="1" colspan="1" aria-label="date d'ajout: activate to sort column ascending">
                Date d'ajout
              </th>
              <th>Editer</th>
              <th>Supimer</th>
            </tr>
          </thead>
          <tbody>
            @foreach($training->courses as $course)
            <tr role="row" class="odd">
              <td class="v-align-middle">
                <a href="{{route('courses.show',$course)}}" class="btn btn-primary text-white" >
                  <h4 class="semi-bold text-white" >{{$course->title}}</h4>
                </a>
              </td>
              <td class="v-align-middle">
                <h4 class="semi-bold">{{$course->hours}}</h4>
              </td>
              <td class="v-align-middle">
                <h4 class="semi-bold">{{$course->qcms()->count()}}</h4>
              </td>
              <td class="v-align-middle">
                <a href="{{$course->video}}">{{$course->video}}</a>
              </td>
              <td class="v-align-middle">
                <p>{{$course->created_at}}</p>
              </td>
              <td>
                <a href="{{route('courses.edit', $course)}}" class="btn btn-primary">
                  <i class="fa fa-edit"></i>
                </a>
              </td>
              <td>
                <form action="{{route('courses.destroy', $course)}}" method="POST">
                  {{csrf_field()}}
                  {{method_field('delete')}}
                  <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>


    </section>
  </div>
</div>
  

@endsection
