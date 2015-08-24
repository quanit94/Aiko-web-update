 @extends('admin.template.index')

 @section('main_content')
     <div class="row">
         <div class="col-xs-12">
             <div class="box box-primary">
                 <div class="box-header">
                     <h3 class="box-title">Update A User In Aiko System</h3>
                 </div><!-- /.box-header -->
                     <!-- form start -->
                     @include('message.message')
                     {!! Form::open(array('route' => array('post.admin.user.update',$dataUser['_id']))) !!}
                         <div class="box-body">
                             <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    {!! Form::text('name',$dataUser['name'],array('class' => 'form-control', 'placeholder' => 'Enter name')) !!}
                             </div>

                             <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="hidden" name="email" value="{{ $dataUser['email'] }}">
                                    {!! Form::email('email',$dataUser['email'],array('class' => 'form-control', 'placeholder' => 'Enter email', 'disabled' => 'disabled')) !!}
                             </div>

                             <div class="form-group">
                                    <label for="exampleInputEmail1">Password</label>
                                    {!! Form::password('password',array('class' => 'form-control', 'placeholder' => 'Enter password')) !!}
                             </div>

                             <div class="form-group">
                                    <label for="exampleInputEmail1">Confirm Password</label>
                                    {!! Form::password('repassword',array('class' => 'form-control', 'placeholder' => 'Enter confirm password')) !!}
                             </div>

                             <div class="form-group">
                                 <label for="exampleInputEmail1">Description</label>
                                 <textarea class="form-control" rows="3" placeholder="Enter ..." name="description">{{ $dataUser['description'] }}</textarea>
                             </div>

                             <div class="form-group">
                                 <label for="exampleInputEmail1">Telephone</label>
                                 {!! Form::text('telephone',old('telephone'),array('class' => 'form-control', 'placeholder' => 'Enter telephone')) !!}
                             </div>

                             <div class="form-group">
                                 <label for="exampleInputEmail1">Role</label>

                                 @foreach($dataUser['role'] as $name => $value)
                                        <div class="checkbox">
                                            <label>
                                            @if($value == 1)
                                                <input type="checkbox" value="true" name="{{ $name }}" checked="checked">{{ studly_case($name) }}
                                            @else
                                                <input type="checkbox" value="true" name="{{ $name }}">{{ studly_case($name) }}
                                            @endif
                                            </label>
                                        </div>
                                 @endforeach
                             </div>
                         </div><!-- /.box-body -->

                         <div class="box-footer">
                             {!! Form::submit('Confirm',array('name' => 'ok', 'class' => 'btn btn-primary')) !!}
                         </div>
                     {!! Form::close() !!}
             </div>
       </div>
     </div>
 @endsection